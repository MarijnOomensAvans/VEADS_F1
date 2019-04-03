<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacebookPost extends Model
{
    
    /**
     * FacebookPost belongs to an FacebookPage
     */
    /**
     * Get the user that owns the phone.
     */
    public function page()
    {
        return $this->belongsTo('App\FacebookPage');
    }
}
