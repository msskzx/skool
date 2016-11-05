<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
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
    * Course associated with this assignment.
    *
    * @return Course
    */
   public function course() {
      return $this->belongsTo('App\Course');
   }

   /**
    * Students who solved this assignment.
    *
    * @return Student array
    */
   public function students() {
      return $this->belongsToMany('App\Student')->withPivot('grade', 'solution')->withTimestamps();
   }
}
