<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class HomeController extends Controller
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
        return view('home');
    }



    public function addCharacter()
    {
        $group = \Auth::user()->group;

        $character = factory(\App\Models\Character::class)->create([
            'group_id' => $group->id
        ]);

        \Notification::successInstant($character->name . ' created.');

        return view('home');
    }

}
