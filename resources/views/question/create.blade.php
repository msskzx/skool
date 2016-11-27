@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Ask a new question</h2>

    <hr>

    {!! Form::open(['url' => 'question']) !!}

    @include('question.form',['submitButtonText' => 'Create'])

    {!! Form::close() !!}

  </div>

@endsection
