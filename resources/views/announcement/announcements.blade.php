<ul>
   @foreach ($announcements as $announcement)
      <li>
         <a href = {{ url('announcement', $announcement-> id) }}> {{ $announcement -> title }} </a>
      </li>
   </div>
   @endforeach
</ul>
