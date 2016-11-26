@extends('layouts.app')

@section('content')
  <div class = "container">
    <div class="jumbotron" >
      <h3>{{ $all -> title }}</h3>

      <hr>

      <p style="color:red;">{{ $all -> pivot -> review }}</p>

    </div>

</div>
@endsection
