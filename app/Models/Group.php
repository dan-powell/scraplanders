<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\OwnedByUserScope;

class Group extends Model
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
        static::addGlobalScope(new OwnedByUserScope());
    }

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

    protected $appends = [
        'resources'
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

    public function charactersAll()
    {
        return $this->hasMany('App\Models\Character')->withoutGlobalScopes();
    }

    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle');
    }


    /****************
    * Attributes
    ****************/

    // Returns just the stats of the character
    public function getResourcesAttribute()
    {
        $array = [];
        foreach(config('group.resources') as $resource) {
            $array[$resource] = $this->$resource;
        }
        return collect($array);
    }


}
