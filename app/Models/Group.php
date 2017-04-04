<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'groups';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'scrap',
        'food',
        'water',
        'fuel'
    ];


    /****************
     * Relationships
     ****************/

    public function user()
	{
		return $this->belongsTo('App\Models\User');
	}


    public function characters()
    {
        return $this->hasMany('App\Models\Character');
    }

    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle');
    }


    /****************
    * Attributes
    ****************/




}
