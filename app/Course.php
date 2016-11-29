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
     return $this->belongsToMany('App\Student', 'course_has_student')->withTimestamps();
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

  /**
   * Prerequisites for this course.
   *
   * @return Student array
   */
  public function prerequisites() {
     return $this->belongsToMany('App\Course', 'course_requires_course', 'course_id', 'req_course_id')->withTimestamps();
  }

  /**
   * Courses requiring this course.
   *
   * @return Student array
   */
  public function coursesRequiring() {
     return $this->belongsToMany('App\Course', 'course_requires_course', 'req_course_id', 'course_id')->withTimestamps();
  }

  /**
   * School offering this course.
   *
   * @return School
   */
  public function school() {
     return $this->belongsTo('App\School');
  }

  public static function getCourse($course) {
     return \DB::select('select * from courses where id = ?', [$course])[0];
  }
}
