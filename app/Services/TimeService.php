<?php namespace App\Services;

use Redis;
use App\Models\Setting;

class TimeService
{

    private $start_year;
    private $minutes;

    public function __construct()
    {

        $this->start_year = config('general.time.start_year');

        // Get the number of minutes elapsed from Redis
        $this->minutes = Redis::get('system.minutes');

        // If minutes are not found
        if(!$this->minutes) {

            // Check for a value saved in the database
            $hours = Setting::find('hours_elapsed');

            if ($hours) {
                // If the database has a value, update Redis
                Redis::set('system.minutes', $hours->value * 60);
            } else {
                // Otherwise set the time to 0
                Redis::set('system.minutes', 0);
                $this->minutes = 0;
            }
        }

    }

    // Update the time
    public function update() {
        // Save minutes to Redis
        $time = Redis::incrby('system.minutes', config('general.time.minutes_every_update'));

        // Every 60 minutes, update the hour in the database
        if(($time % 60) == 0) {
            $this->saveHour();
        }

    }


    public function setMinutes($minutes) {

        // Save minutes to Redis
        Redis::set('system.minutes', $minutes);

        $this->minutes = $minutes;

        // Every 60 minutes, update the hour in the database
        if(($minutes % 60) == 0) {
            $this->saveHour();
        }

    }


    // Save the hour to the database
    private function saveHour() {
        Setting::updateOrCreate(['id' => 'hours_elapsed'], ['key' => 'hours_elapsed', 'value' => $this->getHour() + 1]);
    }

    // Get the current year
    public function getYear() {
        return floor($this->start_year + ((($this->minutes / 60) / 24) / 365));
    }

    // Get the day of the year
    public function getDay() {
        return ((($this->minutes / 60) / 24) % 365) + 1;
    }

    // Get the hour of the day
    public function getHour() {
        return ($this->minutes / 60) % 24;
    }

    // Get the minutes of the hour
    public function getMinute() {
        return ($this->minutes) % 60;
    }

}
