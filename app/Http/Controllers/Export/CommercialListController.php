<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use App\Models\SalesContract;
use Illuminate\Http\Request;

class CommercialListController extends Controller
{
    public function index()
    {
        //dd('good');
        return view('backend.export_management.commercial_list');
    }
}
