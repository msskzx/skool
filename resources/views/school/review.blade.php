@extends('layouts.app')

@section('content')
  <div class = "container">
     <div class="jumbotron">

      <h3>{{ $all -> pivot -> title }}</h3>

      <hr>
      <article>{{ $all -> pivot -> review }}</article>

      <hr>

      <h5>Parent: {{ $all->first_name ." ". $all->middle_name ." ". $all->last_name}}</h5>
    </div>

</div>
@endsection
