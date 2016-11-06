<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;

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
      $school = $question->school($question);
      return view('question.show', compact('question','school'));
   }

   public function create() {
      return view('question.create');
   }

   public function edit(Question $question) {
     return view('question.edit', compact('question'));
   }
}
