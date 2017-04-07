<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index()
    {
        $user = \Auth::user();

        return view('group.index.groupIndex')->with([
            'groups' => Group::all()
        ]);
    }

    public function show($id)
    {
        return view('group.show.groupShow')->with([
            'group' => Group::with('characters')->findOrFail($id)
        ]);
    }

    public function own()
    {
        $user = \Auth::user();

        return view('group.show.groupShow')->with([
            'group' => Group::where('user_id', $user->id)->first()
        ]);
    }

}
