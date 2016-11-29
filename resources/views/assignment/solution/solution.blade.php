@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Solve: {{ $assignment -> name }}</h2>

    <hr>

    {!! Form::open(['action' => ['AssignmentController@solve', $assignment->id]]) !!}

      @include('assignment.solution.form',['submitButtonText' => 'Submit'])

    {!! Form::close() !!}

  </div>

@endsection
