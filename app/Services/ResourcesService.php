<?php namespace App\Services;

use App\Models\Group;

class ResourcesService
{

    public $user;
    public $resources;

    //public function __construct(CartRepository $CartRepository)
    public function __construct()
    {

        //$this->cartRepository = $CartRepository;
        $this->user = \Auth::user();
        $redis = \Redis::get('user:resources:' . $this->user->id);

        if($redis) {
            $this->resources = unserialize($redis);
        } else {
            $groups = Group::where('user_id', $this->user->id)->get();

            $array = [];
            foreach(config('group.resources') as $resource) {
                $array[$resource] = $groups->sum($resource);
            }

            \Redis::set('user:resources:' . $this->user->id, serialize($array));

            $this->resources = $array;
        }

    }

    public function getAll() {
        return $this->resources;
    }


}
