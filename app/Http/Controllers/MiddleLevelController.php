<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\MiddleLevel;

use App\School;

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

      $this->validate($request, [
         'school_id' => 'exists:schools,id|required|unique:middle_levels'
      ]);

      $school = School::findOrFail($request['school_id']);
      $school->middleLevel()->create($request->all());

      flash()->success('The middle level has been created successfully!');

      return $this->index();
    }

    public function edit(MiddleLevel $middlelevel) {
      return view('levels.middle.edit', compact('middlelevel'));
    }

    public function update(Request $request, MiddleLevel $middlelevel) {
      $this->validate($request, [
         'school_id' => 'exists:schools,id|required|unique:middle_levels,school_id,' . $middlelevel->id
      ]);

      $middlelevel->update($request->all());

      flash()->success('The middle level has been edited successfully!');

      return $this->index();
    }

    public function destroy(MiddleLevel $middlelevel) {
      $middlelevel->delete();

      flash()->success('The middle level has been deleted successfully!');

      return $this->index();
    }
}
