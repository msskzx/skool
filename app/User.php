<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Parent associated with this user.
     *
     * @return Parentt
     */
    public function parent() {
       return $this->hasOne('App\Parentt', 'username', 'username');
    }

    /**
     * Student associated with this user.
     *
     * @return Student
     */
    public function student() {
      return $this->hasOne('App\Student', 'username', 'username');
    }

    /**
     * Student associated with this user.
     *
     * @return Student
     */
    public function employee() {
      return $this->hasOne('App\Employee', 'username', 'username');
    }
}
