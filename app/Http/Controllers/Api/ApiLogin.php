<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiLogin extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->all();
        // $metodo = $data['metodo'] ?? null;
        if (!$data['metodo']) return response()->json(['status' => false, 'msg' => 'Método não informado!']);

        // [MÉTODOS]
        if ($data['metodo'] == 'LOGAR') return response()->json($this->login($request));
        // else if ...

        return response()->json(['status' => false, 'msg' => '123Método não encontrado!']);
    }

    public function login(Request $request)
    {
        $dados = $request->all();
        return ['status' => false, 'msg' => 'testeeee123', 'dados' => $dados];
    }
}
