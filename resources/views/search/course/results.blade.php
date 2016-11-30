@extends('layouts.app')

@section('content')
  <div class = "container">

     @include('search.form', ['searchURL' => 'course/search'])
     <h3>Results</h3>
     <hr>
     @if(empty($courses))
        <h5>No results</h5>
     @else
        @include('course.courses')
     @endif

</div>
@endsection
