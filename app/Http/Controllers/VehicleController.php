<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Models\VehicleRepository;

class VehicleController extends Controller
{

    protected $repo;

    public function __construct(VehicleRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return view('vehicle.index.vehicleIndex')->with([
            'vehicles' => $this->repo->all()
        ]);
    }

    public function show($id)
    {
        return view('vehicle.show.vehicleShow')->with([
            'vehicle' => $this->repo->get($id)
        ]);
    }

}
