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

   /**
    * 9 View all the information about activities offered by my school, as well as the teacher responsible
    * for it.
    *
    * @param  Activity $activity
    * @return
    */
   public function show(Activity $activity) {
      $teacher = DB::select('select e.* from activities a inner join teachers t
                             on a.teacher_id = t.id and a.id = ?
                             inner join employees e
                             on e.id = t.id', [$activity->id])[0];

      return view('activity.show', compact('activity', 'teacher'));
   }

   public function create() {
      return view('activity.create');
   }

   public function edit(Activity $activity) {
     return view('activity.edit', compact('activity'));
   }

   /**
    * 10 Apply for activities in my school on the condition that I can not join two activities of the same
    * type on the same date.
    *
    * @param  Club   $club
    * @return
    */
   public function join(Activity $activity) {
     $student = Auth::user()->Student;

     // (student_id, activity_id)
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
   public function getSchoolActivities(School $school) {
      $activities = DB::select('call getSchoolActivities(?)', [$school->id]);
      return view('activity.index', compact('activities'));
   }

}
