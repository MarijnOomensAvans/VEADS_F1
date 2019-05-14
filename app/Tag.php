<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function projects() {
        // See https://laraveldaily.com/pivot-tables-and-many-to-many-relationships/ for information about the pivot table
        return $this
            ->belongsToMany('App\Project', 'tag_project')
            ->withTimestamps();
    }

    public function events() {
        // See https://laraveldaily.com/pivot-tables-and-many-to-many-relationships/ for information about the pivot table
        return $this
            ->hasMany('App\Event', 'tag_event')
            ->withTimestamps();
    }

    public function pictures() {
        return $this
            ->hasMany('App\Picture', 'tag_project')
            ->withTimestamps();
    }
}
