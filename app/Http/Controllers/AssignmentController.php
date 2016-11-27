<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Assignment;

use Auth;
use DB;

class AssignmentController extends Controller
{
   public function __construct() {
      $this->middleware('auth');
   }

    public function index() {
       $assignments = Assignment::all();
       return $assignments;
      //  return view('assignment.index', compact('assignments'));
    }

    public function show(Assignment $assignment) {
       return view('assignment.show', compact('assignment'));
    }

    public function create() {
       return view('assignment.create');
    }

    public function edit(Assignment $assignment) {
      return view('assignment.edit', compact('assignment'));
    }

    public function solveForm(Assignment $assignment) {
      return view('assignment.solution.solution', compact('assignment'));
    }

    public function update(Request $request, Assignment $assignment) {

    }

   /**
    * Solve assignments posted for courses I take.
    *
    * @param  Request $request
    * @return
    */
    public function solve(Request $request, Assignment $assignment) {
      $student = Auth::user()->student;

      // (student_id, assignment_id, solution)
      DB::statement('call insertSolution(?, ?, ?)', [
         $student->id,
         $assignment->id,
         $request['solution']
      ]);

      return $this->index();
    }
}
