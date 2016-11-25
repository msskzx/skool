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

 public function destroy(Employee $employee) {
   $user = User::findOrFail($employee->username);
   $user->delete();

   return $this->index();
 }
}
