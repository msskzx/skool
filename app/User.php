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
        'password'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

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

    /**
    * These are almost equivilant the the original 3 relation.
    * Created for milestone 4.
    *
    * @return
    */
    public function getStuAttribute() {
      return \DB::select('select st.* from students st inner join users u on u.username = st.username and u.username = ?', [$this->username])[0];
   }

    /**
     * Overriding these functions to disable
     * remember_token
     */
    public function getRememberToken()
    {
        return '';
    }

    public function setRememberToken($value)
    {
    }

    public function getRememberTokenName()
    {
        return '';
    }

    /**
     * Fake attribute setter so that Guard doesn't complain about
     * a property not existing that it tries to set.
     *
     * Does nothing, obviously.
     */
    public function setTrashAttributeAttribute($value)
    {
    }
}
