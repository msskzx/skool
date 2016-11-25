@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Editing teacher: {{ $teacher -> first_name }} {{ $teacher -> last_name }}</h2>

    <hr>

    {!! Form::model($teacher, ['method' => 'PATCH', 'action' =>['TeacherController@update', $teacher->id]]) !!}

    @include('employee.teacher.form',['submitButtonText' => 'Edit'])

    {!! Form::close() !!}

  </div>

@endsection
