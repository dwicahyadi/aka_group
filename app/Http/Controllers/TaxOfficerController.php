<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaxOfficerRequest;
use App\Http\Requests\UpdateTaxOfficerRequest;
use App\Models\TaxOfficer;

class TaxOfficerController extends Controller
{

    public function index()
    {
        $tax_officers = TaxOfficer::paginate();
        return view('tax_officer.index',compact('tax_officers'));
    }

    public function create()
    {
        return view('tax_officer.create');
    }

    public function store(StoreTaxOfficerRequest $request)
    {
        TaxOfficer::create($request->validated());
        return redirect(route('tax_officer.index'))->with('success','Saved!');
    }

    public function edit(TaxOfficer $tax_officer)
    {
        return view('tax_officer.index',compact('tax_officer'));
    }

    public function update(UpdateTaxOfficerRequest $request, TaxOfficer $tax_officer)
    {
        $tax_officer->update($request->validated());
        return redirect(route('tax_officer.index'))->with('success','Updated!');
    }


    public function destroy(TaxOfficer $tax_officer)
    {
        $tax_officer->deleteOrFail();
        return redirect(route('tax_officer.index'))->with('success','Updated!');
    }
}
