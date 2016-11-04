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
    * this model corresponding table name
    *
    * @var string
    */
   protected $table = 'parents';

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
      return $this->belongsToMany('App\Student');;
    }

   /**
    * Schools reviewed by this parent.
    *
    * @return School array
    */
   public function schools() {
      return $this->belongsToMany('App\School');
   }
}
