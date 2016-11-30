@extends('layouts.app')

@section('content')
  <div class = "container">

     @include('search.form', ['searchURL' => 'course/search'])

     <h3>Courses</h3>

     <hr>

     @include('course.courses')

</div>
@endsection
