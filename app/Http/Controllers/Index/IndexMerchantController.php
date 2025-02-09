<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexMerchantController extends Controller
{
    public function __invoke(Request $request)
    {

        $user = session('user');
        if (!$user) return redirect()->route('website', ['c1' => 'login']);
        [$c1, $c2, $c3, $c4] = array_pad($request->segments(), 4, '');

        //list stores
        if ($c1 == 'merchant' && $c2 == 'store-list') return view('admin.show-store');

        //create store
        if ($c1 == 'merchant' && $c2 == 'create-store') return view('admin.stores.create-store');
        if ($c1 == 'merchant' && $c2 == 'edit-store' && isset($c3)) return view('admin.stores.edit-store', ['id' => $c3]);

        //list stores
        if ($c1 == 'merchant' && $c2 == 'category-list') return view('admin.show-category');

        //create category
        if ($c1 == 'merchant' && $c2 == 'create-category') return view('admin.stores.create-category');
        if ($c1 == 'merchant' && $c2 == 'edit-category' && isset($c3)) return view('admin.stores.edit-category', ['id' => $c3]);

       //list products
       if ($c1 == 'merchant' && $c2 == 'product-list') return view('admin.show-product');

       //create product
       if ($c1 == 'merchant' && $c2 == 'create-product') return view('admin.stores.create-product');
       if ($c1 == 'merchant' && $c2 == 'edit-product' && isset($c3)) return view('admin.stores.edit-product', ['id' => $c3]);

        else return view('layout.404');
    }
}
