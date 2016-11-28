@foreach ($schools as $school)
<div class="jumbotron">
   <h3>
      <a href = {{ url('school', $school->id) }}> {{ $school -> name }} </a>
   </h3>

   <ul>
      <li>Type: {{ $school -> type }}</li>
      <li>Fees: {{ $school -> fees }}</li>
   </ul>

</div>
@endforeach
