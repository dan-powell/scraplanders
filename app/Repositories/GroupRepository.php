<?php namespace App\Repositories;

use App\Models\Group;

class GroupRepository
{

    // Get all if owned by user
    public function all()
    {
        return auth()->user()->groups()->get();
    }

    // Get specific if owned by user
    public function get($id)
    {
        return Group::findOrFail($id);
    }

    // Get any, regardless of ownership
    public function getAny($id)
    {
        return Group::withoutGlobalScopes()->findOrFail($id);
    }

    public function allAny()
    {
        return Group::withoutGlobalScopes()->get();
    }




    public function updateResources() {

        $groups = $this->allAny();

        foreach($groups as $group) {
            foreach($group->resources as $key => $resource) {
                $group->$key = $resource - 1;
                // prevent resource going below 0;
                if ($group->$key < 0) {
                    $group->$key = 0;
                }
            }

            $group->save();
        }

    }

}
