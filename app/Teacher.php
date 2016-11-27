<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
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
    * Employee associated with this teacher.
    *
    * @return Employee
    */
   public function employee() {
      return $this->belongsTo('App\Employee', 'id', 'id');
   }

   /**
    * Courses taught by this teacher.
    *
    * @return Course array
    */
   public function courses() {
      return $this->hasMany('App\Course');
   }

   /**
    * Teacher supervising this teacher.
    *
    * @return Teacher
    */
   public function supervisor() {
      return $this->belongsTo('App\Teacher', 'supervisor_id');
   }

   /**
    * Teachers supervised by this teacher.
    *
    * @return Teacher array
    */
   public function teachers() {
      return $this->hasMany('App\Teacher','supervisor_id');
   }

   /**
    * Activties assigned to this teacher.
    *
    * @return Activitie array
    */
   public function activities() {
      return $this->hasMany('App\Activity');
   }

   /**
    * Parents who rated this teacher.
    *
    * @return Parentt array
    */
   public function parents() {
      return $this->belongsToMany('App\Parentt', 'parent_rates_teacher')->withPivot('rate');
   }

   /**
    * Assignments posted by this teacher.
    *
    * @return Assignment array
    */
   public function assignments() {
      return $this->hasMany('App\Assignment');
   }

   /**
    * Reports written by this teacher.
    *
    * @return Report array
    */
   public function reports() {
      return $this->hasMany('App\Report');
   }
}
