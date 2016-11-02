@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Edit elementary level number {{ $elementarylevel -> id}}</h2>

    <hr>

    {!! Form::model($elementarylevel, ['method' => 'PATCH', 'action' =>['ElementaryLevelController@update', $elementarylevel->id]]) !!}

    @include('levels.elementary.form',['submitButtonText' => 'Edit'])

    {!! Form::close() !!}

  </div>

@endsection
