<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Models\Driver;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::paginate();
        return view('driver.index', compact('drivers'));
    }

    public function create()
    {
        return view('driver.create');
    }

    public function store(StoreDriverRequest $request)
    {
        Driver::create($request->validated());
        return redirect(route('driver.index'))->with('success','Saved!');
    }

    public function edit(Driver $driver)
    {
        return view('driver.edit',compact('driver'));
    }

    public function update(UpdateDriverRequest $request, Driver $driver)
    {
        $driver->update($request->validated());
        return redirect(route('driver.index'))->with('success','Updated!');
    }

    public function destroy(Driver $driver)
    {
        $driver->deleteOrFail();
        return redirect(route('driver.index'))->with('success','Deleted!');
    }
}
