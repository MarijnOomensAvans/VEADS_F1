<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstagramPost extends Model
{

    protected $fillable = [
        'id',
        'page_name',
        'image_url',
        'message',
        'url',
        'created_at'
    ];
    
    /**
     * InstagramPost belongs to an InstagramPage
     */
    public function page()
    {
        return $this->belongsTo('App\InstagramPage', 'page_name');
    }
}
