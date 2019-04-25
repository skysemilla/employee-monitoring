<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DoReMa</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

   

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" style="background-color:#247f5b;">
            <div class="container">
                <div class="navbar-header" >

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand"  href="{{ url('/home') }}">


                        <font color="white" size="5">
                            <img style="max-width:36px; margin-top: -2px; margin-left: -20px"
                     src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/DOST_seal.svg/1010px-DOST_seal.svg.png">
                             &nbsp; &nbsp;
                            <strong>DOREMA</strong>
                        </font>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}"><font color="white">Login</font></a></li>
                            <li><a href="{{ route('register') }}"><font color="white">Register</font></a></li>
                        @else

                            <div class="collapse navbar-collapse">
                            
                            <ul class="nav navbar-nav">
                            @if(Auth::user()->hasActiveReport==false)
                            <li>
                               <a style="background-color:#247f5b;" href="/employee/create-report">
                                  <font color="white">  Create new report </font> </span>
                                </a>
                            </li>  
                            @else
                            <li>
                               <a style="background-color:#247f5b;" onclick="myFunction2()" href="#" >
                                  <font color="white">  Create new report </font> </span>
                                </a>
                            </li> 
                            @endif
                            <script>
                                function myFunction2() {
                                alert("You still have an active report.");
                            }
                            </script>   
                            <li class="dropdown">
                                <!-- <a style="background-color:#247f5b;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                  <font color="white">  Notifications </font> <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" >
                                    <li >   
                                        <a href="/my-profile" >Report Approved</a>
                                        <a href="/my-profile" >Report 2 Approved</a>

                                        
                                    </li>
                                </ul> -->
                                
                            <li class="dropdown" >
                                <a style="background-color:#247f5b;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                  <font color="white">  {{ Auth::user()->name }}  </font> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" >
                                    <li >   
                                        <a href="/my-profile" >My Profile</a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
