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
     return User::all()->groupBy('role');
  }

  public function show(User $user) {
     return $user;
  }

  public function create() {
     return $this->index();
  }

  public function store(Request $request, User $user) {
     return $this->index();
  }

  public function edit(User $user) {
     return $this->index();
  }

  public function update(Request $request, User $user) {
     /*
     | username is unique on users table in the column username
     | ignoring the username of $user
     */
     $this->validate($request, [
       'username' => 'unique:users,username,'.$user->id
     ]);

     $user->update($request->all());

     return $this->index();
  }

  public function destroy(User $user) {
    if(Auth::user()->id === $user->id) {
        $user->delete();
    }
    return $this->index();
  }
}
