<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{

    use \App\Traits\ExperienceTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the unit index
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        return view('character.index.characterIndex')->with([
            'characters' => $user->group->characters
        ]);
    }

    public function show($id)
    {
        $character = Character::findOrFail($id);

        return view('character.show.characterShow')->with([
            'character' => $character,
            'max_stat' => $character->stats->pluck('value')->max(),
            'levels' => $this->getExperienceLevels($character->level)
        ]);
    }

}
