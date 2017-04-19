<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Models\CharacterRepository;

class CharacterController extends Controller
{

    protected $repo;

    public function __construct(CharacterRepository $characterRepo)
    {
        $this->repo = $characterRepo;
    }

    public function index()
    {
        return view('character.index.characterIndex')->with([
            'characters' => $this->repo->all()
        ]);
    }

    public function show($id)
    {
        return view('character.show.characterShow')->with([
            'character' => $this->repo->get($id)
        ]);
    }

}
