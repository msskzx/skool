@extends('layouts.app')

@section('content')
  <div class = "container">

     @include('search.form', ['searchURL' => 'school/search'])

     <h3>Schools offering elementary level</h3>
     <hr>
     @include('school.schools', ['schools' => $elementary_levels])

     <h3>Schools offering middle level</h3>
     <hr>
     @include('school.schools', ['schools' => $middle_levels])

     <h3>Schools offering high level</h3>
     <hr>
     @include('school.schools', ['schools' => $high_levels])

  </div>

@endsection
