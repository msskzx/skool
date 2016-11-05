<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parentt extends Model
{
   /**
    * The attributes that are not mass assignable.
    *
    * @var array
    */
   protected $guarded = [];

    /**
     * get the user associated with this parent
     *
     * @return User
     */
    public function user() {
       return $this->belongsTo('App\User', 'username', 'username');
    }

    /**
     * Students of this parent.
     *
     * @return Student array
     */
    public function students() {
      return $this->belongsToMany('App\Student')->withTimestamps();
    }

   /**
    * Schools reviewed by this parent.
    *
    * @return School array
    */
   public function schoolsReviewed() {
      return $this->belongsToMany('App\School')->withPivot('review')->withTimestamps();
   }

   /**
    * Teachers reviewed by this parentt.
    *
    * @return Teacher array
    */
   public function teachers() {
      return $this->belongsToMany('App\Teacher')->withPivot('rate')->withTimestamps();
   }

   /**
    * Schools which this parent applied for his children to join.
    *
    * @return School array
    */
   public function schoolsApplied() {
      return $this->belongsToMany('App\School','school_student')->withPivot('accepted', 'student_id')->withTimestamps();
   }

   /**
    * Reports commented on by this parent.
    *
    * @return Report array
    */
   public function reports() {
      return $this->belongsToMany('App\Report')->withPivot('teacher_comment', 'parent_comment')->withTimestamps();
   }
}
