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
      $courses = Course::all();
      return view('course.index', compact('courses'));
   }

   public function show(Course $course) {
      return view('course.show', compact('course'));
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
    * View the grade of the assignments I solved per course.
    *
    * @param  Course $course
    * @return
    */
   public function getGrades(Course $course) {
      $student = Auth::user()->student;

      /**
       * (student_id, course_id)
       *
       */
      $grades = DB::select('call getGrades(?, ?)', [
         $student->id,
         $course->id
      ]);
      return view('course.grades', compact('grades'));
   }

   /**
    * 2 View a list of courses’ names assigned to me based on my
    * grade ordered by name.
    *
    * @return
    */
   public function getStudentCourses() {
      $student = Auth::user()->student;
      $courses = DB::select('call getStudentCourses(?)', [$student->id]);
      return view('course.index', compact('courses'));
   }

}
