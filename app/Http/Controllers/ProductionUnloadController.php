<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ProductionUnloadController extends Controller
{
    public function index()
    {
        // dd("this is good");
        return view('backend.production.unload.index');
    }
    public function FunctionName(Request $request)
    {
        dd($request->all());
    }
}
