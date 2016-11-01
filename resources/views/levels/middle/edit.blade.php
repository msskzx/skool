@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Edit middle level number {{ $middlelevel -> id}}</h2>

    <hr>

    {!! Form::model($middlelevel, ['method' => 'PATCH', 'action' =>['MiddleLevelController@update', $middlelevel -> id]]) !!}

    @include('levels.form',['submitButtonText' => 'Edit'])

    {!! Form::close() !!}

  </div>

@endsection
