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

    public function start() {
        $unformatted = $this->start;
        $splitted = explode(' ', $unformatted, 2);

        $datesplit = explode('-', $splitted[0],3);
        $normaldate = $datesplit[2] . '-' . $datesplit[1] . '-' . $datesplit[0];
        return $normaldate . ' ' . $splitted[1];
    }

    public function end() {
        $unformatted = $this->end;
        $splitted = explode(' ', $unformatted, 2);

        $datesplit = explode('-', $splitted[0],3);
        $normaldate = $datesplit[2] . '-' . $datesplit[1] . '-' . $datesplit[0];
        return $normaldate . ' ' . $splitted[1];
    }

}
