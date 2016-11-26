@foreach ($schools as $school)
<div class="jumbotron">
   <h3>
      <a href = {{ url('school', $school->id) }}> {{ $school -> name }} </a>
   </h3>

   <ul>
      <li>{{ $school -> email }}</li>
      <li>{{ $school -> fees }}</li>
   </ul>

</div>
@endforeach
