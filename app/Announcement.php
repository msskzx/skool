<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
   /**
   * The attributes that are not mass assignable.
   *
   * @var array
   */
  protected $guarded = [];

  /**
   * Admin posted and assigned this activity.
   *
   * @return Admin
   */
  public function admin() {
     return $this->belongsTo('App\Admin');
  }
}
