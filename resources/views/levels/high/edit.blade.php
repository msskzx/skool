@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Edit high level number {{ $highlevel -> id}}</h2>

    <hr>

    {!! Form::model($highlevel, ['method' => 'PATCH', 'action' =>['HighLevelController@update', $highlevel -> id]]) !!}

    @include('levels.form',['submitButtonText' => 'Edit'])

    {!! Form::close() !!}

  </div>

@endsection
