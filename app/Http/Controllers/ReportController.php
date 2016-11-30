<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Report;

class ReportController extends Controller
{
   public function __construct() {
     $this->middleware('auth');
  }

   public function index() {
      $reports = Report::all();
      return $reports;
      // return view('report.index', compact('reports'));
   }

   public function show(Report $report) {
      $school = $report->school;
      return view('report.show', compact('report','school'));
   }

   public function create() {
      return view('report.create');
   }

   public function edit(Report $report) {
     return view('report.edit', compact('report'));
   }
}
