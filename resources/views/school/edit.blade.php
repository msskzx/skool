@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Edit school: {{ $school -> name}}</h2>

    <hr>

    {!! Form::model($school, ['method' => 'PATCH', 'action' =>['SchoolController@update', $school->id]]) !!}

    @include('school.form',['submitButtonText' => 'Edit'])

    {!! Form::close() !!}

  </div>

@endsection
