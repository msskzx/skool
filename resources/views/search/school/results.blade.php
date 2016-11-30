@extends('layouts.app')

@section('content')
  <div class = "container">

     @include('search.form', ['searchURL' => 'school/search'])
     <h3>Results</h3>
     <hr>
     @if(empty($schools))
        <h5>No results</h5>
     @else
        @include('school.schools')
     @endif
</div>
@endsection
