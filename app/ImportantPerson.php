<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportantPerson extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function events() {
        // See https://laraveldaily.com/pivot-tables-and-many-to-many-relationships/ for information about the pivot table
        return $this
            ->belongsToMany('App\Event')
            ->withPivot('task')
            ->withTimestamps();
    }
}
