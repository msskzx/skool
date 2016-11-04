<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  /**
   * The attributes that are not mass assignable.
   *
   * @var array
   */
  protected $guarded = [];

  /**
   * Teacher associated with this course.
   *
   * @return Teacher
   */
  public function teacher() {
     return $this->belongsTo('App\Teacher');
  }

  /**
   * Students associated with this course.
   *
   * @return Student array
   */
  public function students() {
     return $this->hasMany('App\Student');
  }
}
