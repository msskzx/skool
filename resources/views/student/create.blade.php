@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Create a new student</h2>

    <hr>

    {!! Form::model($student,['url' => 'student']) !!}

    @include('student.form',['submitButtonText' => 'Create'])

    {!! Form::close() !!}

  </div>

@endsection
