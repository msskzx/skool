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
    * Students associated with this school.
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

}
