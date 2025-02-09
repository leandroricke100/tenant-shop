<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexWebsiteController extends Controller
{
    public function __invoke(Request $request)
    {
        // Obtém os segmentos da URL
        [$c1, $c2, $c3, $c4] = array_pad($request->segments(), 4, '');


        $user = session('user'); // Armazena a sessão em uma variável para evitar chamadas repetidas
        //dd($user);
        if ($user && isset($user->admin) && $user->admin == 1) {
            return redirect()->route('admin', ['c1' => 'dashboard']);
        }

        if ($user && $user->admin != 1) {
            return redirect()->route('merchant', ['c1' => 'store-list']);
        }


        if ($c1 == '' || $c1 == 'login')  return view('auth.login');
        elseif ($c1 == 'register') return view('auth.register');

        return view('layout.404');
    }
}
