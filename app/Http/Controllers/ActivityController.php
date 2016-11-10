<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Activity;

class ActivityController extends Controller
{
   public function __construct() {
      $this->middleware('auth');
   }

   public function index() {
      $activities = Activity::all();
      return $activities;
      // return view('activity.index', compact('activities'));
   }

   public function show(Activity $activity) {
      $school = $activity->school($activity);
      return view('activity.show', compact('activity','school'));
   }

   public function create() {
      return view('activity.create');
   }

   public function edit(Activity $activity) {
     return view('activity.edit', compact('activity'));
   }
}
