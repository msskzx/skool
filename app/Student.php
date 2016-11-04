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
   * School associated with this student.
   *
   * @return School
   */
  public function school() {
     return $this->belongsTo('App\School');
  }

  /**
   * User associated with this student.
   * 
   * @return User
   */
  public function user() {
     return $this->belongsTo('App\User', 'username', 'username');
  }

  /**
   * Clubs associated with this student.
   *
   * @return User
   */
  public function clubs() {
     return $this->belongsToMany('App\Club');;
  }


}
