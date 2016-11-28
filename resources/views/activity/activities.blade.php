@foreach ($activities as $activity)
   <div class="jumbotron">
      <h4>
         <a href = {{ url('activity', $activity->id) }}>
            {{ $activity -> type }}
         </a>
      </h4>

      <h5>Date: {{ $activity -> date }}</h5>

   </div>
@endforeach
