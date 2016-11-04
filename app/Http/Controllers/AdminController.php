<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

class AdminController extends Controller
{
   public function __construct() {
      $this->middleware('auth');
   }

   public function index() {
      return Admin::all();
   }

   public function show(Admin $admin) {
      return $admin;
   }

   public function create() {
      $admin = Auth::user();
      return view('admin.create', compact('admin'));
   }

   public function store(Request $request) {
      $this->validate($request, [
         'username' => 'exists:users|required|unique:admins'
      ]);

      Admin::create($request->all());

      return $this->index();
   }

   public function edit(Admin $admin) {
      return view('admin.edit', compact('admin'));
   }

   public function update(Request $request, Admin $admin) {
      $this->validate($request, [
         'username' => 'exists:users|required|unique:admins,username,'.$admin->id
      ]);

      $admin->update($request->all());

      return $this->index();
   }

   public function destroy(Admin $admin) {
      $user = User::findOrFail($admin->username);
      $user->delete();

      return $this->index();
   }
}
