<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{

  protected $fillable = [
      'name',
      'link',
  ];

  public function picture() {
    return $this->belongsTo("App\Picture");
  }
}
