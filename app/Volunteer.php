<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone_number',
        'address_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function address() {
        return $this->belongsTo('App\Address');
    }

    public function events() {
        // See https://laraveldaily.com/pivot-tables-and-many-to-many-relationships/ for information about the pivot table
        return $this
            ->belongsToMany('App\Event')
            ->withTimestamps();
    }

    public function projects() {
        // See https://laraveldaily.com/pivot-tables-and-many-to-many-relationships/ for information about the pivot table
        return $this
            ->belongsToMany('App\Project')
            ->withTimestamps();
    }

    public function getNameAttribute() {
        return $this->first_name . " " . $this->last_name;
    }

}
