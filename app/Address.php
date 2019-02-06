<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'street',
        'number',
        'number_modifier',
        'zipcode',
        'city',
        'country'
    ];

    public function events() {
        return $this->belongsToMany('App\Event');
    }

    public function applications() {
        return $this->belongsToMany('App\Application');
    }
}
