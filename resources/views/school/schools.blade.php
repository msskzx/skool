@foreach ($schools as $school)
<div class="jumbotron">
   <h3>
      <a href = {{ url('school', $school->id) }}> {{ $school -> name }} </a>
   </h3>

   <ul>
      <li>Type: {{ $school -> type }}</li>
      <li>Address: {{ $school -> address }}</li>
   </ul>

   @if(array_key_exists('supplies', $school))
      <h4>Supplies</h4>
      <article>
         {{ $school->supplies }}
      </article>
   @endif

</div>
@endforeach
