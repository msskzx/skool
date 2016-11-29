<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Activity;
use App\School;

use Auth;
use DB;

class ActivityController extends Controller
{
   public function __construct() {
      $this->middleware('auth');
   }

   public function index() {
      $activities = Activity::all();
      return view('activity.index', compact('activities'));
   }

   public function show($activity) {
      $activity = DB::select('select * from activities where id = ?', [$activity])[0];

      $teacher = DB::select('select e.* from activities a inner join teachers t
                             on a.teacher_id = t.id and a.id = ?
                             inner join employees e
                             on e.id = t.id', [$activity->id])[0];

      return view('activity.show', compact('activity', 'teacher'));
   }

   /**
    * 10 Apply for activities in my school on the condition that I can not join two activities of the same
    * type on the same date.
    *
    * @param
    * @return
    */
   public function join($activity) {
     $activity = DB::select('select * from activities where id = ?', [$activity])[0];

     $student = Auth::user()->student;

     /**
      * (student_id, activity_id)
      */
     DB::statement('call joinActivity(?, ?)', [
        $student->id,
        $activity->id
     ]);

     return $this->index();
   }

   /**
    * Get activities in a certain school.
    *
    * 9 View all the information about activities offered by my school,
    * as well as the teacher responsible for it
    *
    * @param  School $school
    * @return
    */
   public function getSchoolActivities($school) {
      $school = DB::select('select * from schools where id = ?', [$school])[0];
      $activities = DB::select('call getSchoolActivities(?)', [$school->id]);
      return view('activity.index', compact('activities'));
   }

}
