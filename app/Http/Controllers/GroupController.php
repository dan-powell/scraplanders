<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Models\GroupRepository;

class GroupController extends Controller
{

    protected $repo;

    public function __construct(GroupRepository $groupRepo)
    {
        $this->repo = $groupRepo;
    }

    public function index()
    {
        return view('group.index.groupIndex')->with([
            'groups' => $this->repo->all()
        ]);
    }

    public function show($id)
    {
        return view('group.show.groupShow')->with([
            'group' => $this->repo->get($id)
        ]);
    }

}
