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
            ->belongsToMany('App\Project')
            ->withTimestamps();
    }

    public function events() {
        // See https://laraveldaily.com/pivot-tables-and-many-to-many-relationships/ for information about the pivot table
        return $this
            ->belongsToMany('App\Event')
            ->withTimestamps();
    }

    public function pictures() {
        return $this
            ->belongsToMany('App\Picture')
            ->withTimestamps();
    }
}
