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

    public $incrementing = false;

    protected $casts = [
        'last_refresh' => 'datetime'
    ];

    public function posts() {
        return $this->hasMany('App\FacebookPost', 'page_id');
    }

    public function getLastPostAttribute() {
        return $this->posts()->orderBy('created_at', 'desc')->first();
    }
}
