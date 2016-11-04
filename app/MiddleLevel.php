<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MiddleLevel extends Model
{
   /**
   * The attributes that are not mass assignable.
   *
   * @var array
   */
  protected $guarded = [];

  /**
   * school associated with this elementary level
   *
   * @return ElementaryLevel
   */
  public function school() {
     return $this->belongsTo('App\School');
  }
}
