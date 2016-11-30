<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Student;
use App\Course;

use Auth;
use DB;

class StudentController extends Controller
{

   public function __construct() {
     $this->middleware('auth');
   }

   public function index() {
     return Student::all();
  }

  public function show($student) {
     $x = Student::getStudent($student);
     $student = $x;
     return view('student.show', compact('student'));
  }

  public function create() {
     return view('student.create');
  }

  public function store(Request $request) {
     $this->validate($request, [
        'SSN' => 'required|unique:students'
     ]);

     /**
      * (first_name, middle_name, last_name, SSN, birth_date, gender)
      */
     DB::statement('call insertStudent(?, ?, ? ,? ,? ,?)',[
        $request['first_name'],
        $request['middle_name'],
        $request['last_name'],
        $request['SSN'],
        $request['birth_date'],
        $request['gender']
     ]);

     return $this->index();
  }

  public function edit($student) {
     $x = Student::getStudent($student);
     $student = $x;
     return view('student.edit', compact('student'));
  }

  public function update(Request $request, $student) {
     $x = Student::getStudent($student);
     $student = $x;

     $this->validate($request, [
        'email' => 'unique:students,email,'.$student->id,
        'SSN' => 'required|unique:students,SSN,'.$student->id
     ]);

     /**
      * (id, first_name, middle_name, last_name, SSN, birth_date, gender, email)
      */
     DB::statement('call updateStudent(?, ?, ?, ? ,? ,? , ?, ?)',[
        $student->id,
        $request['first_name'],
        $request['middle_name'],
        $request['last_name'],
        $request['SSN'],
        $request['birth_date'],
        $request['gender'],
        $request['email']
     ]);

     return $this->profile();
  }

  public function destroy(Student $student) {
     DB::statement('call deleteStudent(?)', [$student->id]);
     return $this->index();
  }

  public function profile() {
     return $this->show(Auth::user()->stu->id);
  }

}
