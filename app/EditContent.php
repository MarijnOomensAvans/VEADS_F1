<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EditContent extends Model
{
    protected $fillable = [
        'key',
        'category',
        'title',
        'content',
        'type'
    ];

    protected $table = 'editable_contents';

    public $incrementing = false;

    protected $primaryKey = 'key';

    public function category() {
        return $this->hasOne('App\EditableContetnCategory', 'category', 'category');
    }
}
