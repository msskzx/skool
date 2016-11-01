@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Create a new high level</h2>

    <hr>

    {!! Form::open(['url' => 'highlevel']) !!}

    @include('levels.form',['submitButtonText' => 'Create'])

    {!! Form::close() !!}

  </div>

@endsection
