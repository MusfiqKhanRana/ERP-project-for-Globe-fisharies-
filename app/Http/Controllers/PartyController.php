<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parties = Party::all();
        return view('backend.party.index', compact('parties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.party.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->except('_token', 'name');
        $this->validate($request,array(
           'party_code' => 'required|max:191',
           'party_name' => 'required|max:191',
           'phone' => 'required|max:191',
           'party_type' => 'required|max:191',
           'party_short_name' => 'required|max:191',
           'address' => 'required|max:191',
           

        ));
        $parties = new Party;
        $parties->party_code = $request->party_code;
        $parties->party_name = $request->party_name;
        $parties->phone = $request->phone;
        $parties->party_type = $request->party_type;
        $parties->party_short_name = $request->party_short_name;
        $parties->address = $request->address;
        $parties->save();

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
        //
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
        return redirect()->back()->withMsg("Successfully Updated");
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
}
