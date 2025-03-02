<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;

class ApiStore extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->all();
        if (!$data['metodo']) return response()->json(['status' => false, 'msg' => 'Method not found!']);

        if ($data['metodo'] == 'CREATE_STORE') return response()->json($this->createStore($request));
        if ($data['metodo'] == 'EDIT_STORE') return response()->json($this->editStore($request));
        if ($data['metodo'] == 'DELETE_STORE') return response()->json($this->deleteStore($request));

        if ($data['metodo'] == 'CREATE_CATEGORY') return response()->json($this->createCategory($request));
        if ($data['metodo'] == 'EDIT_CATEGORY') return response()->json($this->editCategory($request));
        if ($data['metodo'] == 'DELETE_CATEGORY') return response()->json($this->deleteCategory($request));


        if ($data['metodo'] == 'RELEASE_CATEGORY') return response()->json($this->releaseCategory($request));
        if ($data['metodo'] == 'CREATE_PRODUCT') return response()->json($this->createProduct($request));
        if ($data['metodo'] == 'EDIT_PRODUCT') return response()->json($this->editProduct($request));


        return response()->json(['status' => false, 'msg' => 'Method not found!']);
    }

    public function createStore(Request $request)
    {
        $dados = $request->all();

        $user = User::find($dados['id_user'])->admin;

        $store = Store::create([
            'store_name' => $dados['store_name'],
            'id_user' => $dados['id_user'],
        ]);

        return ['status' => true, 'msg' => 'Store been sucessfully created!', 'user' => $user, 'store' => $store];
    }

    public function editStore(Request $request)
    {
        $dados = $request->all();
        $user = session('user')->admin;

        $store = Store::find($dados['id_store']);
        $store->update([
            'store_name' => $dados['store_name'],
            'id_user' => $dados['id_user'],
        ]);
        return ['status' => true, 'msg' => 'Store been sucessfully edited!', 'user' => $user, 'store' => $store];
    }

    public function deleteStore(Request $request)
    {
        $dados = $request->all();
        // $user = session('user')->admin;

        $store = Store::find($dados['id_store']);
        $store->delete();
        return ['status' => true, 'msg' => 'Store been sucessfully deleted!'];
    }

    public function createCategory(Request $request)
    {
        $dados = $request->all();
        $user = session('user')->admin;
        // $idStores = array_map('intval', is_array($dados['id_store']) ? $dados['id_store'] : explode(',', $dados['id_store']));

        $category = Category::create([
            'name_category' => $dados['name_category'],
            'id_user' => $dados['id_user'],
            'id_store' => $dados['id_store'],
        ]);

        return ['status' => true, 'msg' => 'Category been sucessfully created!', 'user' => $user];
    }

    public function editCategory(Request $request)
    {
        $dados = $request->all();
        $user = session('user')->admin;

        // $idStores = array_map('intval', is_array($dados['id_store']) ? $dados['id_store'] : explode(',', $dados['id_store']));

        $category = Category::find($dados['id_category']);
        $category->update([
            'name_category' => $dados['name_category'],
            'id_user' => $dados['id_user'],
            'id_store' => $dados['id_store'],
        ]);
        return ['status' => true, 'msg' => 'Category been sucessfully edited!', 'user' => $user];
    }

    public function deleteCategory(Request $request)
    {
        $dados = $request->all();
        // $user = session('user')->admin;

        $category = Category::find($dados['id_category']);
        $category->delete();
        return ['status' => true, 'msg' => 'Category been sucessfully deleted!'];
    }

    public function releaseCategory(Request $request)
    {
        $dados = $request->all();
        $user = session('user')->admin;
        $category = Category::whereJsonContains('id_store', (int)$dados['id_store'])->get();

        $categories = $category->map(function ($cat) {
            return [
                'id' => $cat->id,
                'name' => $cat->name_category
            ];
        });

        return ['status' => false, 'msg' => 'Store successfully selected', 'category' => $categories];
    }

    public function createProduct(Request $request)
    {
        $dados = $request->all();
        $user = session('user')->admin;

        $product = Product::create([
            'name_product' => $dados['name_product'],
            'id_user' => $dados['id_user'],
            'id_category' => $dados['id_category'],
            'id_store' => $dados['id_store'],
        ]);

        $category = Category::find($dados['id_category']);
        $category->update([
            'id_product' => $product->id
        ]);

        return ['status' => true, 'msg' => 'Product been sucessfully created!', 'user' => $user, 'product' => $product, 'category' => $category];
    }

    public function editProduct(Request $request)
    {
        $dados = $request->all();
        $user = session('user')->admin;

        $product = Product::find($dados['id_product']);
        $category = Category::find($product->id_category);

        if ($dados['id_category'] != $category->id) {
            $category->update([
                'id_product' => null
            ]);
            $category = Category::find($dados['id_category']);
            $category->update([
                'id_product' => $product->id,
            ]);
        }

        if($dados['id_store'] != $category->id_store){
            $category->update([
                'id_store' => $dados['id_store'],
            ]);
        }

        $product->update([
            'name_product' => $dados['name_product'],
            'id_user' => $dados['id_user'],
            'id_category' => $dados['id_category'],
            'id_store' => $dados['id_store'],
        ]);


        return ['status' => true, 'msg' => 'Product been sucessfully edited!', 'user' => $user];
    }
}
