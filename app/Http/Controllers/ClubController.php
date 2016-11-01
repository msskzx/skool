<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Club;

class ClubController extends Controller
{

    public function index() {
       return Club::all();
    }
}
