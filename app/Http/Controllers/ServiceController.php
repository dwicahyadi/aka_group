<?php

namespace App\Http\Controllers;

use App\Helpers\MessageBuilderHelper;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Jobs\SendWA;
use App\Models\Service;
use App\Models\Vehicle;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with(['vehicle'])->orderBy('date','desc')->paginate();
        return view('service.index', compact('services'));
    }


    public function create(Request $request)
    {

        $vehicles = Vehicle::all();
        $selected_vehicle = $vehicles->where('code',$request['code'])->first();

        return view('service.create', compact('vehicles','selected_vehicle'));
    }


    public function store(StoreServiceRequest $request)
    {
        Service::create($request->validated());
        return redirect(route('service.index'));
    }

    public function edit(Service $service)
    {
        //
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
    }

    public function destroy(Service $service)
    {
        //
    }
}
