<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElementaryLevel extends Model
{
   /**
   * The attributes that are not mass assignable.
   *
   * @var array
   */
  protected $guarded = [];

  public function school() {
     return $this->belongsTo('App\School');
  }

}
