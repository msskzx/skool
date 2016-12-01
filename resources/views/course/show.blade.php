@extends('layouts.app')

@section('content')
  <div class = "container">

    <div class="jumbotron" >

      <div class="row">
         <h3 class="col-md-10">Course: {{ $course->name }}</h3>

         <ul class="list-group col-md-2">
            @if(strcmp(Auth::user()->role, 'Student')==0)
            <li class="list-group-item"><a href="{{ action('CourseController@getGrades', [$course->id]) }}"><i class="fa fa-bar-chart-o" aria-hidden="true"></i>Grades</a></li>
            <li class="list-group-item"><a href="{{ action('QuestionController@getQuestionsByOthers', [$course->id]) }}"><i class="fa fa-question-circle-o" aria-hidden="true"></i>Questions</a></li>
            @endif
            <li class="list-group-item"><a href="{{ action('AssignmentController@getCourseAssignments', [$course->id]) }}"><i class="fa fa-file-text-o" aria-hidden="true"></i>Assignments</a></li>
         </ul>
      </div>

      <table class="table">
         <tbody>
            <tr>
               <td>Code</td>
               <td>{{ $course -> code }}</td>
            </tr>
            <tr>
               <td>Grade</td>
               <td>{{ $course -> grade }}th grade</td>
            </tr>
         </tbody>
      </table>

      <h4>Description</h4>
      <article class="lead">
         {{ $course -> description }}
      </article>

   </div>

</div>
@endsection
