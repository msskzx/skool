@extends('layouts.app')

@section('content')
  <div class = "container">

    <div class="jumbotron" >

      <h3>Course: {{ $course->name }}</h3>

      <table class="table">
         <tbody>
            <tr>
               <td>Code</td>
               <td>{{ $course -> code }}</td>
            </tr>
            <tr>
               <td>Grade</td>
               <td>{{ $course -> grade }}</td>
            </tr>
         </tbody>
      </table>

      <h4>Description</h4>
      <article class="lead">
         {{ $course -> description }}
      </article>

   </div>

   <div class="btn-group-vertical">
      <a href="{{ action('CourseController@getGrades', [$course->id]) }}" type="button" class="btn btn-primary">Grades</a>
      <a href="{{ action('QuestionController@getQuestionsByOthers', [$course->id]) }}" type="button" class="btn btn-primary">Questions</a>
      <a href="{{ action('AssignmentController@getCourseAssignments', [$course->id]) }}" type="button" class="btn btn-primary">Assignments</a>
   </div>

</div>
@endsection
