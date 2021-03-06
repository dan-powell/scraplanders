<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messages()
    {
        return $this->hasMany('App\Models\Ui\Message');
    }

    public function groups()
    {
        return $this->hasMany('App\Models\Group');
    }

    public function characters()
    {
        return $this->hasManyThrough('App\Models\Character', 'App\Models\Group');
    }

    public function vehicles()
    {
        return $this->hasManyThrough('App\Models\Vehicle', 'App\Models\Group');
    }


    /****************
    * Attributes
    ****************/

    // The full name
    public function getFuelAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    // Age in years
    public function getAgeAttribute()
    {
        return $this->dob->diffInYears(Carbon::now(), false);
    }




}
