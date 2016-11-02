@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Create a new club</h2>

    <hr>

    {!! Form::open(['url' => 'club']) !!}

    @include('club.form',['submitButtonText' => 'Create'])

    {!! Form::close() !!}

  </div>

@endsection
