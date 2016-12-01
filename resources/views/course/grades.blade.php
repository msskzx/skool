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
               @unless($grade->grade == null)
               <tr>
                 <td>{{ $grade -> name }}</td>
                 <td>
                    <div class="progress">
                       <div class="progress-bar progress-bar-striped active" role="progressbar"
                       aria-valuenow="{{ $grade->grade }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $grade->grade }}%">
                         {{ $grade->grade }}%
                       </div>
                     </div>
                 </td>
               </tr>
               @endunless
            @endforeach
          </tbody>
        </table>
     @endunless

</div>
@endsection
