<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonatedProduct extends Model
{
    protected $fillable = [
        'volunteer_id',
        'name',
        'description',
        'quantity',
        'lend',
        'first_name',
        'last_name',
        'email'
    ];

    public function volunteer() {
        return $this->belongsTo('App\Volunteer');
    }
}
