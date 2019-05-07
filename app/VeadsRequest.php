<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class VeadsRequest extends Model
{
    use UsesUuid;

    protected $fillable = [
        'type',
        'title',
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

    public function responses() {
        return $this->hasMany('App\VeadsResponse', 'request_id');
    }
}
