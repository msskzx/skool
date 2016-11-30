<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

class HomeController extends Controller
{

    public function home() {
      if(Auth::check()) {
         return view('pages.home');
      }
       return view('pages.welcome');
    }
}
