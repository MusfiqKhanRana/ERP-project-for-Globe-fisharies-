<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralItemStockController extends Controller
{
    public function GeneralStock(){
        return view('backend.production.general_purchase.general_stock.index');
    }
}
