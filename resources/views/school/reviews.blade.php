@foreach ($reviews as $review)
   <li>
      Title:<a href = {{ url('school', [$review->school_id, $review->parent_id]) }}>{{ $review ->title }}</a>
   </li>
@endforeach
