<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EditableContentCategory extends Model
{
    protected $fillable = [
        'category'
    ];

    public $timestamps = false;

    public function content() {
        return $this->hasMany('App\EditContent', 'category', 'category');
    }
}
