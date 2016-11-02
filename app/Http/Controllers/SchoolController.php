<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\School;

class SchoolController extends Controller
{
    public function index() {
       return School::all();
    }

    public function show(School $school) {
       return $school;
    }

    public function create() {
       return view('school.create');
    }

    public function store(Request $request) {
      School::create($request->all());

      flash()->success('School has been created successfully!');

      return $this->index();
    }

    public function edit(School $school) {
       return view('school.edit', compact('school'));
    }

    public function update(Request $request, School $school) {
      $this->validate($request, ['email' => 'unique:schools,email,'.$school->id]);
      $school->update($request->all());

      return $this->index();
    }

}
