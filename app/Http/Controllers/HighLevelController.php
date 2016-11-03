<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\HighLevel;

use App\School;


class HighLevelController extends Controller
{
    public function index() {
       return HighLevel::all();
    }

    public function show(HighLevel $highlevel) {
       return $highlevel;
    }

    public function create() {
       return view('levels.high.create');
    }

    public function store(Request $request) {
      $this->validate($request, [
         'school_id' => 'exists:schools,id|required|unique:high_levels'
      ]);

      $school = School::findOrFail($request['school_id']);
      $school->highLevel()->create($request->all());

      flash()->success('The high level has been created successfully!');

      return $this->index();
    }

    public function edit(HighLevel $highlevel) {
      return view('levels.high.edit', compact('highlevel'));
    }

    public function update(Request $request, HighLevel $highlevel) {
      $this->validate($request, [
         'school_id' => 'exists:schools,id|required|unique:high_levels,school_id,' . $highlevel->id
      ]);

      $highlevel->update($request->all());

      flash()->success('The high level has been edited successfully!');

      return $this->index();
    }

    public function destroy(HighLevel $highlevel) {
      $highlevel->delete();

      flash()->success('The high level has been deleted successfully!');

      return $this->index();
    }
}
