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
    <link href="{{ url('/css/libs/bootstrap.min.css') }}" rel="stylesheet">
    <link href={{ url("css/libs/jquery-ui.css")}} rel="stylesheet">
    <link href={{ url('/css/skool.css')}} rel="stylesheet">

</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Skool
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">

                   <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                      Links <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{ url('/levels') }}">Schools</a></li>

                      <li role="separator" class="divider"></li>

                      <li><a href="{{ url('/teacher/create') }}"><i class="fa fa-plus" aria-hidden="true"></i>New teacher</a></li>
                      <li><a href="{{ url('/parent/create') }}"><i class="fa fa-plus" aria-hidden="true"></i>New parent</a></li>
                    </ul>
                  </li>

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              {{ Auth::user()->username }}<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                               @if(Auth::check() && strcmp(Auth::user()->role, 'Student')==0)
                               <li><a href="{{ url('/student/profile') }}">My profile</a></li>
                               <li><a href="{{ url('/student/school') }}">My School</a></li>
                               <li><a href="{{ url('/student/courses') }}">My courses</a></li>
                               <li><a href="{{ url('/student/assignments') }}">My assignments</a></li>

                               <li role="separator" class="divider"></li>

                               <li><a href="{{ url('/question/create') }}">Ask a question</a></li>

                               <li role="separator" class="divider"></li>
                               @endif

                               <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class = "container">
      @include('flash::message')
    </div>

    @yield('content')

</body>

<!-- JavaScripts -->
<script src={{ url("js/libs/jquery.min.js")}}></script>
<script src={{ url("js/libs/bootstrap.min.js")}}></script>
<script src={{ url("js/libs/select2.min.js")}}></script>
<script src={{ url("js/libs/jquery-ui.js")}}></script>
<script src={{ url("js/skool.js")}}></script>

</html>
