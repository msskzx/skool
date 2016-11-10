<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
   /**
    * The attributes that are not mass assignable.
    *
    * @var array
    */
   protected $guarded = [];

   /**
    * Admin posted and assigned this activity.
    *
    * @return Admin
    */
   public function admin() {
      return $this->belongsTo('App\Admin');
   }

   /**
    * Teacher assigned to this activity.
    *
    * @return Teacher
    */
   public function teacher() {
      return $this->belongsTo('App\Teacher');
   }

   /**
    * Students joined this activity.
    *
    * @return Student array
    */
   public function students() {
      return $this->belongsToMany('App\student','activity_has_student')->withPivot('accepted')->withTimestamps();
   }
}
