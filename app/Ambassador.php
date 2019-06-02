<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambassador extends Model
{
    protected $fillable = [
        'name',
        'company',
        'url',
        'description'
    ];

    public function picture() {
        return $this->belongsTo('App\Picture');
    }
}
