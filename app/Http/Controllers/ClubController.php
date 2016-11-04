<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Club;

use App\HighLevel;

use Auth;

use App\Student;

class ClubController extends Controller
{

   public function __construct() {
     $this->middleware('auth');
   }

    public function index() {
       $clubs = Club::all();
       return view('club.index', compact('clubs'));
    }

    public function show(Club $club) {
       return view('club.show', compact('club'));
    }

    public function create() {
       return view('club.create');
    }

    public function store(Request $request) {

      $this->validate($request, [
         'high_level_id' => 'required',
         'name' => 'required'
      ]);

      $high = HighLevel::findOrFail($request['high_level_id']);
      $high->clubs()->create($request->all());

      flash()->success('The club has been created successfully!');

      return $this->index();
    }

    public function edit(Club $club) {
      return view('club.edit', compact('club'));
    }

    public function update(Request $request, Club $club) {
      $this->validate($request, [
         'high_level_id' => 'required',
         'name' => 'required'
      ]);

      $club->update($request->all());

      flash()->success('The club has been edited successfully!');

      return $this->index();
    }

    public function destroy(Club $club) {
      $club->delete();

      flash()->success('The club has been deleted successfully!');

      return $this->index();
    }

    public function join(Club $club) {
      $student = Student::where('username', Auth::user()->username)->first();

      $club->students()->attach($student->id);

      return $this->show($club);
    }

}
