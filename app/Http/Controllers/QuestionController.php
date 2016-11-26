<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;

use DB;

class QuestionController extends Controller
{
   public function __construct() {
     $this->middleware('auth');
   }

   public function index() {
      $questions = Question::all();
      return $questions;
      // return view('question.index', compact('questions'));
   }

   public function show(Question $question) {
      return $question;
      // return view('question.show', compact('question'));
   }

   public function create() {
      return view('question.create');
   }

   public function store(Request $request) {
      $student = Auth::user()->student;

      // (student_id, course_id, title, question)
      DB::statement('call insertQuestion(?, ?, ?, ?)', [
         $student->id,
         $request['course_id'],
         $request['title'],
         $request['question']
      ]);

      return $this->index();
   }

   public function edit(Question $question) {
     return view('question.edit', compact('question'));
   }

   public function update(Request $request) {

      return $this->index();
   }

   public function destroy(Question $question) {
      $question->delete();
      return $this->index();
   }
}
