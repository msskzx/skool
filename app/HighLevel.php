<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HighLevel extends Model
{
   /**
   * The attributes that are not mass assignable.
   *
   * @var array
   */
  protected $guarded = [];

  /**
   * School associated with this high level.
   *
   * @return School
   */
  public function school() {
     return $this->belongsTo('App\School');
  }

  /**
   * Clubs associated with this high level.
   *
   * @return Club array
   */
  public function clubs() {
     return $this->hasMany('App\Club');
  }

}
