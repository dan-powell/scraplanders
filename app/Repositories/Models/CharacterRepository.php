<?php namespace App\Repositories\Models;

use App\Models\Character;

class CharacterRepository extends AbstractModelRepository
{

    public function __construct()
    {
        $this->model = new Character();
    }

    // Get all characters if owned by user
    public function all($with = [])
    {
        return auth()->user()->characters()->with($with)->get();
    }

}
