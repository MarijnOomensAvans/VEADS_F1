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

    public function volunteers() {
        // See https://laraveldaily.com/pivot-tables-and-many-to-many-relationships/ for information about the pivot table
        return $this
            ->belongsToMany('App\Volunteer')
            ->withTimestamps();
    }

    public function tags() {
        return $this
            ->belongsToMany('App\Tag', 'tag_project')
            ->withTimestamps();
    }

    public function tagsText(){
        $values = array_map(function ($tag) { return $tag['name']; }, $this->tags()->get()->toArray());
        return implode(', ', $values);
    }

    public function requests() {
        return $this->hasMany('App\VeadsRequest');
    }
}
