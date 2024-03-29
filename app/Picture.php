<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'name',
        'date'
    ];

    protected $dates = [
        'date',
    ];

    public function events() {
        return $this
            ->belongsToMany('App\Event')
            ->withTimestamps();
    }

    public function projects() {
        return $this
            ->belongsToMany('App\Project')
            ->withTimestamps();
    }

    public function tags() {
        return $this
            ->belongsToMany('App\Tag')
            ->withTimestamps();
    }
}
