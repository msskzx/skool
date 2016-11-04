<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CourseController extends Controller
{
   public function index() {
      return Course::all();
   }

   public function show(Course $course) {
      return $course;
   }

   public function create() {
      return view('course.create');
   }

   public function store(Request $request) {

     $this->validate($request, [
        'name' => 'required',
        'teacher_id' => 'required|exists:teachers,id'
     ]);

     Course::create($request->all());

     flash()->success('The course has been created successfully!');

     return $this->index();
   }

   public function edit(Course $course) {
     return view('course.edit', compact('course'));
   }

   public function update(Request $request, Course $course) {
      $this->validate($request, [
        'name' => 'required',
        'teacher_id' => 'required|exists:teachers,id'
     ]);

     $course->update($request->all());

     flash()->success('The course has been edited successfully!');

     return $this->index();
   }

   public function destroy(Course $course) {
     $course->delete();

     flash()->success('The course has been deleted successfully!');

     return $this->index();
   }
}
