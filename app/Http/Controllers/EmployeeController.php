<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Employee;

use Auth;

class EmployeeController extends Controller
{
   public function index() {
    return Employee::all();
 }

 public function show(Employee $employee) {
    return $employee;
 }

 public function create() {
    $employee =Auth::user();
    return view('employee.create', compact('employee'));
 }

 public function store(Request $request) {
    if($request['school_id'] == null) {
      $request['school_id'] = 1;
    }

    $this->validate($request, [
     'username' => 'exists:users|required|unique:employees',
     'school_id' => 'exists:schools,id'
    ]);

    Employee::create($request->all());

    return $this->index();
 }

 public function edit(Employee $employee) {
    return view('employee.edit', compact('employee'));
 }

 public function update(Request $request, Employee $employee) {
    if($request['school_id'] == null) {
      $request['school_id'] = 1;
    }

    $this->validate($request, [
      'school_id' => 'exists:schools,id'
    ]);

    $employee->update($request->all());

    return $this->index();
 }

 public function destroy(Employee $employee) {
   $user = User::findOrFail($employee->username);
   $user->delete();

   return $this->index();
 }
}
