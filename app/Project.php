<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description'
    ];

    public function address() {
        return $this->belongsTo('App\Address');
    }

    public function events() {
        return $this->hasMany('App\Event');
    }
}
