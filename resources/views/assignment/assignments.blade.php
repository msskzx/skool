@foreach ($assignments as $assignment)
   <div class="jumbotron">
      <h4>
         <a href = {{ url('assignment', $assignment->id) }}>
            {{ $assignment -> name }}
         </a>
      </h4>

      <h5>Post date: {{ $assignment -> post_date }}</h5>
      <h5>Due date: {{ $assignment -> due_date }}</h5>

   </div>
@endforeach
