<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\MiddleLevel;

class MiddleLevelController extends Controller
{
    public function index() {
       return MiddleLevel::all();
    }
}
