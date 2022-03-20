<?php

namespace App\Http\Controllers;

use App\Models\ProductionRequisition;
use App\Models\ProductionRequisitionItem;
use Illuminate\Http\Request;

class ChillStorageController extends Controller
{
    public function index(Request $request)
    {
        $items= ProductionRequisitionItem::all();
        // dd($items->toArray());
        $requisitions = ProductionRequisition::with(
            ['production_requisition_items' => function($q){
                $q->with([
                    'grade'=>function($q){
                        $q->select('id','name');
                    }
                ]);
            }]
            )->latest()->paginate(3);
            if ($request->ajax()) {
                return view('backend.production.chill-room.pagination_data', compact('data'));
            }
        // dd($requisitions->toArray());
        return view('backend.production.chill-room.index',compact('requisitions'));
    }
}
