@extends('layouts.app')

@section('content')
  <div class = "container">

     @include('school.searchForm')

     <?php $schools = $elementary_levels ?>
     <h3>Schools offering elementary level</h3>
     @include('school.schools')

     <?php $schools = $middle_levels ?>
     <h3>Schools offering middle level</h3>
     @include('school.schools')

     <?php $schools = $high_levels ?>
     <h3>Schools offering high level</h3>
     @include('school.schools')

  </div>

@endsection
