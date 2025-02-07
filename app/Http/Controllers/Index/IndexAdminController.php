<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexAdminController extends Controller
{
    public function __invoke(Request $request)
    {
        [$c1, $c2, $c3, $c4] = array_pad($request->segments(), 4, '');


    }
}
