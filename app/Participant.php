<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email'
    ];

    /**
     * InstagramPost belongs to an InstagramPage
     */
    public function event()
    {
        return $this->belongsTo('App\Event', 'event_id');
    }
}
