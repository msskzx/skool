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
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = ['password'];

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
}
