@foreach ($courses as $course)
   <div class="jumbotron">
      <h5>Name:
         <a href = {{ url('course', $course->id)}}>{{ $course-> name }}</a>
      </h5>
      <h5>Code: {{ $course -> code }}</h5>
   </div>
@endforeach
