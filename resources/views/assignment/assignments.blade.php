@foreach ($assignments as $assignment)
   <div class="jumbotron">
      <h4>
         Assignment:
         <a href = {{ url('assignment', $assignment->id) }}>
            {{ $assignment -> name }}
         </a>
      </h4>

      <h5>
         Course:
         <a href = {{ url('course', $assignment->course_id) }}>
            {{ $assignment -> course -> name }}
         </a>
      </h5>

   </div>
@endforeach
