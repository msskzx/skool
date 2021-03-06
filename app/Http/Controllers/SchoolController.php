<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\School;
use App\Parentt;

use DB;
use Auth;

class SchoolController extends Controller
{

   public function __construct() {
     $this->middleware('auth', ['except' => ['index', 'levels', 'show', 'reviewIndex', 'search', 'getStudentSchool']]);
   }

    public function index() {
       return School::all();
    }

    /**
     * View a list of all available schools on the system categorized by their level.
     *
     * @return
     */
    public function levels() {
      $elementary_levels = DB::select('call getElementaryLevels()');
      $middle_levels = DB::select('call getMiddleLevels()');
      $high_levels = DB::select('call getHighLevels()');

      return view('school.levels', compact('elementary_levels', 'middle_levels', 'high_levels'));
    }

    public function show($school) {
      $school = School::getSchool($school);
      $announcements = DB::select('call getSchoolAnnouncements(?)', [$school->id]);
      $teachers = DB::select('call getSchoolTeachers(?)', [$school->id]);

      return view('school.show', compact('school', 'announcements', 'teachers'));
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
       DB::statement('call deleteSchool(?)',[$school->id]);
       return $this->index();
    }

    public function search(Request $request) {
      $schools = DB::select('call searchSchools(?)',[$request['search']]);
      return view('search.school.results', compact('schools'));
    }

    public function reviewIndex(School $school) {
      $reviews = DB::select('call getSchoolReviews(?)', [$school->id]);
      return view('school.review.index', compact('reviews'));
    }

    public function getStudentSchool() {
       $student = Auth::user()->stu;
      return $this->show($student->school_id);
    }
}
