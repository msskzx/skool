@extends('layouts.app')

@section('content')
  <div class = "container">

    <h2>Edit a question: {{ $question -> title }}</h2>

    <hr>

    {!! Form::model($question, ['method' => 'PATCH', 'action' =>['QuestionController@update', $question->id]]) !!}

    @include('question.form',['submitButtonText' => 'Edit'])

    {!! Form::close() !!}

  </div>

@endsection
