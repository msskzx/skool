@foreach ($clubs as $club)
<div class="jumbotron">
   <h3>
      <a href = {{ url('club', $club->id)}}>{{ $club->name }}</a>
   </h3>
</div>
@endforeach
