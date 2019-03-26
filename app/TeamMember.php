<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'picture_id',
        'first_name',
        'last_name',
        'function',
        'description'
    ];

    public function getFullNameAttribute() {
        return $this->first_name . " " . $this->last_name;
    }
}
