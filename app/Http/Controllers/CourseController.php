<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Course;
use App\Student;

use DB;
use Auth;

class CourseController extends Controller
{
   public function __construct() {
      $this->middleware('auth');
   }

   public function index() {
      return Course::all();
   }

   public function show(Course $course) {
      return $course;
   }

   public function create() {
      return view('course.create');
   }

   public function store(Request $request) {

     $this->validate($request, [
        'name' => 'required'
     ]);

     Course::create($request->all());

     flash()->success('The course has been created successfully!');

     return $this->index();
   }

   public function edit(Course $course) {
     return view('course.edit', compact('course'));
   }

   public function update(Request $request, Course $course) {
      $this->validate($request, [
        'name' => 'required'
     ]);

     $course->update($request->all());

     flash()->success('The course has been edited successfully!');

     return $this->index();
   }

   public function destroy(Course $course) {
     $course->delete();

     flash()->success('The course has been deleted successfully!');

     return $this->index();
   }

   /**
    * View all questions asked by other students on a certain
    * course along with their answers.
    *
    * @param  Course $course
    * @return
    */
   public function getQuestionsByOthers(Course $course) {
      $student = Auth::user()->student;

      // (student_id, course_id)
      $questions = DB::select('call getQuestionsByOthers(?, ?)', [
         $student->id,
         $course->id
      ]);

      foreach($questions as $question) {
         $question->course = $course;
      }

      return view('question.index', compact('questions'));
   }

   public function getAssignments(Course $course) {
      $assignments = DB::select('select a.* from courses c
                                 inner join assignments a

      foreach($assignments as $assignment) {
         $assignment->course = $course;
      }

      return view('assignment.index', compact('assignments'));
   }

   public function getGrades(Course $course) {
      $student = Auth::user()->student;

      // (student_id, course_id)
      $grades = DB::select('call getGrades(?, ?)', [
         $student->id,
         $course->id
      ]);
      return view('course.grades', compact('grades'));
   }

}
