<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Skool</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link href="{{ url('/css/libs/bootstrap4.min.css') }}" rel="stylesheet">
    <link href={{ url("css/libs/jquery-ui.css")}} rel="stylesheet">
    <link href={{ url('/css/skool.css')}} rel="stylesheet">

</head>


<body id="welcome">
   <img src="img/welcome.jpg" alt="welcome" id = "welcome-img">
   <div class="container">

      <div class="row">
        <div class="offset-md-10">
            <a href="login" class="btn btn-outline-secondary">Log in</a>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <h1 id = "welcome-head">Skool</h1>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <h6 id= "welcome-text">Someone... somewhere... in this universie...<br>is learning... something... somehow...</h6>
        </div>
      </div>

     <div class="row">
        <div class="col-sm-4 offset-sm-2">
           <div class="card card-block" id = "welcome-card">
             <h4 class="card-title">Teacher</h4>
             <p class="card-text">Have you ever taught in Hogwarts, Monsters University or Xavier Institute for Higher Learning?</p>
             <a href="teacher/create" class="btn btn-outline-secondary">Sign Up</a>
          </div>
       </div>

       <div class="col-sm-4">
          <div class="card card-block" id = "welcome-card">
             <h4 class="card-title">Parent</h4>
             <p class="card-text">Have you ever been the Godfather, Nemo's father, papa Smurf, Bruce Wayne, uncle Ben or pa Kent?</p>
             <a href="parent/create" class="btn btn-outline-secondary">Sign Up</a>
          </div>
       </div>
     </div>

  </div>
</body>

<!-- JavaScripts -->
<script src={{ url("js/libs/jquery.min.js")}}></script>
<script src={{ url("js/libs/bootstrap.min.js")}}></script>
<script src={{ url("js/skool.js")}}></script>

</html>
