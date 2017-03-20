<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Teacher;

use Auth;
use DB;

class TeacherController extends Controller
{
   public function __construct() {
      $this->middleware('auth', ['only' => ['edit', 'update', 'destroy']]);
   }

    public function index() {
       return Teacher::all();
    }

    public function show(Teacher $teacher) {
       return $teacher;
    }

    public function create() {
       return view('employee.teacher.create');
    }

    public function store(Request $request) {
      $this->validate($request, [
        'email' => 'required|unique:employees',
        'first_name' => 'required',
        'middle_name' => 'required',
        'last_name' => 'required',
        'address' => 'required',
        'gender' => 'required',
        'years_of_exp' => 'required|numeric',
        'birth_date' => 'required'
      ]);

      /**
       * (first_name, middle_name, last_name, birth_date, address, email, gender, years_of_exp, phone_number, mobile_number1, mobile_number2)
       */
       DB::statement('call insertTeacher(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',[
        $request['first_name'],
        $request['middle_name'],
        $request['last_name'],
        $request['birth_date'],
        $request['address'],
        $request['email'],
        $request['gender'],
        $request['years_of_exp'],
        $request['phone_number'],
        $request['mobile_number1'],
        $request['mobile_number2']
       ]);

       flash()->success('Successful sign up.');
       return $this->create();
    }

    public function edit(Teacher $teacher) {
       $years_of_exp = $teacher->years_of_exp;
       $teacher = $teacher->employee;
       $teacher->years_of_exp = $years_of_exp;
       return view('employee.teacher.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher) {
       $teacher->update($request['years_of_exp']);
       return $this->index();
    }

    public function destroy(Teacher $teacher) {
      DB::statement('call deleteEmployee(?)'[$teacher->id]);
      return $this->index();
    }
}
