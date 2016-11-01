<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\MiddleLevel;

class MiddleLevelController extends Controller
{
    public function index() {
       return MiddleLevel::all();
    }

    public function show(MiddleLevel $middlelevel) {
       return $middlelevel;
    }

    public function create() {
       return view('levels.middle.create');
    }

    public function store(Request $request) {

      $this->validate($request, ['school_id' => 'required|unique:middle_levels']);

      $school = School::findOrFail($request['school_id']);
      $school->middleLevel()->create($request->all());

      flash()->warning('The middle level has been created successfully!');


      return $this->index();
    }

    public function edit(MiddleLevel $middlelevel) {
      return view('levels.middle.edit', compact('middlelevel'));
    }

    public function update(Request $request, MiddleLevel $middlelevel) {
      $this->validate($request, ['school_id' => 'required|unique:middle_levels']);

      $school = School::findOrFail($request['school_id']);
      $school->middleLevel()->create($request->all());

      flash()->warning('The middle level has been updated successfully!');

      return $this->index();
    }

    public function destroy(MiddleLevel $middlelevel) {
      $middlelevel->delete();

      flash()->warning('The middle level has been deleted successfully!');

      return $this->index();
    }
}
