<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{

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
