<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventDateTime extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'start',
        'end'
    ];

    protected $dates = [
    	'start',
	    'end'
    ];

    public function event() {
        return $this->belongsTo('App\Event');
    }

    public function startwotime() {
        $start = $this->start;
        $arr = explode(" ", $start, 2);
        $first = $arr[0];
        return $first;
    }
}
