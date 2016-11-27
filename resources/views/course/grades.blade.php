@extends('layouts.app')

@section('content')
  <div class = "container">

     <h3>Grades</h3>

     <hr>

     @unless(empty($grades))
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Assignment</th>
              <th>Grade</th>
            </tr>
          </thead>
          <tbody>
            @foreach($grades as $grade)
               <tr>
                 <td>{{ $grade -> name }}</td>
                 <td>{{ $grade -> grade }}</td>
               </tr>
            @endforeach
          </tbody>
        </table>
     @endunless

</div>
@endsection
