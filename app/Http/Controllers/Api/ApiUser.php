<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ApiUser extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->all();
        if (!$data['metodo']) return response()->json(['status' => false, 'msg' => 'Method not found!']);

        if ($data['metodo'] == 'LOGAR') return response()->json($this->login($request));
        if ($data['metodo'] == 'REGISTER') return response()->json($this->register($request));
        if ($data['metodo'] == 'LOGOUT') return response()->json($this->logout($request));

        return response()->json(['status' => false, 'msg' => 'Method not found!']);
    }

    public function login(Request $request)
    {
        $dados = $request->all();
        $user = User::where('email', $dados['email'])->first();
        if (!$user) return ['status' => false, 'msg' => 'User or Password incorrect!'];
        if (!password_verify($dados['password'], $user->password)) return ['status' => false, 'msg' => 'Password incorrect!'];
        session(['user' => $user]);
        return ['status' => true, 'msg' => 'Login successful!', 'user' => $user];
    }

    public function register(Request $request)
    {
        $dados = $request->all();

        $user = User::create([
            'name' => $dados['name'],
            'email' => $dados['email'],
            'password' => bcrypt($dados['password']),
            'store_name' => $dados['store_name']
        ]);

        return ['status' => true, 'msg' => 'Your account been sucessfully created!'];
    }

    public function logout(Request $request)
    {
        session()->flush();
        // session()->forget('user');
        return ['status' => true, 'msg' => 'Logout successful!'];
    }
}
