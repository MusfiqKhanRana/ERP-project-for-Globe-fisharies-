<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Party;
use App\Models\Requisition;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        ])
        ->where('confirmed',true)
        ->whereIn('status',['Pending','Processing','Returned'])
        ->latest()->paginate(10);
        return view('backend.requisition_receive.index',compact('requisition','category','warehouse','party'));
    }
    public function updateSubmitted(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        foreach ($data['requisition_product_id'] as $key => $value) {
            $requisition_product_id = $value;
            $final_quantity = $data['final_quantity'][$key];
            DB::table('requisition_product')
            ->where('id', $requisition_product_id)
            ->update(
                ['final_quantity'=>$final_quantity]
            );
        }
        $requisition = Requisition::where('id',$data['requisition_id'])->update(['status'=>'Processing','process_date'=>Carbon::now()]);

        return redirect()->back()->withmsg('Successfully add given product Quatity');
    }
    public function confirmReceiveDelivery($requisition_id)
    {
        $requisition = Requisition::where('id',$requisition_id)->update(['status'=>'Deliverd','delivered_date'=>Carbon::now()]);
        return redirect()->back()->withmsg('Successfully add In delivery');
    }
}
