<?php namespace App\Traits;

trait HealthTrait
{

    static function getMaxHp($attributes)
    {

        $base = 0;
        foreach(config('character.stats') as $key => $stat) {
            if (isset($stat['health_constant']) && $stat['health_constant'] > 0) {
                $base += $stat['health_constant'] * $attributes[$key];
            }
        }

        return round($base * 10);
    }


}
