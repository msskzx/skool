@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Edit student: {{ $student -> first_name }} {{ $student -> last_name }}</h2>

    <hr>

    {!! Form::model($student, ['method' => 'PATCH', 'action' =>['StudentController@update', $student->id]]) !!}

    @include('student.form',['submitButtonText' => 'Edit'])

    {!! Form::close() !!}

  </div>

@endsection
