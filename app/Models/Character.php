<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\OwnedByUserScope;

use Carbon\Carbon;
use Utilities;

class Character extends Model
{

    /**
    * The "booting" method of the model.
    *
    * @return void
    */
    protected static function boot()
    {
        parent::boot();

        // Only return characters that are owned by user
        static::addGlobalScope(new OwnedByUserScope('group'));
    }

    protected $fillable = [
        // Details
        'firstname',
        'lastname',
        'nickname',
        'dob',

        // Stats
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

        // Health
        // NOTE Implement health effects
        'hp',
        'health',
        'mood',
        'hunger',
        'thirst',
        'rads',

        // Temperment
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
    ];

    /****************
    * Relationships
    ****************/

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    public function user()
    {
        return $this->group->user();
    }

    /****************
    * Attributes
    ****************/

    // The full name
    public function getNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    // The full name
    public function getFullNameAttribute()
    {
        if(isset($this->nickname)) {
            return $this->firstname . ' "' . $this->nickname .' "' . $this->lastname;
        }
        else {
            return $this->firstname . ' ' . $this->lastname;
        }
    }

    // Age in years
    public function getAgeAttribute()
    {
        return app('time')->getYear() - $this->birthyear;
    }

    // Returns just the stats of the character
    public function getStatsAttribute()
    {
        $array = [];
        foreach(config('character.stats') as $stat) {
            $array[$stat] = round($this->$stat);
        }
        return collect($array);
    }

    public function getMaxStatValueAttribute()
    {
        return $this->stats->max();
    }


    public function getLevelAttribute()
    {
        $stats = $this->getStatsAttribute();
        return $stats->sum();
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

    public function getHeftAttribute()
    {
        $heft = Utilities::singleValueFromArray($this->stats, config('character.heft'));
        return round($heft * 10);
    }

    public function getIsAdultAttribute()
    {
        if ($this->age >= 18) {
            return true;
        } else {
            return false;
        }
    }

    public function getIsInjuredAttribute()
    {
        if ($this->hp < $this->max_hp/2) {
            return true;
        } else {
            return false;
        }
    }

    public function getIsAliveAttribute()
    {
        if ($this->hp >= 0) {
            return true;
        } else {
            return false;
        }
    }

    /****************
    * Handy Methods
    ****************/


    // Get the maximum HP based on character stats
    // Accepts an array of character stats & values
    // Returns integer
    static function getMaxHp($attributes)
    {
        $hp = Utilities::singleValueFromArray($attributes, config('character.hp'));
        return round($hp * 10);
    }




}
