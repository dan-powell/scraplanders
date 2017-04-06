<?php namespace App\Traits;

trait HealthTrait
{

    public function getMaxHp($character)
    {
        $base = 0;
        foreach(config('character.stats') as $key => $stat) {
            if (isset($stat['health_constant']) && $stat['health_constant'] > 0) {
                $base += $stat['health_constant'] * $character->$key;
            }
        }

        return round($base * 10);
    }

}
