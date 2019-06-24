<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

<!-- Styles -->

<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> 
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}}"> 
<!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet"> -->


<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  -->

<script src="{{asset('js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>  -->

<script src="{{asset('js/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>
<!-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>  -->
       
</head>
<body>
    <div id="app">
        <nav class="navbar ">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{ url('/') }}">Mi Aplicacion</a>
                    </div>
                
                         <!-- Authentication Links -->
                         @guest
                         <ul class="nav navbar-nav navbar-right">
                            <li class="">
                             <a class="nav-link" href="{{ route('login') }}">
                                 <span class="glyphicon glyphicon-user"></span>Iniciar Session
                            </a>
                            </li>
                            <li class="">
                                @if (Route::has('register'))
                                 <a class="nav-link" href="{{ route('register') }}"> 
                                        <span class="glyphicon glyphicon-log-in"></span> Registrarse
                                 </a>
                                @endif
                            </li>
                           
                         </ul>
                        @else
                        <ul class="nav navbar-nav">
                            @if(Auth::user()->hasRole('admin'))
                                <li>
                                    <a href="{{ url('/user') }}">Administrar Usuarios</a>
                                </li>
                                
                                <li>
                                    <a href="{{ url('/roles') }}">Administrar Roles</a>
                                </li>
                                  
                            @endif
                        
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                        
                            <li class="dropdown" >
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                     USUARIO:  {{ Auth::user()->name }} </span>
                                </a>  
                                <ul class="dropdown-menu">                                   
                                </ul>
                            </li>
                            <li>                    
                                    <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                       Cerrar Session
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
        
                            </li>
                           
                        </ul>
                        @endguest      
                </div>
        </nav>

     @yield('content')

    </div>
 

   
</body>

 <!-- Scripts -->
    <!-- <script src="{{ asset('js/jquery-3.3.1.js') }}" type="text/javascript"></script>-->
    
</html>
