<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   /**
   * The attributes that are not mass assignable.
   *
   * @var array
   */
  protected $guarded = [];

  /**
   * school of this student
   * @return School
   */
  public function school() {
     return $this->belongsTo('App\School');
  }

  /**
   * user associated with this student
   * @return User
   */
  public function user() {
     return $this->belongsTo('App\User', 'username', 'username');
  }
}
