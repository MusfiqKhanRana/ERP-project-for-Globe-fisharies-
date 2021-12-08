<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Party;
use App\Models\Requisition;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class RequisitionReceiveController extends Controller
{
    public function index()
    {
        $category = Category::select('id','name')->get();
        $warehouse = Warehouse::select('id','name')->get();
        $party = Party::select('id','party_name')->get();
        $requisition = Requisition::with(['warehouse','party',
            'products'=>function($q){
                $q->with(['category','pack']);
            }
        ])->where('confirmed',true)->latest()->paginate(10);
        return view('backend.requisition_receive.index',compact('requisition','category','warehouse','party'));
    }
    public function showProduct($requisition_id)
    {
        $requisition = Requisition::with(['warehouse','party',
            'products'=>function($q){
                $q->with(['category','pack']);
            }
        ])
        ->where('confirmed',true)
        ->find($requisition_id);
        return $requisition;
    }
}
