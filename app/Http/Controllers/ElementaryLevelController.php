<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ElementaryLevel;

use App\School;


class ElementaryLevelController extends Controller
{

    public function index() {
       return ElementaryLevel::all();
    }

    public function show(ElementaryLevel $elementarylevel) {
       return $elementarylevel;
    }

    public function create() {
       return view('levels.elementary.create');
    }

    public function store(Request $request) {

      $this->validate($request, ['school_id' => 'exists:schools,id|required|unique:elementary_levels']);

      $school = School::findOrFail($request['school_id']);
      $school->elementaryLevel()->create($request->all());

      flash()->success('The elementary level has been created successfully!');

      return $this->index();
    }

    public function edit(ElementaryLevel $elementarylevel) {
      return view('levels.elementary.edit', compact('elementarylevel'));
    }

    public function update(Request $request, ElementaryLevel $elementarylevel) {
      $this->validate($request, [
         'school_id' => 'exists:schools,id|required|unique:elementary_levels,school_id,' . $elementarylevel->id
      ]);

      $elementarylevel->update($request->all());

      flash()->success('The elementary level has been edited successfully!');

      return $this->index();
    }

    public function destroy(ElementaryLevel $elementarylevel) {
      $elementarylevel->delete();

      flash()->success('The elementary level has been deleted successfully!');

      return $this->index();
    }
}
