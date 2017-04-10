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
    public function getUserCharacters() {

        return auth()->user()->characters()->get();

    }

    // Get specific character if owned by user
    public function getUserCharacter($id) {

        return Character::findOrFail($id);

    }

}
