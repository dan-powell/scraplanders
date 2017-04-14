<?php namespace App\Repositories;

use App\Models\Vehicle;
//use App\Repositories\Group;

class VehicleRepository
{

    //protected $groupRepo;

    //public function __construct(GroupRepository $groupRepo)
    public function __construct()
    {
        //$this->groupRepo = $groupRepo;
    }

    // Get all characters if owned by user
    public function all() {

        return auth()->user()->vehicles()->get();

    }

    // Get specific character if owned by user
    public function get($id) {

        return Vehicle::findOrFail($id);

    }

    // Get any character, regardless of ownership
    public function getAny($id) {

        return Vehicle::withoutGlobalScopes()->findOrFail($id);

    }
}
