<ul>
   @foreach ($announcements as $announcement)
      <li>
         Title:<a href = {{ url('announcement', $announcement-> id) }}> {{ $announcement -> title }} </a>
      </li>
   @endforeach
</ul>
