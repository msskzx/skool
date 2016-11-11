<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\School;

use DB;

class SchoolController extends Controller
{
    public function index() {
      $el = DB::select(
         "select *
          from schools inner join elementary_levels
          on schools.id = school_id
          ");
      $m = DB::select(
         "select *
          from schools inner join middle_levels
          on schools.id = school_id
          ");
      $h = DB::select(
         "select *
          from schools inner join high_levels
          on schools.id = school_id
          ");

      return [$el, $m, $h];
      //  return School::all();
    }

    public function show(School $school) {
       return $school;
    }

    public function create() {
       return view('school.create');
    }

    public function store(Request $request) {
      $this->validate($request, [
         'email' => 'required|unique:schools',
         'name' => 'required',
         'phone_number1' => 'numeric',
         'phone_number2' => 'numeric',
         'fees' => 'numeric'
      ]);

      School::create($request->all());

      flash()->success('School has been created successfully!');

      return $this->index();
    }

    public function edit(School $school) {
       return view('school.edit', compact('school'));
    }

    public function update(Request $request, School $school) {
      $this->validate($request, [
         'email' => 'required|unique:schools,email,'.$school->id,
         'name' => 'required',
         'phone_number1' => 'numeric',
         'phone_number2' => 'numeric',
         'fees' => 'numeric'
      ]);

      $school->update($request->all());

      return $this->index();
    }

    public function destroy(School $school) {
       $school->delete();
       //TODO
       //when you delete a school delete all its users(employees,students)

       return $this->index();
    }

    public function search(Request $request) {
      // TODO
      // name, address or type
    }
}
