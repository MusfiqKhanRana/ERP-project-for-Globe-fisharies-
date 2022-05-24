<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;
use App\Models\PartyProduct;
use App\Models\Product;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['pack'])->get();
        $parties = Party::all();
        $product_party = PartyProduct::all();
        //dd($party_products);
        return view('backend.party.index', compact('parties','product_party','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::with(['pack'])->get();
        // dd($products);
        return view('backend.party.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request);
        $party_values = $request->all();
        $inputs = $request->except('_token', 'name');
        $this->validate($request,array(
           'party_code' => 'required|max:191',
           'party_name' => 'required|max:191',
           'phone' => 'required|min:11|max:11',
           'address' => 'required|max:191',
        ));
        $parties = new Party;
        $parties->party_code = $request->party_code;
        $parties->party_name = $request->party_name;
        $parties->phone = $request->phone;
        // $parties->party_type = $request->party_type;
        // $parties->party_short_name = $request->party_short_name;
        $parties->address = $request->address;
        $parties->save();
        $data = $request->all();
        // dd(var_dump($data));
        // $order = Order::create(['customer_id' => $data['customer_id'],'remark' => $data['remark']]);
        // dd($parties->id);
        foreach ($data['party_products'] as $key => $value) {
            $product_order = PartyProduct::create([
                'party_id' => $parties->id,
                'product_id' => $data['party_products'][$key],
                'price' => $data['party_price'][$key], 
            ]);
            // dd($product_order);
        }

        return redirect()->route('party.index')->withMsg('Successfully Created');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Party::find($id);
        return view('backend.party.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Party::whereId($id)
        ->update([
            'party_code' => $request->party_code,
            'party_name' => $request->party_name,
            'phone' => $request->phone,
            'party_type' => $request->party_type,
            'party_short_name' => $request->party_short_name,
            'address' => $request->address,
        ]);
        return redirect()->route('party.index')->withMsg("Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Party::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
    public function party_product_delete($id)
    {
        Party::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
    public function party_products(Request $request)
    {
        $process_array = [];
        $id = $request->id;
        $products = Product::with('pack','supplyitem')->find($id);
        // array_push($process_array,['id'=> $prod->id,'product_name' => $prod->product_name,'buying_price' => $prod->buying_price ]);
        return $products;
    }
    public function singleProductStore(Request $request){
        //$data = $request->all();
        //dd($request);
       
            $product_order = PartyProduct::create([
                'party_id' => $request->party_id,
                'product_id' => $request->party_product,
                'price' => $request->party_price, 
            ]);
            
        return redirect()->back()->withMsg("Successfully added Product to The List");
    }
}
