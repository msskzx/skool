<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Assignment;

class AssignmentController extends Controller
{
   public function __construct() {
      $this->middleware('auth');
   }

 public function index() {
    $assignments = Assignment::all();
    return view('assignment.index', compact('assignments'));
 }

 public function show(Assignment $assignment) {
    $school = $assignment->school($assignment);
    return view('assignment.show', compact('assignment','school'));
 }

 public function create() {
    return view('assignment.create');
 }

 public function edit(Assignment $assignment) {
   return view('assignment.edit', compact('assignment'));
 }
}
