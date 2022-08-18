<?php

namespace App\Http\Controllers\OtherProcessing;

use App\Http\Controllers\Controller;
use App\Models\ProcessingBlock;
use App\Models\ProcessingBlockSize;
use App\Models\ProductionProcessingGrade;
use App\Models\ProductionProcessingUnit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VegetableProcessingController extends Controller
{
    public function vegetable_iqf(){
        $cut_n_clean_count = ProductionProcessingUnit::select('id')->where('processing_name','vegetable_iqf')
        ->where('processing_variant','cut_n_clean')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        $whole_count = ProductionProcessingUnit::select('id')->where('processing_name','vegetable_iqf')
        ->where('processing_variant','whole')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        $whole_n_clean_count = ProductionProcessingUnit::select('id')->where('processing_name','vegetable_iqf')
        ->where('processing_variant','whole_n_clean')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        return view('backend.production.vegetable_processing.iqf.index',compact('cut_n_clean_count','whole_count','whole_n_clean_count'));
    }
    public function vegetable_block(){
        $cut_n_clean_count = ProductionProcessingUnit::select('id')->where('processing_name','vegetable_block')
        ->where('processing_variant','cut_n_clean')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        $whole_count = ProductionProcessingUnit::select('id')->where('processing_name','vegetable_block')
        ->where('processing_variant','whole')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        $whole_n_clean_count = ProductionProcessingUnit::select('id')->where('processing_name','vegetable_block')
        ->where('processing_variant','whole_n_clean')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        $blocks = ProcessingBlock::all();
        $blocks_size = ProcessingBlockSize::all();
        return view('backend.production.vegetable_processing.block.index',compact('cut_n_clean_count','whole_count','whole_n_clean_count','blocks','blocks_size'));
    }
    public function washing_to_glazing(Request $request){
        // dd($request);
        ProductionProcessingUnit::where('id',$request->ppu_id)
        ->update(
            ['Initial_weight'=>$request->washing_n_cutting_weight,'initial_weight_datetime'=>Carbon::now(), 'status'=>'Glazing']
        );
        return redirect()->back()->withmsg('Successfully Send For Glazing');
    }
    public function washing_to_blocking(Request $request){
        // dd($request);
        ProductionProcessingUnit::where('id',$request->ppu_id)
        ->update(
            ['Initial_weight'=>$request->washing_n_cutting_weight,'initial_weight_datetime'=>Carbon::now(), 'status'=>'Blocking']
        );
        return redirect()->back()->withmsg('Successfully Send For Blocking');
    }
    public function blocking_to_blockcounter(Request $request){
        // dd($request);
        ProductionProcessingUnit::where('id',$request->ppu_id)
        ->update(
            ['status'=>'BlockCounter']
        );
        $ppu = ProductionProcessingUnit::with('production_processing_item')->where('id',$request->ppu_id)->first();
        foreach (json_decode($request->inputs) as $key => $input) {
            ProductionProcessingGrade::create([
                'batch_code'=>$ppu->processing_name.'#'.$ppu->processing_variant.'#'.$ppu->item_id.'#'.$input->block_id.'#'.$input->block_size_name.'#'.$ppu->production_processing_item->name,
                'block_id' => $input->block_id,
                'block_name' => $input->block_name,
                'block_value' => $input->block_name,
                'block_size' => $input->block_size_name,
                'production_processing_unit_id' => $request->ppu_id,
            ]); 
        }    
        return redirect()->back()->withmsg('Successfully Send For Block Counter');
    }
    public function blockcounter_to_return(Request $request){
        // dd($request);
        $count = 0;
        foreach ($request->item_id as $key => $value) {
            ProductionProcessingGrade::where('id',$value)
            ->update(
                ['block_quantity'=>$request->block_quantity [$key]]
            );
            $ppg = ProductionProcessingGrade::where('id',$value)->first();
            $final_weight = ($ppg->block_value*$ppg->block_quantity);
            ProductionProcessingGrade::where('id',$value)
            ->update(
                ['final_weight'=> $final_weight]
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
                ['status'=>'RandW']
            );
        }
        return redirect()->back()->withmsg('Successfully Send For Return&Wastage');
    }
    public function glazing_to_return(Request $request){
        // dd($request->toArray());
        ProductionProcessingUnit::where('id',$request->ppu_id)
        ->update(
            ['vegetable_glazing_weight'=>$request->glazing_weight,'final_weight'=>$request->glazing_weight,'vegetable_glazing_datetime'=>Carbon::now(),'status'=>'RandW']
        );
        return redirect()->back()->withmsg('Successfully Send For Return&Wastage');
    }
    public function return_to_store(Request $request){
        // dd($request->toArray());
        ProductionProcessingUnit::where('id',$request->ppu_id)
        ->update(
            ['status'=>'StoreIn','wastage_quantity'=>$request->wastage_quantity,'return_quantity'=>$request->return_quantity,'RandW_datetime'=>Carbon::now()]
        );
        return redirect()->back()->withmsg('Successfully Your Vegetable Process is Done');
    }
}
