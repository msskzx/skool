@extends('layouts.app')

@section('content')
  <div class = "container">
    <div class="jumbotron" >
      <div class="row">
         <h1 class="col-md-10 lead">{{ $school -> name }}</h1>

         <div class="col-md-2">
            <ul class="list-group">
               <li class="list-group-item"><a href="{{ action('ActivityController@getSchoolActivities', [$school->id]) }}">Activities</a></li>
               <li class="list-group-item"><a href="{{ action('ClubController@getSchoolClubs', [$school->id]) }}">Clubs</a></li>
               <li class="list-group-item"><a href="{{ action('SchoolController@reviewIndex', [$school->id]) }}">Reviews</a></li>
            </ul>
         </div>

      </div>

      <table class="table">
       <tbody>
         <tr>
           <td>Type</td>
           <td>{{ $school -> type }}</td>
         </tr>
         <tr>
           <td>Fees</td>
           <td>{{ $school -> fees }}</td>
         </tr>
         <tr>
            <td>Address</td>
            <td>{{ $school -> address }}</td>
         </tr>
         <tr>
            <td>E-mail</td>
            <td>{{ $school -> email }}</td>
         </tr>
         <tr>
           <td>Phone number 1</td>
           <td>{{ $school -> phone_number1 }}</td>
         </tr>
         <tr>
           <td>Phone number 2</td>
           <td>{{ $school -> phone_number2 }}</td>
         </tr>
         <tr>
           <td>Main language</td>
           <td>{{ $school -> main_language }}</td>
         </tr>
       </tbody>
      </table>

      <hr>

      <h3>Mission</h3>
      <article class="lead">
         {{ $school -> mission }}
      </article>

      <hr>

      <h3>Vission</h3>
      <article class="lead">
         {{ $school -> vision }}
      </article>

      <hr>

      <h3>General information</h3>
      <article class="lead">
         {{ $school -> general_info }}
      </article>

    </div>

    @unless(empty($reviews))
       <div class="jumbotron">
         <h3>Reviews</h3>
         <hr>
         <ul>
          @include('school.reviews')
         </ul>
      </div>
   @endunless

   @unless(empty($announcements))
      <div class="jumbotron">
        <h3>Announcements</h3>
        <hr>
         @include('announcement.announcements')
     </div>
   @endunless

   @unless(empty($teachers))
      <div class="jumbotron">
        <h3>Teachers</h3>
        <hr>
         @include('employee.teacher.teachers')
     </div>
   @endunless

</div>
@endsection
