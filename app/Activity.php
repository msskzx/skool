<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

   /**
    * Table associated with this model.
    *
    * @var string
    */
   protected $table = 'activities';

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
