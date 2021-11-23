<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaxRequest;
use App\Http\Requests\UpdateTaxRequest;
use App\Models\Tax;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function index()
    {
        $taxes = Tax::paginate();
        return view('tax.index',compact('taxes'));
    }

    public function create(Request $request)
    {

        $vehicles = Vehicle::all();
        $selected_vehicle = $vehicles->where('code',$request['code'])->first();

        return view('tax.create', compact('vehicles','selected_vehicle'));
    }

    public function store(StoreTaxRequest $request)
    {
        Tax::create($request->validated());
        return redirect(route('tax.index'))->with('success','Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit(Tax $tax)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaxRequest  $request
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaxRequest $request, Tax $tax)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tax $tax)
    {
        //
    }
}
