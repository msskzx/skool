@extends('layouts.app')

@section('content')
<div class = "container">

   <div class="jumbotron" >
      <div class="row">
         <div class="col-md-9">
            <h1>{{ $student -> first_name ." ". $student->middle_name ." ". $student->last_name }}</h1>
         </div>

         @if(strcmp(Auth::user()->username, $student->username)==0)
            <div class="col-md-3">
               <ul class="list-group">
                  <li class="list-group-item"><a href="{{ route('student.edit', $student->id) }}"><i class="fa fa-edit" aria-hidden="true"></i>Edit information</a></li>
                  <li class="list-group-item"><a href="{{ url('student/edit/password') }}"><i class="fa fa-key" aria-hidden="true"></i>Edit password</a></li>
               </ul>
            </div>
         @endif

      </div>

      <table class="table">
         <tbody>
            <tr>
               <td>SSN</td>
               <td>{{ $student -> SSN }}</td>
            </tr>
            <tr>
               <td>Gender</td>
               <td>{{ $student -> gender }}</td>
            </tr>
            <tr>
               <td>Birth date</td>
               <td>{{ $student -> birth_date }}</td>
            </tr>
            @unless($student->username == null)
            <tr>
               <td>Username</td>
               <td>{{ $student -> username }}</td>
            </tr>
            @endunless
            @unless($student->email == null)
            <tr>
               <td>E-mail</td>
               <td>{{ $student -> email }}</td>
            </tr>
            @endunless
         </tbody>
      </table>
   </div>

</div>
@endsection
