<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Employee;

class EmployeeController extends Controller
{
   public function index() {
    return Employee::all();
 }

 public function show(Employee $employee) {
    return $employee;
 }

 public function create() {
    return view('employee.create');
 }

 public function store(Request $request) {
    $this->validate($request, [
     'username' => 'exists:users|required|unique:employees'
    ]);

    Employee::create($request->all());

    return $this->index();
 }

 public function edit(Employee $employee) {
    return view('employee.edit', compact('employee'));
 }

 public function update(Request $request, Employee $employee) {
    $this->validate($request, [
      'username' => 'exists:users|required|unique:users,username,'.$employee->id
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
