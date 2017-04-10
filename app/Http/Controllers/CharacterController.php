<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CharacterRepository;

class CharacterController extends Controller
{

    protected $characterRepo;

    public function __construct(CharacterRepository $characterRepo)
    {
        $this->characterRepo = $characterRepo;
    }

    public function index()
    {
        return view('character.index.characterIndex')->with([
            'characters' => $this->characterRepo->getUserCharacters()
        ]);
    }

    public function show($id)
    {
        return view('character.show.characterShow')->with([
            'character' => $this->characterRepo->getUserCharacter($id)
        ]);
    }

}
