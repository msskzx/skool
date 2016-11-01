@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Create a new middle level</h2>

    <hr>

    {!! Form::open(['url' => 'middlelevel']) !!}

    @include('levels.form',['submitButtonText' => 'Create'])

    {!! Form::close() !!}

  </div>

@endsection
