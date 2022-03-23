<?php

namespace App\Http\Controllers;

use App\Models\ProductionProcessingUnit;
use App\Models\ProductionRequisition;
use App\Models\ProductionRequisitionItem;
use App\Models\SupplyItem;
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
                },
                'production_processing_unit'=>function($q){
                    $q->select('id','requisition_id','item_id','alive_quantity','dead_quantity');
                }
            ]
            )->latest()->paginate(3);
            if ($request->ajax()) {
                return view('backend.production.chill-room.pagination_data', compact('data'));
            }
        // dd($requisitions->toArray());
        return view('backend.production.chill-room.index',compact('requisitions'));
    }

    public function process(Request $request)
    {
        // dd($request->toArray());
        // $update_item = ProductionRequisitionItem::all();
        $processing_code = random_int(100000, 999999);
        ProductionProcessingUnit::create(['requisition_id'=>$request->requisition_id,'requisition_code'=>$request->requisition_code,'item_id'=>$request->item_id,'processing_name'=>$request->processing_name,'processing_variant'=>$request->processing_variant,'alive_quantity'=>$request->alive_quantity,'dead_quantity'=>$request->dead_quantity,'processing_code'=>$processing_code]);
        return redirect()->back()->withmsg('Successfully Send For Processing');
    }    

    public function data_pass(Request $request)
    {
        $alive_on_process =0;
        $dead_on_process = 0;
        $requisition_id = $request->id;
        $item_id = $request->item_id; 
        $pivot_id = $request->pivot_id; 
        $requisition = ProductionRequisition::with(
            ['production_requisition_items' => function($q){
                $q->with([
                    'grade'=>function($q){
                            $q->select('id','name');
                        }
                    ]);
                },
                'production_processing_unit'=>function($q){
                    $q->select('id','requisition_id','item_id','alive_quantity','dead_quantity');
                }
            ]
            )
        ->where('id',$requisition_id)->first();
        $item = SupplyItem::where('id',$item_id)->first();
        $pivot = ProductionRequisitionItem::where('id',$pivot_id)->first();
        $requisition_code = $requisition->invoice_code;
        foreach ($requisition->production_processing_unit as $key => $pru) {
            // dd(var_dump($product));
            if ($pru->item_id==$item_id){
                $alive_on_process +=$pru->alive_quantity;
                $dead_on_process += $pru->dead_quantity;
            }
            
        }
        // return $requisition->production_processing_unit;
        $item_name = $item->name;
        $item_grade_name = $item->grade->name;
        $total_weight = (($pivot->alive_quantity)-($alive_on_process)) + (($pivot->dead_quantity)-($dead_on_process));
        return ["requisition_id"=>$requisition_id,"requisition_code"=>$requisition_code,"item_id"=>$item_id,"item_name"=>$item_name,"item_grade_name"=>$item_grade_name,"alive_quantity"=>($pivot->alive_quantity)-($alive_on_process),'dead_quantity'=>($pivot->dead_quantity)-($dead_on_process),"total_weight"=>$total_weight];

    }  
}
