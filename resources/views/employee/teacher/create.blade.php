@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Sign up as a teacher</h2>

    <hr>

    {!! Form::open(['url' => 'teacher']) !!}

    @include('employee.teacher.form',['submitButtonText' => 'Create'])

    {!! Form::close() !!}

  </div>

@endsection
