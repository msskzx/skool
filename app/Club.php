<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
   /**
   * The attributes that are not mass assignable.
   *
   * @var array
   */
  protected $guarded = [];

  /**
   * High level associated with this club.
   *
   * @return User
   */
  public function highLevel() {
     return $this->belongsTo('App\HighLevel');
  }

  /**
   * Clubs associated with this club.
   *
   * @return User
   */
  public function students() {
     return $this->belongsToMany('App\Student');
  }

  /**
   * School associated with this club.
   *
   * @return School
   */
  public function school(Club $club) {
     $high_level = HighLevel::find($club->high_level_id);
     return $high_level->school;
  }

}
