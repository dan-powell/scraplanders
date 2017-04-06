<?php namespace App\Traits;

trait HealthTrait
{

    // Get the maximum HP based on character stats
    // Accepts an array of character stats & values
    // Returns integer
    static function getMaxHp($attributes)
    {
        /* Each stat with a 'health_constant' multiplies the stat itself
        For example:
        (strength * 0.3) +
        (toughness * 0.2) +
        (constitution * 0.4) +
        (willpower * 0.1)
        * multiplier = max_hp
        */

        $base = 0;
        // Loop through each stat type
        foreach(config('character.stats') as $key => $stat) {
            // Does the stat type have a constant we can use?
            if (isset($stat['health_constant']) && $stat['health_constant'] > 0) {
                // Add the stat value by itself
                $base += $stat['health_constant'] * $attributes[$key];
            }
        }
        // Times by the multiplyer...
        $base = $base * config('character.health.multiplier');
        // Don't forget to round the number
        return round($base);
    }


}
