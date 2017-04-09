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

    public function getUserCharacters() {

        $groups = \Auth::user()->groups()->with('characters')->get();

        return $groups->pluck('characters')->flatten();

    }

}
