@extends('layouts.app')

@section('content')
  <div class = "container">
    <div class="jumbotron" >
      <div class="row">
         <div class="col-md-10">
            <h2>{{ $club -> name }}</h2>
         </div>

            <a href="{{ action('ClubController@join', [$club->id]) }}" class="btn btn-success col-md-1">
               <i class="fa fa-plus" aria-hidden="true"></i>Join</a>

      </div>

      <hr>

      <article class="lead">{{ $club -> purpose }}</article>

    </div>

    @unless(count($club->students) === 0)
      <div class="jumbotron">

         <h3>Members</h3>
         <hr>
         @include('student.students', ['students' => $club->students])

      </div>
    @endunless

</div>
@endsection
