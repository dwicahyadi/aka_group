<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Tax;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function service(Request $request)
    {
        $services = Service::query()
            ->with(['vehicle'])
            ->when($request['start_date'], function ($query) use ($request){
                $query->whereBetween('date',[$request['start_date'], $request['end_date']]);
            })
            ->when(!$request['start_date'], function ($query) use ($request){
                $query->whereDate('date', date('Y-m-d'));
            })
            ->when($request['vehicle_id'], function ($query) use ($request){
                $query->where('vehicle_id', $request['vehicle_id']);
            })
            ->orderBy('date')->get();

        return view('report.services', compact('services'));
    }

    public function upcomingService(Request $request)
    {
        $services = Service::query()
            ->with(['vehicle'])
            ->when($request['start_date'], function ($query) use ($request){
                $query->whereBetween('next_service_date',[$request['start_date'], $request['end_date']]);
            })
            ->when(!$request['start_date'], function ($query) use ($request){
                $query->whereDate('next_service_date', date('Y-m-d'));
            })
            ->when($request['vehicle_id'], function ($query) use ($request){
                $query->where('vehicle_id', $request['vehicle_id']);
            })
            ->orderBy('next_service_date')->get();

        return view('report.upcoming-services', compact('services'));
    }

    public function tax(Request $request)
    {
        $taxes = Tax::query()
            ->with(['vehicle'])
            ->when($request['start_date'], function ($query) use ($request){
                $query->whereBetween('date',[$request['start_date'], $request['end_date']]);
            })
            ->when(!$request['start_date'], function ($query) use ($request){
                $query->whereDate('date', date('Y-m-d'));
            })
            ->when($request['vehicle_id'], function ($query) use ($request){
                $query->where('vehicle_id', $request['vehicle_id']);
            })
            ->orderBy('date')->get();

        return view('report.tax', compact('taxes'));
    }

    public function upcomingTax(Request $request)
    {
        $taxes = Tax::query()
            ->with(['vehicle'])
            ->when($request['start_date'], function ($query) use ($request){
                $query->whereBetween('next_tax_date',[$request['start_date'], $request['end_date']]);
            })
            ->when(!$request['start_date'], function ($query) use ($request){
                $query->whereDate('next_tax_date', date('Y-m-d'));
            })
            ->when($request['vehicle_id'], function ($query) use ($request){
                $query->where('vehicle_id', $request['vehicle_id']);
            })
            ->orderBy('next_tax_date')->get();

        return view('report.upcoming-tax', compact('taxes'));
    }
}
