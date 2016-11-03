<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Parentt;

class ParentController extends Controller
{
   public function index() {
      return Parentt::with('user')->get();
   }

   public function show(Parentt $parent) {
      return $parent;
   }

   public function create() {
      return view('parent.create');
   }

   public function store(Requrest $request, Parentt $parent) {
      $this->validate($request, [
        'username' => 'unique:users'
      ]);

      $parent->update($request->all());

      return $this->index();
   }

   public function edit() {
      return view('parent.edit');
   }

   public function update(Request $request, Parentt $parent) {
      $this->validate($request, [
        'username' => 'unique:users,username,'.$parent->id
      ]);

      $parent->update($request->all());

      return $this->index();
   }

   public function destroy(Parentt $parent) {
     $user = User::find($parent->username);
     $user->delete();

     return $this->index();
   }
}
