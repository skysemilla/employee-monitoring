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

   <script src="/js/table.js" async></script>
  
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

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
                               <!--  <li><a href="{{ route('register') }}"><font color="white">Register</font></a></li> -->
                            @else

                                <div class="collapse navbar-collapse">
                                  <ul class="nav navbar-nav">
                                    <li><a href="/admin/view-permanent"><font color="white">Permanent</font></a></li>
                                    <li><a href="/admin/view-nonpermanent"><font color="white">Non-permanent</font></a></li>
                                    <li><a href="/admin/view-top-management"><font color="white">Top Management</font></a></li>
                                    
                                <li class="dropdown" >
                                    <a style="background-color:#247f5b;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                      <font color="white">  {{ Auth::user()->name }} </font> <span class="caret"></span>
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
