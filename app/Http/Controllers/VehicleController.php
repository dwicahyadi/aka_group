<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Driver;
use App\Models\TaxOfficer;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with(['driver','taxOfficer'])->paginate();
        return view('vehicle.index', compact('vehicles'));
    }

    public function create()
    {
        $drivers = Driver::query()->get()->pluck('name','id');
        $tax_officers = TaxOfficer::query()->get()->pluck('name','id');

        return view('vehicle.create', compact('drivers','tax_officers'));
    }

    public function store(StoreVehicleRequest $request)
    {
        $request->validated();
        $image_path = '';
        if ($request->file('image'))
            $image_path = $request->file('image')->store('public');

        Vehicle::create([
            'code' => $request['code'],
            'license_number' => $request['license_number'],
            'brand' => $request['brand'],
            'model' => $request['model'],
            'year' => $request['year'],
            'vin' => $request['vin'],
            'image' => $image_path,
            'driver_id' => $request['driver_id'] > 0 ? $request['driver_id'] : null,
            'tax_officer_id' => $request['tax_officer_id'] > 0 ? $request['tax_officer_id'] : null
        ]);

        return redirect(route('vehicle.index'))->with('success','Saved');
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicle.show',compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        $drivers = Driver::query()->get()->pluck('name','id');
        $tax_officers = TaxOfficer::query()->get()->pluck('name','id');

        return view('vehicle.edit', compact('vehicle','drivers','tax_officers'));
    }


    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $request->validated();
        $image_path = $vehicle->image;
        if ($request->file('image'))
            $image_path = $request->file('image')->store('public');

        $vehicle->update([
            'code' => $request['code'],
            'license_number' => $request['license_number'],
            'brand' => $request['brand'],
            'model' => $request['model'],
            'year' => $request['year'],
            'vin' => $request['vin'],
            'image' => $image_path,
            'driver_id' => $request['driver_id'] > 0 ? $request['driver_id'] : null,
            'tax_officer_id' => $request['tax_officer_id'] > 0 ? $request['tax_officer_id'] : null
        ]);

        return redirect(route('vehicle.index'))->with('success','Saved');
    }


    public function destroy(Vehicle $vehicle)
    {
        $vehicle->deleteOrFail();
        return redirect(route('vehicle.index'));
    }
}
