@foreach ($assignments as $assignment)
   <div class="jumbotron">
      <h4>
         Assignment:
         <a href = {{ url('assignment', $assignment->id) }}>
            {{ $assignment -> name }}
         </a>
      </h4>

   </div>
@endforeach
