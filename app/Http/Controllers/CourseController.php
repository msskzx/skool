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

   public function show($course) {
      $course = Course::getCourse($course);
      return view('course.show', compact('course'));
   }

   /**
    * View the grade of the assignments I solved per course.
    *
    * @param  Course $course
    * @return
    */
   public function getGrades($course) {
      $student = Auth::user()->student;

      /**
       * (student_id, course_id)
       */
      $grades = DB::select('call getGrades(?, ?)', [
         $student->id,
         $course
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
