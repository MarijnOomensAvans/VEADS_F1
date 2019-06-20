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

    public function posts() {
        return $this->hasMany('App\InstagramPost', 'page_name');
    }

    public function lastPosts(int $limit = 1) {
        return $this->posts()->orderBy('created_at', 'desc')->where('image_url', '!=', '')->limit($limit)->get();
    }
}
