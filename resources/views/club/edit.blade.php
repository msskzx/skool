@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Edit club: {{ $club -> name}}</h2>

    <hr>

    {!! Form::model($club, ['method' => 'PATCH', 'action' =>['ClubController@update', $club->id]]) !!}

    @include('club.form',['submitButtonText' => 'Edit'])

    {!! Form::close() !!}

  </div>

@endsection
