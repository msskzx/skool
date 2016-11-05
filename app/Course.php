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
   * Teacher teaching this course.
   *
   * @return Teacher
   */
  public function teacher() {
     return $this->belongsTo('App\Teacher');
  }

  /**
   * Students studying this course.
   *
   * @return Student array
   */
  public function students() {
     return $this->belongsToMany('App\Student')->withTimestamps();
  }

  /**
   * Questions associated with this course.
   *
   * @return Question array
   */
  public function questions() {
     return $this->hasMany('App\Question');
  }

  /**
  * Assignments associated with this course.
  *
  * @return Assignment array
  */
  public function assignments() {
     return $this->hasMany('App\Assignment');
  }
}
