<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacebookPage extends Model
{
    protected $fillable = [
        'id',
        'name',
        'access_token',
        'last_refresh'
    ];

    protected $casts = [
        'last_refresh' => 'datetime'
    ];
}
