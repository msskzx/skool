<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
   /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Student who asked this question.
     *
     * @return Student
     */
    public function student() {
      return $this->belongsTo('App\Student');
    }

    /**
     * Teacher who answered this question.
     *
     * @return Teacher
     */
    public function teacher() {
      return $this->belongsTo('App\Teacher');
    }

    /**
     * Course associated with this question.
     *
     * @return Course
     */
    public function course() {
      return $this->belongsTo('App\Course');
    }

}
