<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
   /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Student associated with this report.
     *
     * @return Student
     */
    public function student() {
       return $this->belongsTo('App\Student');
    }

    /**
     * Parents who commented on this report.
     *
     * @return Parentt
     */
    public function parents() {
       return $this->belongsToMany('App\Parentt')->withPivot('teacher_comment', 'parent_comment')->withTimestamps();
    }
}
