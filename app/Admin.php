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
     return $this->belongsTo('App\Employee', 'username', 'username');
  }
}
