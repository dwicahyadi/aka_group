<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Tax;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $upcoming_services = Service::upcomingServices(7)->with(['vehicle'])->get();
        $upcoming_taxes = Tax::upcomingTaxes(7)->with(['vehicle'])->get();
        return view('home', compact('upcoming_services','upcoming_taxes'));
    }
}
