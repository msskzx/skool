@foreach ($courses as $course)
   <div class="jumbotron">
      <h4>Name:
         <a href = {{ url('course', $course->id)}}>{{ $course-> name }}</a>
      </h4>
      <h5>Code: {{ $course -> code }}</h5>

   </div>
@endforeach
