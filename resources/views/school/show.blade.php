@extends('layouts.app')

@section('content')
  <div class = "container">
    <div class="jumbotron" >
      <h1>{{ $school -> name }}</h1>

      <hr>

      <ul>
         <li>{{ $school -> email }}</li>
         <li>{{ $school -> phone_number1 }}</li>
         <li>{{ $school -> phone_number2 }}</li>
         <li>{{ $school -> fees }}</li>
         <li>{{ $school -> vision }}</li>
         <li>{{ $school -> mission }}</li>
         <li>{{ $school -> general_info }}</li>
         <li>{{ $school -> address }}</li>
         <li>{{ $school -> main_language }}</li>
         <li>{{ $school -> type }}</li>
      </ul>

    </div>

    @unless(empty($reviews))
       <div class="jumbotron">
         <h3>Reviews</h3>
         <ul>
          @include('school.reviews')
         </ul>
      </div>
   @endunless

</div>
@endsection
