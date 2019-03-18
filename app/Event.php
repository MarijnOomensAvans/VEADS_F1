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
        'price',
        'project_id',
        'published'
    ];

    public function address() {
        return $this->belongsTo('App\Address');
    }

    public function datetime() {
        return $this->hasOne('App\EventDateTime');
    }

    public function visitors() {
        return $this->hasMany('App\Visitor');
    }

    public function importantPeople() {
        // See https://laraveldaily.com/pivot-tables-and-many-to-many-relationships/ for information about the pivot table
        return $this
            ->belongsToMany('App\ImportantPerson')
            ->withPivot('task')
            ->withTimestamps();
    }

    public function volunteers() {
        // See https://laraveldaily.com/pivot-tables-and-many-to-many-relationships/ for information about the pivot table
        return $this
            ->belongsToMany('App\Volunteer')
            ->withTimestamps();
    }

    public function pictures() {
        return $this
            ->belongsToMany('App\Picture')
            ->withTimestamps();
    }

    public function project() {
        return $this->belongsTo('App\Project');
    }
}
