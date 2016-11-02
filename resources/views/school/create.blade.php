@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Create a new school</h2>

    <hr>

    {!! Form::open(['url' => 'school']) !!}

    @include('school.form',['submitButtonText' => 'Create'])

    {!! Form::close() !!}

  </div>

@endsection
