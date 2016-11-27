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

   public function show(Question $question) {
      $question->teacher = $question->course->teacher->employee;
      return view('question.show', compact('question'));
   }

   public function create() {
      $courses = Course::lists('name', 'id');
      return view('question.create', compact('courses'));
   }

   public function store(Request $request) {
      $student = Auth::user()->student;

      // (student_id, course_id, title, question)
      DB::statement('call insertQuestion(?, ?, ?, ?)', [
         $student->id,
         $request['course'],
         $request['title'],
         $request['question']
      ]);

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
}
