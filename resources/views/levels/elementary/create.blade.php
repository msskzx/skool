@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Create a new elementary level</h2>

    <hr>

    {!! Form::open(['url' => 'elementarylevel']) !!}

      @include('levels.elementary.form',['submitButtonText' => 'Create'])

    {!! Form::close() !!}

  </div>

@endsection
