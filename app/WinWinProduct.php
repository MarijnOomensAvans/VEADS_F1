<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WinWinProduct extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'product_name',
        'amount',
        'description',
        'event_id',
        'project_id',
        'lend_donate'
    ];

    public function option() {
        return $this->hasOne('App\WinWinProductOption', 'option', 'option');
    }
}
