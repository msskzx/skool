<div class="jumbotron">
   <ul>
      @foreach ($students as $student)
      <li>
         <a href = {{ url('student', $student->id)}}>{{ $student-> first_name }} {{ $student-> last_name }} </a>
      </li>
      @endforeach
   </ul>
</div>
