<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

}
