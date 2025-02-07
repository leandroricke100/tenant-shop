<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexWebsiteController extends Controller
{
    public function __invoke(Request $request)
    {
        [$c1, $c2, $c3, $c4] = array_pad($request->segments(), 4, '');

        if ($c1 == '') return view('auth.login');
        elseif ($c1 == 'register') return view('auth.register');

        //dd($c1, $c2, $c3, $c4);

        //if (session('usuario'))

        //return view('auth.login');
    }


}




