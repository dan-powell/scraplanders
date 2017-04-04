<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{

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
        //'toughness',
        'constitution',
        'dexterity',
        'intelligence',
        //'wisdom',
        //'charisma',
        //'willpower',
        'perception',
        //'luck',

        'hp',
        //'hp_max', // NOTE maybe max HP is taken from a combo of other stats?

        'experience',

        // NOTE Implement health effects
        // 'healthiness',
        // 'hunger',
        // 'thirst',
        // 'radiation',

        // IDEA Alignment can be a sliding scale of coordinates?
        // 'lawfulness',
        // 'goodness',

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

    public function getStatsAttribute($value)
    {
        $array = [];
        foreach(config('character.stats') as $key => $stat) {
            $array[$key] = $stat;
            $array[$key]['value'] = $this->$key;
        }
        return collect($array);
    }



}
