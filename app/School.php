<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
   /**
    * The attributes that are not mass assignable.
    *
    * @var array
    */
   protected $guarded = [];

   /**
    * Elementary level associated with this school.
    *
    * @return ElementaryLevel
    */
   public function elementaryLevel() {
      return $this->hasOne('App\ElementaryLevel');
   }

   /**
    * Middle level associated with this school.
    *
    * @return MiddleLevel
    */
   public function middleLevel() {
      return $this->hasOne('App\MiddleLevel');
   }

   /**
    * High level associated with this school.
    *
    * @return HighLevel
    */
   public function highLevel() {
      return $this->hasOne('App\HighLevel');
   }

   /**
    * Students attending this school.
    *
    * @return Student array
    */
   public function students() {
      return $this->hasMany('App\Student');
   }

   /**
    * Employees associated with this school.
    *
    * @return Employee array
    */
   public function employees() {
      return $this->hasMany('App\Employee');
   }

   /**
    * Parents who reviewed this school.
    *
    * @return Parentt array
    */
   public function parents() {
      return $this->belongsToMany('App\Parentt')->withPivot('review')->withTimestamps();
   }

   /**
    * Students who applied for this school.
    *
    * @return Student array
    */
   public function studentsApplied() {
      return $this->belongsToMany('App\Student')->withPivot('accepted', 'parentt_id')->withTimestamps();
   }

   /**
    * Parents who applied for their children to join this school.
    *
    * @return Parentt array
    */
   public function parentsApplied() {
      return $this->belongsToMany('App\Parentt','school_student')->withPivot('accepted', 'student_id')->withTimestamps();
   }

   /**
    * Courses offered by this school.
    *
    * @return Courses array
    */
   public function courses() {
      return $this->hasMany('App\Course');
   }
}
