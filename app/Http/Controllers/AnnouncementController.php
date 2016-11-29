<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Announcement;

use DB;

class AnnouncementController extends Controller
{
   public function __construct() {
      $this->middleware('auth');
    }

  public function index() {
     $announcements = Announcement::all();
     return $announcements;
  }

  public function show($announcement) {
     $announcement = DB::select('select * from announcements where id = ?', [$announcement])[0];
     return view('announcement.show', compact('announcement'));
  }
}
