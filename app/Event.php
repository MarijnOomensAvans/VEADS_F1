<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address_id',
        'name',
        'description',
        'price'
    ];

    public function address() {
        return $this->belongsTo('App\Address');
    }

    public function datetime() {
        return $this->hasOne('App\EventDateTime');
    }

    public function applications() {
        return $this->hasMany('App\Application');
    }

    public function importantPeople() {
        // See https://laraveldaily.com/pivot-tables-and-many-to-many-relationships/ for information about the pivot table
        return $this
            ->belongsToMany('App\ImportantPerson')
            ->withPivot('task')
            ->withTimestamps();
    }
}
