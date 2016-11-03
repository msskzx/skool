@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Edit school: {{ $parent -> first_name }} {{ $parent -> last_name }}</h2>

    <hr>

    {!! Form::model($parent, ['method' => 'PATCH', 'action' =>['ParentController@update', $parent->id]]) !!}

    @include('parent.form',['submitButtonText' => 'Edit'])

    {!! Form::close() !!}

  </div>

@endsection
