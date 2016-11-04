<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Student;

class StudentController extends Controller
{
   public function index() {
     return Student::all();
  }

  public function show(Student $student) {
     return $student;
  }

  public function create() {
     return view('student.create');
  }

  public function store(Request $request) {
     $this->validate($request, [
      'username' => 'exists:users|required|unique:students',
      'SSN' => 'required|unique:students'
     ]);

     Student::create($request->all());

     return $this->index();
  }

  public function edit(Student $student) {
     return view('student.edit', compact('student'));
  }

  public function update(Request $request, Student $student) {
     $this->validate($request, [
        'username' => 'exists:users|required|unique:users,username,'.$student->id,
        'SSN' => 'required|unique:students,SSN,'.$student->id
     ]);

     $student->update($request->all());

     return $this->index();
  }

  public function destroy(Student $student) {
    $user = User::findOrFail($student->username);
    $user->delete();

    return $this->index();
  }
}
