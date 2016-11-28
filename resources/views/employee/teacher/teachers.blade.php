<ul>
   @foreach ($teachers as $teacher)
      <li>Name: {{ $teacher->first_name ." ". $teacher->last_name }}</li>
   @endforeach
</ul>
