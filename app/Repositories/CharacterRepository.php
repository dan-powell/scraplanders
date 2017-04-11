<?php namespace App\Repositories;

use App\Models\Character;
//use App\Repositories\Group;

class CharacterRepository
{

    //protected $groupRepo;

    //public function __construct(GroupRepository $groupRepo)
    public function __construct()
    {
        //$this->groupRepo = $groupRepo;
    }

    // Get all characters if owned by user
    public function all() {

        return auth()->user()->characters()->get();

    }

    // Get specific character if owned by user
    public function get($id) {

        return Character::findOrFail($id);

    }

    // Get any character, regardless of ownership
    public function getAny($id) {

        return Character::withoutGlobalScopes()->findOrFail($id);

    }
}
