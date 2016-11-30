@extends('layouts.app')

@section('content')
  <div class = "container">

     @unless(count($students) === 0)
        <div class="jumbotron">

           <h3>Members</h3>
           <hr>
           @include('student.students')

        </div>
     @endunless

</div>
@endsection
