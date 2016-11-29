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
    public function solve(Request $request, Assignment $assignment) {
      $student = Auth::user()->student;

     /**
      * (student_id, assignment_id, solution)
      */
      DB::statement('call insertSolution(?, ?, ?)', [
         $student->id,
         $assignment->id,
         $request['solution']
      ]);

      return $this->index();
    }

    public function getCourseAssignments($course) {
      $assignments = DB::select('call getCourseAssignments(?)', [$course]);
      return view('assignment.index', compact('assignments'));
    }

   public function getStudentAssignments($student) {
      $assignments = DB::select('call getStudentAssignments(?)', [$student]);
      return view('assignment.index', compact('assignments'));
   }
}
