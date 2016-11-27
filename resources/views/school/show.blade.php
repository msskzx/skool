@extends('layouts.app')

@section('content')
  <div class = "container">
    <div class="jumbotron" >
      <h1>{{ $school -> name }}</h1>

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

      <h4>General information:</h4>
      <article>
         {{ $school -> mission }}
      </article>

      <hr>

      <h4>General information:</h4>
      <article>
         {{ $school -> vision }}
      </article>

      <hr>

      <h4>General information:</h4>
      <article>
         {{ $school -> general_info }}
      </article>

    </div>

    @unless(empty($reviews))
       <div class="jumbotron">
         <h3>Reviews</h3>
         <ul>
          @include('school.reviews')
         </ul>
      </div>
   @endunless

   @unless(empty($announcements))
      <div class="jumbotron">
        <h3>Announcements</h3>
         @include('announcement.announcements')
     </div>
   @endunless

</div>
@endsection
