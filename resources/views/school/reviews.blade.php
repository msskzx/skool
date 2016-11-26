@foreach ($reviews as $review)
   <li>
      <a href = {{ url('school', [$review->school_id, $review->parent_id]) }}>{{ $review ->title }}</a>
   </li>
@endforeach
