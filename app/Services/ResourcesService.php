<?php namespace App\Services;

use App\Repositories\GroupRepository;

use Redis;

class ResourcesService
{

    public $resources;
    public $groupRepository;

    //public function __construct(CartRepository $CartRepository)
    public function __construct(GroupRepository $GroupRepository)
    {
        $this->groupRepository = $GroupRepository;

        $this->resources = unserialize(Redis::get('user:resources:' . auth()->user()->id));

        if(!$this->resources) {
            $this->update();
        }

    }

    private function update()
    {
        $groups = $this->groupRepository->all();

        $array = [];
        foreach(config('group.resources') as $resource) {
            $array[$resource] = $groups->sum($resource);
        }

        Redis::set('user:resources:' . auth()->user()->id, serialize($array));
        Redis::expire('user:resources:' . auth()->user()->id, 300);

        $this->resources = $array;
    }

    public function getAll()
    {
        return $this->resources;
    }

}
