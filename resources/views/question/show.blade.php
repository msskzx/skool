@extends('layouts.app')

@section('content')
  <div class = "container">

    <div class="jumbotron">

      <h2>{{ $question -> title }}</h2>
      <hr>

      <article class="lead">
         {{ $question -> question}}
      </article>

    </div>

    @unless($question->answer==null)
    <div class="jumbotron">

      <h2>Answer</h2>
      <hr>

      <article class="lead">
         {{ $question -> answer}}
      </article>

   </div>
   @endunless

  </div>
@endsection
