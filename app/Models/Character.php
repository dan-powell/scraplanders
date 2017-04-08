<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{

    protected $fillable = [
        'firstname',
        'lastname',
        'nickname',
        'dob',

        'strength',
        'toughness',
        'constitution',
        'dexterity',
        'intelligence',
        'wisdom',
        'charisma',
        'willpower',
        'perception',
        'luck',

        // NOTE Implement health effects
        'hp',
        'heath',
        'mood',
        'hunger',
        'thirst',
        'rads',

        // IDEA Alignment can be a sliding scale of coordinates?
        'lawfulness',
        'goodness',
        //'temperment',

        // IDEA templates provide a structure for distributing stat points when leveling up
        // 'templates'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'dob',
    ];

    /****************
     * Relationships
     ****************/

    public function group()
	{
		return $this->belongsTo('App\Models\Group');
	}

    /****************
    * Attributes
    ****************/

    // The full name
    public function getNameAttribute($value)
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    // Returns just the stats of the character
    public function getStatsAttribute()
    {
        $array = [];
        foreach(config('character.stats') as $key => $stat) {
            $array[$key] = $stat;
            $array[$key]['value'] = round($this->$key);
        }
        return collect($array);
    }

    public function getLevelAttribute()
    {
        $stats = $this->getStatsAttribute();
        return $stats->sum('value');
    }

    // Returns HP limited by the maximum
    public function getHpAttribute($value)
    {
        return min($value, $this->getMaxHp($this->attributes));
    }

    public function getMaxHpAttribute()
    {
        return $this->getMaxHp($this->attributes);
    }

    public function getLawfulnessNameAttribute()
    {
        if($this->lawfulness > -0.33) {
            if($this->lawfulness > 0.33) {
                $lawfulness = 'Lawful';
            } else {
                $lawfulness = 'Neutral';
            }
        } else {
            $lawfulness = 'Chaotic';
        }
        return $lawfulness;
    }

    public function getGoodnessNameAttribute()
    {
        if($this->goodness > -0.33) {
            if($this->goodness > 0.33) {
                $goodness = 'Good';
            } else {
                $goodness = 'Neutral';
            }
        } else {
            $goodness = 'Evil';
        }
        return $goodness;
    }

    public function getAlignmentAttribute()
    {
        if ($this->lawfulnessName == $this->goodnessName) {
            return 'True ' . $this->lawfulnessName;
        } else {
            return $this->lawfulnessName . ' ' . $this->goodnessName;
        }
    }








    /****************
    * Handy Methods
    ****************/


    // Distributes points to stats randomly
    static function distributePoints($points = 1)
	{
        $stats = config('character.stats');
        $stats_array = array_map(function() { return 0; }, $stats);
        for($i = 0; $i < $points; $i++) {
            // Choose a random stats
            $stat = array_rand($stats_array);
            $stats_array[$stat] = $stats_array[$stat] + 1;
        }
        return $stats_array;
	}

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
