<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Actions\RaidActionEnactRequest;

use App\Repositories\Actions\RaidActionRepository;
use App\Repositories\GroupRepository;
use App\Repositories\CharacterRepository;

class RaidActionController extends Controller
{

    protected $repository;
    protected $groupRepository;
    protected $characterRepository;

    public function __construct(RaidActionRepository $RaidActionRepository, GroupRepository $GroupRepository, CharacterRepository $CharacterRepository)
    {
        $this->repository = $RaidActionRepository;
        $this->groupRepository = $GroupRepository;
        $this->characterRepository = $CharacterRepository;
    }

    /**
     * Show the unit index
     *
     * @return \Illuminate\Http\Response
     */
    public function setup()
    {
        return view('action.raid.setup.actionRaidSetup')->with([
            'characters' => $this->characterRepository->all(),
            'groups' => $this->groupRepository->allAny()
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
