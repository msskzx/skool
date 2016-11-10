<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Announcement;

class AnnouncementController extends Controller
{
   public function __construct() {
      $this->middleware('auth');
    }

  public function index() {
     $announcements = Announcement::all();
     return $announcements;
   //   return view('announcement.index', compact('announcements'));
  }

  public function show(Announcement $announcement) {
     $school = $announcement->school($announcement);
     return view('announcement.show', compact('announcement','school'));
  }

  public function create() {
     return view('announcement.create');
  }

  public function edit(Announcement $announcement) {
    return view('announcement.edit', compact('announcement'));
  }
}
