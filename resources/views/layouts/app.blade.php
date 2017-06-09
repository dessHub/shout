<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shout App</title>


    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="../public/styles.css" type="text/css" />
    <style>
    body {
          font-family: 'Lato';
          background-color: ;
      }

    .fa-btn {
          margin-right: 6px;
      }

    </style>

</head>
<body id="app-layout">
<div id="container">
    <header>
      <h1><a href="/">Shout<span>App</span></a></h1>
        <h2></h2>
    </header>
    <nav>
                 <ul>
                    <li class="start selected"><a href="{{ url('/home') }}">Home</a></li>
                    @if (Auth::guest())
                      <li><a href="{{ url('/report') }}">Launch Complaint</a></li>
                    @else
                       @if (Auth::user()->role == "normal")
                      <li><a href="{{ url('/report') }}">Launch Complaint</a></li>
                      <li><a href="{{ url('/myreports'.Auth::user()->id) }}">My Complaints</a></li>
                       @else
                             <li class="dropdown">
                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                      View Reports<span class="caret"></span>
                                 </a>

                                 <ul class="dropdown-menu" role="menu">
                                     <li><a href="{{ url('/pending') }}"><i class="fa fa-btn fa-sign-out"></i>Pending</a></li>
                                     <li><a href="{{ url('/close') }}"><i class="fa fa-btn fa-sign-out"></i>Received</a></li>
                                     <li><a href="{{ url('/closed') }}"><i class="fa fa-btn fa-sign-out"></i>Closed</a></li>
                                 </ul>
                             </li>
                            <li><a href="{{ url('/users') }}">Users</a></li>
                           <li><a href="{{ url('/admins') }}">Admins</a></li>
                       @endif
                    @endif
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                         <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                          
                    @endif
                </ul>
    </nav>

   @yield('content')

    <div id="body">

    

    <section id="content">

   
    
        </section>
        
       
      <div class="clear"></div>
    </div>
    <footer>
        <div class="footer-content">
            
            
            <div class="clear"></div>
        </div>
        <div class="footer-bottom">
            
         </div>
    </footer>
</div>
</body>
</html>