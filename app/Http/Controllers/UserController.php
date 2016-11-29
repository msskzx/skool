<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Auth;

class UserController extends Controller
{

  public function __construct() {
     $this->middleware('auth');
  }

  public function index() {
     return User::all();
  }

  public function show(User $user) {
     return $user;
  }
}
