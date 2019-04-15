<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstagramPage extends Model
{
    protected $primaryKey = 'name';

    protected $fillable = [
        'name',
        'access_token',
        'last_refresh'
    ];

    public $incrementing = false;

    protected $casts = [
        'last_refresh' => 'datetime'
    ];
}
