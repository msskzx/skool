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
    * Students who applied for this school.
    *
    * @return Student array
    */
   public function studentsApplied() {
      return $this->belongsToMany('App\Student', 'school_appliedBy_student')->withPivot('accepted', 'parent_id');
   }

   /**
    * Parents who applied for their children to join this school.
    *
    * @return Parentt array
    */
   public function parentsApplied() {
      return $this->belongsToMany('App\Parentt','school_appliedBy_student', 'school_id', 'parent_id')->withPivot('accepted', 'student_id');
   }

   /**
    * Parents reviewd this school.
    *
    * @return School array
    */
   public function parentsReviewed() {
      return $this->belongsToMany('App\Parentt', 'parent_reviews_school', 'school_id', 'parent_id')->withPivot('title', 'review');
   }

   /**
    * Courses offered by this school.
    *
    * @return Courses array
    */
   public function courses() {
      return $this->hasMany('App\Course');
   }

   /**
    * Announcements of this school.
    * @return Announcement array
    */
   public function announcements() {
      return $this->hasMany('App\Announcement');
   }
}
