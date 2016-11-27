@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Solve: {{ $assignment -> title }}</h2>

    <hr>

    {!! Form::open(['action' => ['AssignmentController@solve', $assignment->id]]) !!}

      @include('assignment.solution.form',['submitButtonText' => 'Solve'])

    {!! Form::close() !!}

  </div>

@endsection
