<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\HealthRepository;

class Character extends Model
{
    use \App\Traits\ExperienceTrait;
    use \App\Traits\HealthTrait;

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

        'hp',
        'experience',

        // NOTE Implement health effects
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
            $array[$key]['value'] = $this->$key;
        }
        return collect($array);
    }

    public function getLevelAttribute()
    {
        return $this->getLevelFromExperience($this->experience);
    }

    public function getNextLevelExperienceAttribute()
    {
        return $this->getExperienceRequiredNextLevel($this->experience);
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


}
