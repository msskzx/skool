@extends('layouts.app')

@section('content')
  <div class = "container">

     <div class="jumbotron">
        <h2>{{ $activity-> type }}</h2>

        <table class="table">
           <tbody>
              <tr>
                 <td>Date</td>
                 <td>{{ $activity -> date }}</td>
              </tr>
              <tr>
                 <td>Location</td>
                 <td>{{ $activity -> location }}</td>
              </tr>
              <tr>
                 <td>Equipment</td>
                 <td>{{ $activity -> equipment }}</td>
              </tr>
              <tr>
                 <td>Teacher</td>
                 <td>{{ $teacher -> first_name ." ". $teacher->last_name }}</td>
              </tr>
           </tbody>
        </table>

        <h4>Description</h4>
        <article class="lead">
           {{ $activity -> description }}
        </article>
     </div>

     <a href="{{ action('ActivityController@join', [$activity->id]) }}" class="btn btn-success col-md-1">
      <i class="fa fa-plus" aria-hidden="true"></i>Join</a>

  </div>
@endsection
