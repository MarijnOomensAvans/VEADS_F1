<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VeadsLookingForProductService extends Model
{
    protected $fillable = [
        'product_service_name',
        'amount',
        'description',
        'event_id',
        'project_id'
    ];

    public function project() {
        return $this->belongsTo('App\Project');
    }

    public function event() {
        return $this->belongsTo('App\Event');
    }
}
