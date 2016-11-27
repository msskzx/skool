@extends('layouts.app')

@section('content')
  <div class = "container">
    <div class="jumbotron" >
      <h1>{{ $announcement -> title }}</h1>

      <table class="table">
       <tbody>
         <tr>
           <td>Type</td>
           <td> {{ $announcement->type }}</td>
         </tr>
         <tr>
           <td>Date</td>
           <td> {{ $announcement->date }}</td>
         </tr>
       </tbody>
     </table>

      <hr>

      <h3>Description</h3>

      <article>
            {{ $announcement -> description}}
      </article>
    </div>

</div>
@endsection
