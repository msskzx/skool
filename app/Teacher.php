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
    * Employee associated with this teacher.
    *
    * @return Employee
    */
   public function employee() {
      return $this->belongsTo('App\Employee', 'username', 'username');
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
}
