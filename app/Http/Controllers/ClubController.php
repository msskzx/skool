<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Club;

use App\HighLevel;
use App\Student;
use App\School;

use Auth;
use DB;

class ClubController extends Controller
{

   public function __construct() {
     $this->middleware('auth');
   }

    public function index() {
       $clubs = Club::all();
       return view('club.index', compact('clubs'));
    }

    public function show($club) {
       $club = DB::select('select  * from clubs where id = ?', [$club])[0];
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

    public function join($club) {
      if(strcmp(Auth::user()->role, 'Student')==0) {
         $student = Auth::user()->stu;

         if($student->grade > 9) {
            /**
            * (student_id, club_id)
            */
            DB::statement('call joinClub(?, ?)', [
               $student->id,
               $club
            ]);

            flash()->success('You will find your name in the member list.');
         }
      }
      return $this->show($club);
    }

    public function getSchoolClubs($school) {
       $clubs = DB::select('call getSchoolClubs(?)', [$school]);
       return view('club.index', compact('clubs'));
    }

    public function members(Club $club) {
      $students = $club->students;
      return view('club.members', compact('students'));
    }

}
