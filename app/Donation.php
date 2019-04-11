<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'amount',
        'email',
        'event_id'
    ];

    protected $casts = [
        'paid_at' => 'datetime',
        'refunded_at' => 'datetime'
    ];

    public function event() {
        return $this->belongsTo('App\Event');
    }

    public function getFullNameAttribute() {
        $parts = [];

        if (!empty($this->first_name)) {
            $parts[] = $this->first_name;
        }

        if (!empty($this->last_name)) {
            $parts[] = $this->last_name;
        }

        $full_name = implode(' ', $parts);

        if (empty($full_name)) {
            return 'Anoniem';
        }

        return $full_name;
    }
}
