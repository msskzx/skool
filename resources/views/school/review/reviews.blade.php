@foreach ($reviews as $review)
<div class="jumbotron">

   <h3>{{ $review -> title }}</h3>
   <hr>
   <article class="lead">{{ $review-> review }}</article>

</div>
@endforeach
