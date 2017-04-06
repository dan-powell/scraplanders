<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Actions\RaidActionEnactRequest;

use App\Repositories\Actions\RaidActionRepository;

use App\Models\Group;

class RaidActionController extends Controller
{

    protected $repository;

    public function __construct(RaidActionRepository $RaidActionRepository)
    {
        $this->repository = $RaidActionRepository;
    }

    /**
     * Show the unit index
     *
     * @return \Illuminate\Http\Response
     */
    public function setup()
    {
        $user = \Auth::user();

        return view('action.raid.setup.actionRaidSetup')->with([
            'characters' => $user->group->characters,
            'groups' => Group::get()
        ]);
    }

    public function enact(RaidActionEnactRequest $request)
    {

        $group = $request->input('group');
        $characters = $request->input('characters');

        $results = $this->repository->enact($group, $characters);


        return view('action.raid.result.actionRaidResult')->with([
            'results' => $results,
        ]);;
    }

}
