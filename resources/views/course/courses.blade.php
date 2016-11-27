<div class="jumbotron">
   <ul>
      @foreach ($courses as $course)
         <li>
            <a href = {{ url('course', $course->id)}}>{{ $course-> name }}</a>
         </li>
      @endforeach
   </ul>
</div>
