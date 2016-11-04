@extends('layouts.app')

@section('content')
  <div class = "container">

    <div class="jumbotron" >
       <h1>Clubs</h1>
       <p>
         Clubs...<br>
         Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
       <a href="{{ url('/club/create') }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>Create</a>
    </div>

    @include('club.clubs')

</div>
@endsection
