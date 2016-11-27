@extends('layouts.app')

@section('content')
  <div class = "container">

    <div class="jumbotron" >
      <div class="row">
         <div class="col-md-10">
            <h1>{{ $student -> first_name ." ". $student->middle_name ." ". $student->last_name }}</h1>
         </div>

         <div class="col-md-2">
            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary col-md-12">Edit</a>
         </div>
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
