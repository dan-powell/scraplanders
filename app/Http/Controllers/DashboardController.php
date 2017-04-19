<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use App\Jobs\CharacterEncounter;

class DashboardController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.dashboard');
    }



    public function addCharacter()
    {
        $group = \Auth::user()->group;

        $character = factory(\App\Models\Character::class)->create([
            'group_id' => $group->id
        ]);

        \Notification::successInstant($character->name . ' created.');

        return view('dashboard.dashboard');
    }

    public function updateCharacters()
    {
        $characters = Character::withoutGlobalScopes()->get();

        foreach($characters as $character) {
            dispatch(new CharacterEncounter($character));
        }

        \Notification::successInstant('processing ' . count($characters) . ' characters');

        return view('dashboard.dashboard');
    }

}
