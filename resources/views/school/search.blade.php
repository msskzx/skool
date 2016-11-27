@extends('layouts.app')

@section('content')
  <div class = "container">

     @include('school.searchForm')
     <h3>Search results</h3>
     @include('school.schools')

</div>
@endsection
