@foreach ($questions as $question)
   <div class="jumbotron">
      <h4>Question title:
         <a href = {{ url('question', $question->id)}}>
            {{ $question -> title }}
         </h4>
      </a>

      <h5>Course:
         <a href = {{ url('course', $question->course_id)}}>
            {{ $question -> course -> name }}
         </a>
      </h5>

      <h6>
         @if($question->answer == null)
            <h6>Not answered</h6>
         @else
            <h6>Answered</h6>
         @endif
      </h6>
   </div>
@endforeach
