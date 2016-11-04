<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Teacher;

use Auth;

class TeacherController extends Controller
{
   public function __construct() {
    $this->middleware('auth');
  }

  public function index() {
    return Teacher::all();
 }

 public function show(Teacher $teacher) {
    return $teacher;
 }

 public function create() {
    $teacher =Auth::user();
    return view('teacher.create', compact('teacher'));
 }

 public function store(Request $request) {
    $this->validate($request, [
      'username' => 'exists:users|required|unique:teachers'
    ]);

    Teacher::create($request->all());

    return $this->index();
 }

 public function edit(Teacher $teacher) {
    return view('teacher.edit', compact('teacher'));
 }

 public function update(Request $request, Teacher $teacher) {
    $this->validate($request, [
      'username' => 'exists:users|required|unique:teachers,username,'.$teacher->id
    ]);

    $teacher->update($request->all());

    return $this->index();
 }

 public function destroy(Teacher $teacher) {
   $user = User::findOrFail($teacher->username);
   $user->delete();

   return $this->index();
 }
}
