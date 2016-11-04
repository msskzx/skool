@extends('layouts.app')

@section('content')
  <div class = "container">
    <div class="jumbotron" >
      <div class="row">
         <div class="col-md-10">
            <h1>{{ $club -> name }}</h1>
            <p>{{ $club -> purpose }}</p>
         </div>

         <div class="col-md-2">
            {!! Form::open(['method' => 'POST', 'action' =>['ClubController@join', $club->id]]) !!}
             <button type="submit" class="btn btn-primary">
               <i class="fa fa-plus" aria-hidden="true"></i>Join</button>
            {!! Form::close() !!}
         </div>
    </div>
    </div>

    @unless(count($club->students) === 0)
     @include('student.students', ['students' => $club->students])
    @endunless
</div>
@endsection
