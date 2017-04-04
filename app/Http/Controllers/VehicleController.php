<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
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
     * Show the unit index
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        return view('vehicle.index.vehicleIndex')->with([
            'vehicles' => $user->group->vehicles
        ]);
    }

    public function show($id)
    {
        return view('vehicle.show.vehicleShow')->with([
            'vehicle' => Vehicle::findOrFail($id)
        ]);
    }

}
