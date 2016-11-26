@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Sign up a new student</h2>

    <hr>

    {!! Form::open(['url' => 'student']) !!}

    @include('student.form',['submitButtonText' => 'Create'])

    {!! Form::close() !!}

  </div>

@endsection
