<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Student extends Model
{
 /**
   * The attributes that are not mass assignable.
   *
   * @var array
   */
  protected $guarded = [];

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = false;

  /**
   * School which accepted this student.
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
     return $this->belongsToMany('App\Club', 'club_joinedBy_student');
  }

  /**
   * Parents of this student.
   *
   * @return Parentt array
   */
  public function parents() {
     return $this->belongsToMany('App\Parentt', 'parent_has_student');
  }

  /**
   * Courses studied by this student.
   *
   * @return Course array
   */
  public function courses() {
     return $this->belongsToMany('App\Course', 'course_has_student');
  }

 /**
  * Activties joined by this student.
  *
  * @return Activitie array
  */
  public function activities() {
     return $this->belongsToMany('App\Activity', 'activity_joinedBy_student')->withPivot('accepted');
  }

  /**
   * Questions asked by this student.
   *
   * @return Question array
   */
  public function questions() {
     return $this->hasMany('App\Question');
  }

  /**
   * Assignments solved by this student.
   *
   * @return Assignment array
   */
  public function assignments() {
     return $this->belongsToMany('App\Assignment', 'assignment_solvedBy_student')->withPivot('grade', 'solution');
  }

  /**
   * Schools which this student applied to join.
   *
   * @return School
   */
  public function schools() {
     return $this->belongsToMany('App\School', 'school_appliedBy_student')->withPivot('accepted', 'parentt_id');
  }

  /**
   * Reports associated with this student.
   *
   * @return Report array
   */
  public function reports() {
     return $this->hasMany('App\Report');
  }

  /**
   * Get the age of a student.
   *
   * @param  Student $student
   * @return int
   */
  public function getAgeAttribute() {
      return Carbon::parse($this->birth_date)->age;
  }

  public static function getStudent($student) {
     return \DB::select('select * from students where id = ?', [$student])[0];
  }
}
