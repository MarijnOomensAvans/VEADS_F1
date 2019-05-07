<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class VeadsResponse extends Model
{
    use UsesUuid;

    protected $fillable = [
        'request_id',
        'description',
        'first_name',
        'last_name',
        'email',
        'phone'
    ];

    public function request() {
        return $this->belongsTo('App\VeadsRequest', 'request_id');
    }
}
