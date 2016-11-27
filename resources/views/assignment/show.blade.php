@extends('layouts.app')

@section('content')
  <div class = "container">

     <div class="jumbotron">
        <h2>Assignemt: {{ $assignment->name }}</h2>

        <table class="table">
           <tbody>
              <tr>
                 <td>Post date</td>
                 <td>{{ $assignment -> post_date }}</td>
              </tr>
              <tr>
                 <td>Due Date</td>
                 <td>{{ $assignment -> due_date }}</td>
              </tr>
           </tbody>
        </table>

        <article class="lead">
           {{ $assignment -> content }}
        </article>
     </div>

     <a href="{{ url('assignment/'.$assignment->id.'/solve') }}" class="btn btn-primary col-md-1">
      <i class="fa fa-pencil" aria-hidden="true"></i>Solve</a>

  </div>

@endsection
