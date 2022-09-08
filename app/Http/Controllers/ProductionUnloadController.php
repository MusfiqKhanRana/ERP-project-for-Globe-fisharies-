<?php

namespace App\Http\Controllers;

use App\Models\ProductionProcessingUnit;
use App\Models\ProductionPurchaseRequisition;
use App\Models\ProductionRequisition;
use App\Models\ProductionRequisitionItem;
use App\Models\SupplyItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function GuzzleHttp\Promise\all;

class ProductionUnloadController extends Controller
{
    public function index()
    {
        return view('backend.production.unload.index');
    }
    public function unloadShow(Request $request)
    {
        $items = SupplyItem::with('grade')->get();
        // dd($items->toArray());
        $production_requistion = ProductionRequisition::with([
                                    'production_supplier'=>function($q){
                                        $q->with(['supplier_items']);
                                    },
                                    'production_requisition_items'=>function($q){
                                        $q->with(['grade']);
                                    }
                                ])
                                ->where('invoice_code',$request->invoice_no)
                                ->Where('status',"Unload")->first();
        // dd($production_requistion->toArray());
        if ($production_requistion) {
            return view('backend.production.unload.unload_list',compact('production_requistion','items'));
        } else {
            return redirect()->back()->withMsg('Input Valid Code');
        }
    }
    public function store(Request $request)
    {
        // dd($request->toArray());
        ProductionRequisition::where('id',$request->requisition_id)->update(['receive_date'=>Carbon::now(),'status'=>'Received']);
        foreach ($request->id as $key => $id) {
            // dd($id);
            if ($request->caregory[$key] == 'Sweet Desert') {
                    $processing_code = random_int(100000, 999999);
                    ProductionProcessingUnit::create(['requisition_id'=>$request->requisition_id,'requisition_code'=>$request->requisition_code,'item_id'=>$request->supply_item_id[$key],'processing_name'=>'Sweet Desert','processing_variant'=>'regular','alive_quantity'=>$request->alive_quantity[$key],'dead_quantity'=>$request->dead_quantity[$key],'processing_code'=>$processing_code,'status'=>'StoreIn','StoreIn_datetime'=>Carbon::now()]);
            }
            if ($id == "no_id") {
                // dd($id);
                $production_requisition_item = ProductionRequisitionItem::create([
                    'production_requisition_id' => $request->requisition_id,
                    'supply_item_id' => $request->supply_item_id[$key],
                    'quantity' => $request->total_quantity[$key],
                    'alive_quantity'=>$request->alive_quantity[$key],
                    'dead_quantity'=>$request->dead_quantity[$key],
                    'return_quantity'=>$request->return_quantity[$key],
                    'received_quantity'=>$request->total_quantity[$key],
                    'received_remark'=>$request->received_remark[$key],
                    // 'amount' => floatval($product->total_price),
                ]);
            }
            // dd($request->total_quantity[$key]);
            $item = ProductionRequisitionItem::where('id',$id)->update(['alive_quantity'=>$request->alive_quantity[$key],'dead_quantity'=>$request->dead_quantity[$key],'return_quantity'=>$request->return_quantity[$key],'received_quantity'=>$request->total_quantity[$key],'received_remark'=>$request->received_remark[$key]]);
        }
        return redirect()->route('production-unload-index')->withMsg('Successfully Send to Chill Room');
    }

    public function gateman_general_item(){
        $production_requistion=ProductionPurchaseRequisition::with(['production_requisition_item'=>function($q){
            $q->with('supplier');
        },'users','departments'])->whereHas('production_requisition_item',function($q){
            $q->where('status','InPurchase');
        })->where('status','Purchased')->get();
        // dd($production_requistion);
        return view('backend.production.unload.gate_man.general_item.index',compact('production_requistion'));
    }
    public function gateman_raw_item(){
        $production_requistion = ProductionRequisition::with([
            'production_supplier'=>function($q){
                $q->with(['supplier_items']);
            },
            'production_requisition_items'=>function($q){
                $q->with(['grade']);
            }
        ])
        ->Where('status',"InGateman")->orWhere('status',"Unload")->orWhere('status',"Received")->latest()->paginate(3);
        return view('backend.production.unload.gate_man.raw_item.index',compact('production_requistion'));
    }
    public function gateman_raw_item_Print($id){
        $data=ProductionRequisition::with(['supplier'=>function($q){
            $q->with(['phone','name']);      
        }
         ])->where('id',$id)->first();
     //    dd($data->toArray());
        return view('backend.production.unload.gate_man.raw_item.print',compact('data'));
     }
    public function check_raw_item(Request $request){
        // dd($request);
        ProductionRequisition::where('id',$request->requisition_id)
        ->update(
            ['status'=>'Unload','vehicle_number'=>$request->vehicle_number,'challan_number'=>$request->challan_number,'gateman_remark'=>$request->remark]
        );
        return redirect()->back()->withmsg('Successfully Send For Unloading');
    }
    public function check_general_item(Request $request){
        // dd($request->toArray());
        ProductionPurchaseRequisition::where('id',$request->requisition_id)->update([
            'status'=>'StoreIn',
            'vehicle_number'=>$request->vehicle_number,
            'challan_no'=>$request->challan_no,
            'unload_remark'=>$request->unload_remark
        ]);
        return redirect()->back()->withmsg('Successfully Send For Unloading');
    }
}
