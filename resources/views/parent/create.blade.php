@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Create a new parent</h2>

    <hr>

    {!! Form::open(['url' => 'parent']) !!}

    @include('parent.form',['submitButtonText' => 'Create'])

    {!! Form::close() !!}

  </div>

@endsection
