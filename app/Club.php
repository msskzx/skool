<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
   /**
   * The attributes that are not mass assignable.
   *
   * @var array
   */
  protected $guarded = [];

  public function highLevel() {
     return $this->belongsTo('App\HighLevel');
  }
}
