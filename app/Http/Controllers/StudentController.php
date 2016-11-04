<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Student;

use Auth;

class StudentController extends Controller
{

   public function __construct() {
     $this->middleware('auth');
   }

   public function index() {
     return Student::with('courses')->get();
  }

  public function show(Student $student) {
     return $student;
  }

  public function create() {
     $student =Auth::user();
     return view('student.create', compact('student'));
  }

  public function store(Request $request) {
     if($request['school_id'] == null) {
        $request['school_id'] = 1;
     }

     $this->validate($request, [
        'username' => 'exists:users|required|unique:students',
        'SSN' => 'required|unique:students',
        'school_id' => 'exists:schools,id'
     ]);

     Student::create($request->all());

     return $this->index();
  }

  public function edit(Student $student) {
     return view('student.edit', compact('student'));
  }

  public function update(Request $request, Student $student) {
     if($request['school_id'] == null) {
        $request['school_id'] = 1;
     }

     $this->validate($request, [
        'username' => 'exists:users|required|unique:students,username,'.$student->id,
        'SSN' => 'required|unique:students,SSN,'.$student->id,
        'school_id' => 'exists:schools,id'
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
