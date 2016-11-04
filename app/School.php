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

   public function elementaryLevel() {
      return $this->hasOne('App\ElementaryLevel');
   }

   public function middleLevel() {
      return $this->hasOne('App\MiddleLevel');
   }

   public function highLevel() {
      return $this->hasOne('App\HighLevel');
   }

   /**
    * get all students in this school
    * 
    * @return Student array
    */
   public function students() {
      return $this->hasMany('App\Student');
   }

}
