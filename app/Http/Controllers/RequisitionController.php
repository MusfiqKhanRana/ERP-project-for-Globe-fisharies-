<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cutomer;
use App\Models\Party;
use App\Models\Requisition;
use App\Models\StockProduct;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::select('id','name')->get();
        $warehouse = Warehouse::select('id','name')->get();
        $party = Party::select('id','party_name')->get();
        $requisition = Requisition::with(['warehouse','party',
            'products'=>function($q){
                $q->with(['category','pack']);
            }
        ])->where('confirmed',false)->latest()->paginate(10);
        $requisition_processed_count = Requisition::where('status','Processing')->select('id')->get()->count();
        $requisition_Delivered_count = Requisition::where('status','Deliverd')->select('id')->get()->count();
        return view('backend.requisition.index',compact('requisition','category','warehouse','party','requisition_processed_count','requisition_Delivered_count'));
    }
    public function status()
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
        ->whereIn('status',['Deliverd','Processing'])
        ->latest()->paginate(10);
        return view('backend.requisition.report',compact('requisition','category','warehouse','party'));
    }
    public function deliveryConfirm(Request $request)
    {
        $data = $request->except(['_token']);
        $imperfect_massage = $data['imperfect_massage'];
        // dd($imperfect_massage);
        foreach ($data['id'] as $key => $value) {
            $received_quantity = $data['received_quantity'][$key];
            $product_id = $data['product_id'][$key];
            $buying_price = $data['product_id'][$key];
            $warehouse_id = $data['warehouse_id'][$key];
            DB::table('requisition_product')
            ->where('id', $value)
            ->update(
                ['received_quantity'=>$received_quantity]
            );
            StockProduct::create(['warehouse_id'=>$warehouse_id,'product_id'=>$product_id,'requisition_id'=>$data['requisition_id'],'quantity'=>$received_quantity,'buying_price'=>$buying_price]);
        }
        if($imperfect_massage== null){
            $requisition = Requisition::where('id',$data['requisition_id'])->update(['status'=>'Received','process_date'=>Carbon::now()]);
        }
        else
            $requisition = Requisition::where('id',$data['requisition_id'])->update(['status'=>'Imperfect','process_date'=>Carbon::now(),'imperfect_massage'=>$imperfect_massage]);

        return redirect()->back()->withmsg('Successfully Confirmed given product Quatity');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $data['requisition_id'] = Str::random(6);
        $data['confirmed'] = false;
        $requisition = Requisition::create(['party_id'=>$data['party_id'],'requisition_id'=>$data['requisition_id'],'clearance_date'=>$data['clearance_date'],'confirmed'=>$data['confirmed'],'created_by'=>Auth::user()->id]);
        foreach ($data['product_id'] as $key => $value) {
            $product_id = $value;
            $requisition_id = $requisition->id;
            // $packet = $data['packet'][$key];
            $quantity = $data['quantity'][$key];
            DB::table('requisition_product')->insert(
                ['product_id' => $product_id , 'requisition_id' => $requisition_id,'packet'=>null,'quantity'=>$quantity]
            );
        }
        return redirect()->back()->withmsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function show(Requisition $requisition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisition $requisition)
    {
        // $category = Category::select('id','name')->get();
        $warehouse = Warehouse::select('id','name')->get();
        $party = Party::select('id','party_name')->get();
        return view('backend.requisition.edit',compact('requisition','warehouse','party'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requisition $requisition)
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        $requisition->update($data);
        return redirect('admin/requisition')->withMsg('Successfully Updated');
    }
    public function confirm($id)
    {
        $update = Requisition::where('id',$id)->update(['confirmed'=> true]);
        return redirect()->back()->withmsg('Confirmed');
    }
    public function return(Request $request)
    {
        $update = Requisition::where('id',$request->requisition_id)->update(['status'=>'Returned','return_date'=>Carbon::now(),'return_note'=>$request->return_note]);
        return redirect()->back()->withmsg('Your Requisition has Returened');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisition $requisition)
    {
        $requisition->forceDelete();
        return redirect()->back()->withmsg('Successfully Deleted');
    }
}
