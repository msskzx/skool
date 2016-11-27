@extends('layouts.app')

@section('content')
  <div class = "container">

    <div class="jumbotron">
      <h2>{{ $question -> title }}</h2>

      <hr>

      <article class="lead">
         {{ $question -> question}}
      </article>

      <hr>

      <h6>Student name: {{ $question->student->first_name ." ". $question->student->last_name }}</h6>
    </div>

    <div class="jumbotron">

      <h2>Answer</h2>

      <hr>
      
      @unless($question->answer==null)
         <article class="lead">
            {{ $question -> answer}}
         </article>

         <hr>

         <h6>Teacher name: {{ $question->teacher->first_name ." ". $question->teacher->last_name }}</h6>
      @endunless
    </div>
  </div>
@endsection
