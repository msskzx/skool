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

  /**
   * High level associated with this club
   * @return User
   */
  public function highLevel() {
     return $this->belongsTo('App\HighLevel');
  }

  /**
   * Clubs associated with this student
   * @return User
   */
  public function students() {
     return $this->belongsToMany('App\Student');
  }
}
