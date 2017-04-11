<?php namespace App\Services;

use Redis;

class TimeService
{

    private $year;

    public function __construct()
    {
        $this->year = Redis::get('time.year');

        if(!$this->year) {
            Redis::set('time.year', config('general.epoch'));
        }

    }

    public function update() {
        Redis::incr('time.year');
    }

    public function year() {
        return $this->year;
    }

}
