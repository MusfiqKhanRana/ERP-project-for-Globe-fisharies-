<?php

namespace App\Http\Controllers\Production;

use App\Http\Controllers\Controller;
use App\Models\ProcessingBlock;
use App\Models\ProcessingBlockSize;
use App\Models\ProductionProcessingGrade;
use App\Models\ProductionProcessingUnit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductionBlockController extends Controller
{
    public function block_frozen(){
        $whole_count = ProductionProcessingUnit::select('id')->where('processing_name','block_frozen')
        ->where('processing_variant','whole')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        $clean_count = ProductionProcessingUnit::select('id')->where('processing_name','block_frozen')
        ->where('processing_variant','clean')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        $slice_count = ProductionProcessingUnit::select('id')->where('processing_name','block_frozen')
        ->where('processing_variant','slice')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();

        $blocks = ProcessingBlock::all();
        $blocks_size = ProcessingBlockSize::all();
        return view('backend.production.processing.block_frozen.index',compact('blocks','blocks_size','whole_count','clean_count','slice_count'));
    }
    public function raw_bf_shrimp(){
        $hlso_count = ProductionProcessingUnit::select('id')->where('processing_name','raw_bf_shrimp')
        ->where('processing_variant','hlso')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        $pud_count = ProductionProcessingUnit::select('id')->where('processing_name','raw_bf_shrimp')
        ->where('processing_variant','pud')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        $p_n_d_count = ProductionProcessingUnit::select('id')->where('processing_name','raw_bf_shrimp')
        ->where('processing_variant','p_n_d')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        $pdto_count = ProductionProcessingUnit::select('id')->where('processing_name','raw_bf_shrimp')
        ->where('processing_variant','pdto')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        $pto_count = ProductionProcessingUnit::select('id')->where('processing_name','raw_bf_shrimp')
        ->where('processing_variant','pto')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();

        $blocks = ProcessingBlock::all();
        $blocks_size = ProcessingBlockSize::all();
        return view('backend.production.processing.raw_bf_shrimp.index',compact('blocks','blocks_size','hlso_count','pud_count','p_n_d_count','pdto_count','pto_count'));
    }
    public function semi_iqf(){
        $hoso_count = ProductionProcessingUnit::select('id')->where('processing_name','semi_iqf')
        ->where('processing_variant','hoso')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        $hoto_count = ProductionProcessingUnit::select('id')->where('processing_name','semi_iqf')
        ->where('processing_variant','hoto')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();

        $blocks = ProcessingBlock::all();
        $blocks_size = ProcessingBlockSize::all();
        return view('backend.production.processing.semi_iqf.index',compact('blocks','blocks_size','hoso_count','hoto_count'));
    }
    public function block_data_pass(Request $request){
        $data = ProductionProcessingUnit::with(
            ['production_processing_item' => function($q){
                $q->with([
                    'grade'=>function($q){
                            $q->select('id','name');
                        }
                    ]);
                }
            ]
            )
        ->select('id','invoice_code','item_id','status','alive_quantity','dead_quantity','requisition_code','processing_name','processing_variant','block_quantity','excess_volume','block_weight','soaking_weight','glazing_weight')
        ->where(function ($q) use($request)
        {
            if ($request->type) {
                $q->where('processing_name',$request->type);
            }
        })
        ->where('processing_variant',$request->sub_type)
        ->latest()
        ->get();
        return response()->json($data);
}
    public function processing_to_blocking(Request $request){
        // dd($request);
        ProductionProcessingUnit::where('id',$request->ppu_id)
        ->update(
            ['Initial_weight'=>$request->initial_weight,'initial_weight_datetime'=>Carbon::now(),'status'=>'Blocking']
        );
        return redirect()->back()->withmsg('Successfully Send For Blocking');
    }
    public function blocking_to_blockcounter(Request $request){
        // dd($request);
        ProductionProcessingUnit::where('id',$request->ppu_id)
        ->update(
            ['status'=>'BlockCounter']
        );
        $ppu = ProductionProcessingUnit::where('id',$request->ppu_id)->first();
        // dd($ppu->toArray());
        foreach (json_decode($request->inputs) as $key => $input) {
            ProductionProcessingGrade::create([
                'batch_code'=>$ppu->processing_name.'.'.$ppu->processing_variant.'.'.$ppu->item_id.'.'.$input->block_id.'.'.$input->block_name.'.'.$input->block_size_name,
                'block_id' => $input->block_id,
                'block_name' => $input->block_name,
                'block_value' => $input->block_name,
                'block_size' => $input->block_size_name,
                'production_processing_unit_id' => $request->ppu_id,
            ]); 
        }    
        return redirect()->back()->withmsg('Successfully Send For BlockCounter');
    }

    public function blocking_data_pass(Request $request){
        $block_data = ProductionProcessingGrade::where('production_processing_unit_id',$request->id)->select('id','block_name','block_value','block_size','block_quantity','soaking_weight','soaking_return','excess_volume')->get();
        return response()->json($block_data);
    }
    public function block_counter(Request $request){
        // dd($request->toArray());
        $count = 0;
        foreach ($request->item_id as $key => $value) {
            ProductionProcessingGrade::where('id',$value)
            ->update(
                ['block_quantity'=>$request->block_quantity [$key]]
            );
        }   
        $data_checks = ProductionProcessingGrade::where('id',$request->item_id)->select('id','block_quantity')->get();
        // dd($glazing_data_checks->toArray());
        foreach ($data_checks as $key => $value) {
            if ($value->block_quantity == Null) {
                $count+=1;
            }
        }
        // dd($count);
        if ($count==0) {
            ProductionProcessingUnit::where('id',$request->ppu_id)
            ->update(
                ['status'=>'ExcessVolume']
            );
        }
        return redirect()->back()->withmsg('Successfully Send For Excess Volume');
    }
    public function block_counter_to_soaking(Request $request){
        // dd($request->toArray());
        $count=0;
        foreach ($request->item_id as $key => $value) {
            ProductionProcessingGrade::where('id',$value)
            ->update(
                ['block_quantity'=>$request->block_quantity [$key]]
            );
        }   
        $data_checks = ProductionProcessingGrade::whereIn('id',$request->item_id)->select('id','block_quantity')->get();
        // dd($glazing_data_checks->toArray());
        foreach ($data_checks as $key => $value) {
            if ($value->block_quantity == Null) {
                $count+=1;
            }
        }
        // dd($count);
        if ($count==0) {
            ProductionProcessingUnit::where('id',$request->ppu_id)
            ->update(
                ['status'=>'Soaking']
            );
        }
        return redirect()->back()->withmsg('Successfully Send For Soaking');
    }
    public function soaking_to_excess_volume(Request $request){
        // dd($request->toArray());
        $count=0;
        foreach ($request->item_id as $key => $value) {
            ProductionProcessingGrade::where('id',$value)
            ->update(
                ['soaking_weight'=>$request->soaking_weight [$key],'soaking_weight_datetime'=>Carbon::now(),'soaking_return'=>$request->soaking_return [$key]]
            );
        }   
        $data_checks = ProductionProcessingGrade::where('id',$request->item_id)->select('id','soaking_weight')->get();
        // dd($glazing_data_checks->toArray());
        foreach ($data_checks as $key => $value) {
            if ($value->soaking_weight == Null) {
                $count+=1;
            }
        }
        // dd($count);
        if ($count==0) {
            ProductionProcessingUnit::where('id',$request->ppu_id)
            ->update(
                ['status'=>'ExcessVolume']
            );
        }
        return redirect()->back()->withmsg('Successfully Send For Excess Volume');
    }
    public function ex_volume_to_return(Request $request){
        // dd($request->toArray());
        $count=0;
        foreach ($request->item_id as $key => $value) {
            $ppg = ProductionProcessingGrade::where('id',$value)->first();
            $final_weight = (($ppg->block_value*$ppg->block_quantity)+$request->excess_volume [$key]);
            ProductionProcessingGrade::where('id',$value)
            ->update(
                ['excess_volume'=>$request->excess_volume [$key],
                'final_weight' => $final_weight
                ]
            );
        }   
        $data_checks = ProductionProcessingGrade::where('id',$request->item_id)->select('id','excess_volume')->get();
        // dd($glazing_data_checks->toArray());
        foreach ($data_checks as $key => $value) {
            if ($value->excess_volume == Null) {
                $count+=1;
            }
        }
        // dd($count);
        if ($count==0) {
            ProductionProcessingUnit::where('id',$request->ppu_id)
            ->update(
                ['status'=>'RandW']
            );
        }
        return redirect()->back()->withmsg('Successfully Send For Return and Wastage');
    }
    public function block_randw(Request $request){
        // dd($request->toArray());
        ProductionProcessingUnit::where('id',$request->ppu_id)
        ->update(
            ['status'=>'StoreIn','wastage_quantity'=>$request->wastage_quantity,'return_quantity'=>$request->return_quantity,'RandW_datetime'=>Carbon::now()]
        );
        // foreach ($request->item_id as $key => $value) {
        //     ProductionProcessingGrade::where('id',$value)
        //     ->update(
        //         ['glazing_weight'=>$request->glazing_weight [$key],'glazing_weight_datetime'=>Carbon::now()]
        //     );
        // }   
        return redirect()->back()->withmsg('Successfully Your Process is Done');
    }
}
