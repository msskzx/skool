@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Create a new employee</h2>

    <hr>

    {!! Form::model($employee, ['url' => 'employee']) !!}

    @include('employee.form',['submitButtonText' => 'Create'])

    {!! Form::close() !!}

  </div>

@endsection
