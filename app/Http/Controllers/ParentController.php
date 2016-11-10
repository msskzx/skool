<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Parentt;

use App\User;

use Auth;

class ParentController extends Controller
{
   public function index() {
      return Parentt::with('students')->get();
   }

   public function show(Parentt $parent) {
      return $parent;
   }

   public function create() {
      $parent =Auth::user();
      return view('parent.create', compact('parent'));
   }

   public function store(Request $request) {
      $this->validate($request, [
        'username' => 'exists:users|required|unique:parents'
      ]);

      Parentt::create($request->all());

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
     $user = User::findOrFail($parent->username);
     $user->delete();

     return $this->index();
   }
}
