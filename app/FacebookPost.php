<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacebookPost extends Model
{
    protected $fillable = [
        'id',
        'page_id',
        'image_url',
        'message',
        'url',
        'created_at'
    ];

    public $incrementing = false;

    /**
     * FacebookPost belongs to an FacebookPage
     */
    public function page()
    {
        return $this->belongsTo('App\FacebookPage', 'page_id');
    }
}
