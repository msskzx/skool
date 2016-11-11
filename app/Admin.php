<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
  /**
   * The attributes that are not mass assignable.
   *
   * @var array
   */
  protected $guarded = [];

  /**
   * Employee associated with this admin.
   *
   * @return Employee
   */
  public function employee() {
     return $this->belongsTo('App\Employee');
  }

  /**
   * Activties posted and assigned by this admin.
   *
   * @return Activitie array
   */
  public function activities() {
     return $this->hasMany('App\Activity');
  }

  /**
   * Announcements posted and assigned by this admin.
   *
   * @return Announcement array
   */
  public function announcements() {
     return $this->hasMany('App\Announcement');
  }

  // TODO
  public function getSalaryAttribute() {
     if(strcmp($this->employee->school->type, 'National')===0) {
       return $this->salary = 3000;
     }
     return $this->salary = 5000;
  }
}
