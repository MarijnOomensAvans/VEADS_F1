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
        return $this->lastPosts(1)[0];
    }

    public function lastPosts(int $limit = 1) {
        return $this->posts()->orderBy('created_at', 'desc')->limit($limit)->get();
    }
}
