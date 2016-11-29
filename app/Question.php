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
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Student who asked this question.
     *
     * @return Student
     */
    public function student() {
      return $this->belongsTo('App\Student');
    }

    /**
     * Course associated with this question.
     *
     * @return Course
     */
    public function course() {
      return $this->belongsTo('App\Course');
    }

    public static function getQuestion($question) {
      return \DB::select('select * from questions where id = ?', [$question])[0];
    }

}
