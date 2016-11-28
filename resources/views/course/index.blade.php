@extends('layouts.app')

@section('content')
  <div class = "container">

     <div class="row">
        <h3 class="col-md-10">Courses</h3>
        <a href="{{ url('question/create') }}" class="btn btn-success col-md-2">Ask a question</a>
     </div>

     <hr>

     @include('course.courses')

</div>
@endsection
