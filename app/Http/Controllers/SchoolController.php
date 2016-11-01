<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\School;

class SchoolController extends Controller
{
    public function index() {
       return School::all();
    }
}
