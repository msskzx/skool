@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Edit school: {{ $employee -> first_name }} {{ $employee -> last_name }}</h2>

    <hr>

    {!! Form::model($employee, ['method' => 'PATCH', 'action' =>['EmployeeController@update', $employee->id]]) !!}

    @include('employee.form',['submitButtonText' => 'Edit'])

    {!! Form::close() !!}

  </div>

@endsection
