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
            )->where('status','Received')->latest()->paginate(3);
            if ($request->ajax()) {
                return view('backend.production.chill-room.pagination_data', compact('data'));
            }
        // dd($requisitions->toArray());
        return view('backend.production.chill-room.index',compact('requisitions'));
    }

    public function ReturnStock(){

        $return_item = ProductionProcessingUnit::with('production_processing_item')->where('return_quantity', '!=' ,'null')
        ->select('item_id','return_quantity','requisition_batch_code','isReturn')
        ->get()
        ->groupBy('requisition_batch_code');
        // dd($return_item->toArray());
        return view('backend.production.chill-room.return_stock',compact('return_item'));
    }

    public function TotalStockStock(){
        return view('backend.production.chill-room.total_stock');
    }

    public function process(Request $request)
    {
        // dd($request->toArray());
        // $update_item = ProductionRequisitionItem::all();
        $requisition_batch_code = $request->item_name.'#'.$request->grade_name;
        $processing_code = random_int(100000, 999999);
        ProductionProcessingUnit::create(['requisition_batch_code'=>$requisition_batch_code,'requisition_id'=>$request->requisition_id,'requisition_code'=>$request->requisition_code,'item_id'=>$request->item_id,'processing_name'=>$request->processing_name,'processing_variant'=>$request->processing_variant,'alive_quantity'=>$request->alive_quantity,'dead_quantity'=>$request->dead_quantity,'processing_code'=>$processing_code]);
        return redirect()->back()->withmsg('Successfully Send For Processing');
    }
    
    public function return_item_process(Request $request)
    {
        // dd($request->toArray());
        $processing_code = random_int(100000, 999999);
        ProductionProcessingUnit::create(['requisition_batch_code'=>$request->requisition_batch_code,'requisition_code'=>'From Return','item_id'=>$request->item_id,'processing_name'=>$request->processing_name,'processing_variant'=>$request->processing_variant,'dead_quantity'=>$request->total_qty,'processing_code'=>$processing_code,'isReturn'=>'1']);
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
        $category = $item->category;
        $item_grade_name = $item->grade->name;
        $total_weight = (($pivot->alive_quantity)-($alive_on_process)) + (($pivot->dead_quantity)-($dead_on_process));
        return ["requisition_id"=>$requisition_id,"requisition_code"=>$requisition_code,"item_id"=>$item_id,"item_name"=>$item_name,"category"=>$category,"item_grade_name"=>$item_grade_name,"alive_quantity"=>($pivot->alive_quantity)-($alive_on_process),'dead_quantity'=>($pivot->dead_quantity)-($dead_on_process),"total_weight"=>$total_weight];

    }  
}
