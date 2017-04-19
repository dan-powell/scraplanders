<?php namespace App\Repositories\Models;

use App\Models\Vehicle;

class VehicleRepository extends AbstractModelRepository
{

    public function __construct()
    {
        $this->model = new Vehicle();
    }

    // Get all vehicles owned by user
    public function all()
    {
        return auth()->user()->vehicles()->get();
    }

}
