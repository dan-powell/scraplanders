<?php namespace App\Services;

use Redis;
use App\Models\Setting;

class TimeService
{

    private $start_year;
    private $hour;

    public function __construct()
    {

        $this->start_year = config('general.epoch');

        $this->hour = Redis::get('time.hour');

        if(!$this->hour) {
            $hour = Setting::find('day');

            if ($hour) {
                Redis::set('time.hour', $hour->value * 24);
            } else {
                Redis::set('time.hour', 0);
            }
        }

    }




    public function update() {
        $hour = Redis::incr('time.hour');

        // Every 24 hours update the day in the database
        if(($hour % 24) == 0) {
            $this->updateDay();
        }

    }

    public function updateDay() {
        Setting::updateOrCreate(['id' => 'day'], ['key' => 'day', 'value' => $this->getDay() + 1]);
    }


    public function getYear() {
        return floor($this->start_year + (($this->hour / 24) / 365));
    }

    public function getDay() {
        return ($this->hour / 24) % 365;
    }

    public function getHour() {
        return $this->hour % 24;
    }

}
