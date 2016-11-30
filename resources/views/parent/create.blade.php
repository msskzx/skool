@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Sign up as a parent</h2>

    <hr>

    {!! Form::open(['url' => 'parent']) !!}

    @include('parent.form',['submitButtonText' => 'Create'])

    {!! Form::close() !!}

  </div>

@endsection
