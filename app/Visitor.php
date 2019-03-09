<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'address_id',
        'name',
        'phone',
        'email',
        'amount_of_people',
        'notes'
    ];

    public function address() {
        return $this->hasOne('App\Address');
    }

    public function event() {
        return $this->belongsTo('App\Event');
    }
}
