<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Parentt;

use App\User;

class ParentController extends Controller
{
   public function index() {
      return Parentt::all();
   }

   public function show(Parentt $parent) {
      return $parent;
   }

   public function create() {
      return view('parent.create');
   }

   public function store(Request $request) {
      $id = User::where('username', $request['username']);
      if($id = null)
         return back();

      $this->validate($request, [
        'username' => 'exists:users|required|unique:parents|unique:users,username'.$id
      ]);

      Parentt::create($request->all());

      return $this->index();
   }

   public function edit(Parentt $parent) {
      return view('parent.edit', compact('parent'));
   }

   public function update(Request $request, Parentt $parent) {
      $this->validate($request, [
         'username' => 'exists:users|required|unique:users,username,'
                        .$parent->id.'|unique:parents,username,'.$parent->id
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
