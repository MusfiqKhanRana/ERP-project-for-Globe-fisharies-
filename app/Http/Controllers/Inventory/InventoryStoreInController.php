<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\ProductionProcessingUnit;
use Illuminate\Http\Request;

class InventoryStoreInController extends Controller
{
    public function store_in(){
        $ppu = ProductionProcessingUnit::where('status','StoreIn')->with('production_processing_grades','production_processing_item')->latest()->paginate(5);
        // dd($ppu->toArray());
        return view('backend.production.inventory.store-in.index',compact('ppu'));
    }
}
