<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use \App\Traits\ExperienceTrait;
    use \App\Traits\HealthTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
        // 'hp_max', // NOTE maybe max HP is taken from a combo of other stats?

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

    public function getNameAttribute($value)
    {
        return $this->firstname . ' ' . $this->lastname;
    }

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

    public function getHpAttribute($value)
    {
        return min($value, $this->getMaxHp($this));
    }

    public function getMaxHpAttribute()
    {
        return $this->getMaxHp($this);
    }


}
