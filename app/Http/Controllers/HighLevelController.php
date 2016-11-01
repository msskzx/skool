<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\HighLevel;

class HighLevelController extends Controller
{
    public function index() {
       return HighLevel::all();
    }
}
