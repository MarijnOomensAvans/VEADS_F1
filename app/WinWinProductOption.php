<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WinWinProductOption extends Model
{
    protected $fillable = [
        'option'
    ];

    public $timestamps = false;

    public function winWinProducts() {
        return $this->hasMany('App\WinWinProduct', 'option', 'option');
    }
}
