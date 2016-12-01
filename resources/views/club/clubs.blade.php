@foreach ($clubs as $club)
<div class="jumbotron">
   <h4>
      <a href = {{ url('club', $club->id)}}>{{ $club->name }}</a>
   </h4>
</div>
@endforeach
