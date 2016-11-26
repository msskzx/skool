<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Parentt;

use App\User;

use Auth;

use DB;

class ParentController extends Controller
{
   public function index() {
      return Parentt::all();
   }

   public function show(Parentt $parent) {
      $this->destroy($parent);
      return $parent;
   }

   public function create() {
      return view('parent.create');
   }

   public function store(Request $request) {
      $this->validate($request, [
        'username' => 'required|unique:users'
      ]);

      // -- (username, password, first_name, middle_name, last_name, email, address, phone_number, mobile_number1, mobile_number2)
      DB::statement('call insertParent(?, ?, ? ,? ,? ,? ,?, ?, ?, ?)',[
         $request['username'],
         bcrypt($request['password']),
         $request['first_name'],
         $request['middle_name'],
         $request['last_name'],
         $request['email'],
         $request['address'],
         $request['phone_number'],
         $request['mobile_number1'],
         $request['mobile_number2']
      ]);

      return $this->index();
   }

   public function edit(Parentt $parent) {
      return view('parent.edit', compact('parent'));
   }

   public function update(Request $request, Parentt $parent) {
      $parent->update($request->all());
      return $this->index();
   }

   public function destroy(Parentt $parent) {
     $user = User::where('username', $parent->username);

     if($user != null) {
        $user->delete();
        $parent->delete();
     }

     return $this->index();
   }
}
