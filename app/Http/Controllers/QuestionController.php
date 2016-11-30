<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;
use App\Course;

use DB;
use Auth;

class QuestionController extends Controller
{
   public function __construct() {
     $this->middleware('auth');
   }

   public function index() {
      $questions = Question::all();
      return view('question.index', compact('questions'));
   }

   public function show($question) {
      $question = Question::getQuestion($question);
      return view('question.show', compact('question'));
   }

   public function create() {
      $courses = Course::lists('name', 'id');
      return view('question.create', compact('courses'));
   }

   public function store(Request $request) {
      if(strcmp(Auth::user()->role, 'Student')==0) {
         $student = Auth::user()->stu;

         /**
         * (student_id, course_id, title, question)
         */
         DB::statement('call insertQuestion(?, ?, ?, ?)', [
            $student->id,
            $request['course_id'],
            $request['title'],
            $request['question']
         ]);

      }

      return $this->index();
   }

   public function edit(Question $question) {
      $courses = Course::lists('name', 'id');
      return view('question.edit', compact('question', 'courses'));
   }

   public function update(Request $request, Question $question) {
      $question->update($request->all());
      return $this->index();
   }

   public function destroy(Question $question) {
      $question->delete();
      return $this->index();
   }

   /**
    * View all questions asked by other students on a certain
    * course along with their answers.
    *
    * @param  Course $course
    * @return
    */
   public function getQuestionsByOthers($course) {
      $student = Auth::user()->stu;
      $course = Course::getCourse($course);

      /**
       * (student_id, course_id)
       */
      $questions = DB::select('call getQuestionsByOthers(?, ?)', [
         $student->id,
         $course->id
      ]);

      foreach($questions as $question) {
         $question->course = $course;
      }

      return view('question.index', compact('questions'));
   }
}
