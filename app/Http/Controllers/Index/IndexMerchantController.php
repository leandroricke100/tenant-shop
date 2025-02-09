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

        if ($c1 == 'merchant' && $c2 == 'store-list') return view('admin.dashboard');
        if ($c1 == 'merchant' && $c2 == 'create-store') return view('admin.stores.create');
        if ($c1 == 'merchant' && $c2 == 'edit-store' && isset($c3)) return view('admin.stores.edit', ['id' => $c3]);
        if ($c1 == 'merchant' && $c2 == 'stores') return view('admin.stores.edit');
        // elseif ($c1 == 'admin' && $c2 == 'category') return view('admin.category.index');

        else return view('layout.404');
    }
}
