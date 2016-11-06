<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Activitie;

class ActivitieController extends Controller
{
   public function __construct() {
      $this->middleware('auth');
   }

   public function index() {
      $activities = Activitie::all();
      return view('activity.index', compact('activities'));
   }

   public function show(Activitie $activity) {
      $school = $activity->school($activity);
      return view('activity.show', compact('activity','school'));
   }

   public function create() {
      return view('activity.create');
   }

   public function edit(Activitie $activity) {
     return view('activity.edit', compact('activity'));
   }
}
