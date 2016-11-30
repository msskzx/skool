<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Assignment;
use App\Course;
use App\Student;

use Auth;
use DB;

class AssignmentController extends Controller
{
   public function __construct() {
      $this->middleware('auth');
   }

    public function index() {
       $assignments = Assignment::all();
       return view('assignment.index', compact('assignments'));
    }

    public function show($assignment) {
       $assignment = Assignment::getAssignment($assignment);
       return view('assignment.show', compact('assignment'));
    }

    public function solveForm($assignment) {
      $assignment = Assignment::getAssignment($assignment);
      return view('assignment.solution.solution', compact('assignment'));
    }

    /**
     * Solve assignments posted for courses I take.
     *
     * @param  Request $request
     * @return
     */
    public function solve(Request $request, $assignment) {
      if(strcmp(Auth::user()->role, 'Student')==0) {
         $student = Auth::user()->stu;

         $request['student_id'] = $student->id;
         $request['assignment_id'] = $assignment;
         $this->validate($request, [
            'student_id' => 'unique:assignment_solvedBy_student,student_id,NULL,assignment_id,assignment_id,' . $assignment,
            'assignment_id' => 'unique:assignment_solvedBy_student,assignment_id,NULL,student_id,student_id,' . $student->id
         ]);

         /**
         * (student_id, assignment_id, solution)
         */
         DB::statement('call insertSolution(?, ?, ?)', [
            $student->id,
            $assignment,
            $request['solution']
         ]);

         flash()->success('Assignment solution has been submitted successfully.');
      }
      return $this->index();
    }

    public function getCourseAssignments($course) {
      $assignments = DB::select('call getCourseAssignments(?)', [$course]);
      return view('assignment.index', compact('assignments'));
    }

   public function getStudentAssignments() {
      if(strcmp(Auth::user()->role, 'Student')==0) {
         $student = Auth::user()->stu;
         $assignments = DB::select('call getStudentAssignments(?)', [$student->id]);
         return view('assignment.index', compact('assignments'));
      }
      return back();
   }
}
