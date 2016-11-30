@extends('layouts.app')

@section('content')
  <div class = "container">
    <div class="jumbotron" >
      <div class="row">
         <div class="col-md-10">
            <h2>{{ $club -> name }}</h2>
         </div>
         @if(strcmp(Auth::user()->role, 'Student')==0 && Auth::user()->student->grade>9)
            <a href="{{ action('ClubController@join', [$club->id]) }}" class="btn btn-success col-md-1">
               <i class="fa fa-plus" aria-hidden="true"></i>Join</a>
         @endif
      </div>

      <hr>

      <article class="lead">{{ $club -> purpose }}</article>

    </div>

</div>
@endsection
