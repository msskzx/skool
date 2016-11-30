@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Edit password</h2>

    <hr>

    {!! Form::open(['method' => 'PATCH', 'action' =>[$controller.'@password']]) !!}

      @include('auth.password.form',['submitButtonText' => 'Edit'])

    {!! Form::close() !!}

  </div>

@endsection
