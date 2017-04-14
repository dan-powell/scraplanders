<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\OwnedByUserScope;

class Vehicle extends Model
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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'chassis', 'plant',
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

    public function getChassisAttribute($value)
    {
        $collection = collect(config('vehicle.chassis.' . $value));

        foreach($collection as $key => $value) {
            $collection->$key = $value;
        }

        return $collection;
    }

    public function getPlantAttribute($value)
    {
        $collection = collect(config('vehicle.plant.' . $value));

        foreach($collection as $key => $value) {
            $collection->$key = $value;
        }

        return $collection;
    }


}
