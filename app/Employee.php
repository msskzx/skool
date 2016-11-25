<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
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
  * School associated with this employee.
  *
  * @return School
  */
 public function school() {
    return $this->belongsTo('App\School');
 }

 /**
  * User associated with this employee.
  *
  * @return User
  */
 public function user() {
    return $this->belongsTo('App\User', 'username', 'username');
 }

 /**
  * Teacher associated with this employee.
  *
  * @return Teacher
  */
 public function teacher() {
    return $this->hasOne('App\Teacher', 'id');
 }

 /**
  * Admin associated with this employee.
  *
  * @return Admin
  */
 public function admin() {
    return $this->hasOne('App\Admin');
 }
}
