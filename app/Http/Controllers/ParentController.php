<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Parent;

class ParentController extends Controller
{
   public function index() {
      return Parent::all();
   }

   public function show(Parent $parent) {
      return $parent;
   }

   public function create() {
      return view('parent.create');
   }

   public function store(Requrest $request, Parent $parent) {
      $this->validate($request, [
        'username' => 'unique:users'
      ]);

      $parent->update($request->all());

      return $this->index();
   }

   public function edit() {
      return view('parent.edit');
   }

   public function update(Request $request, Parent $parent) {
      $this->validate($request, [
        'username' => 'unique:users,username,'.$parent->id
      ]);

      $parent->update($request->all());

      return $this->index();
   }

   public function destroy(Parent $parent) {
     $user = User::find($parent->username);
     $user->delete();

     return $this->index();
   }
}
