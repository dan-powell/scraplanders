<?php namespace App\Repositories\Models;

use App\Models\Group;

class GroupRepository extends AbstractModelRepository
{

    public function __construct() {
        $this->model = new Group();
    }

    // Get all if owned by user
    public function all($with = [])
    {
        return auth()->user()->groups()->with($with)->get();
    }

    public function consumptionUpdate() {

        // Get all the groups
        // TODO - split this in to different batches
        $groups = $this->allAny(['charactersAll']);

        // Consume food
        foreach($groups as $group) {
            $group->food =- count($group->characters);
            if($group->food < 0) {
                $group->food = 0;
            }
        }

        // Consume Water
        foreach($groups as $group) {
            $group->water =- count($group->characters);
            if($group->water < 0) {
                $group->water = 0;
            }

        }

        foreach($groups as $group) {
            $group->save();
        }


    }

}
