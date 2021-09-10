<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ config('app.name', 'Digital solutions') }}</title>  

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script> 
    
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script> 
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    {{-- {{-- <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Font Icon -->
    {{-- <link rel="stylesheet" href="/fonts/material-icon/css/material-design-iconic-font.min.css"> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  
    
    {{-- <link href="{{ asset('css/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
     
    <link href="{{ asset('css/css/bootstrap-grid.css') }}" rel="stylesheet"> 
    
 
     {{-- <link rel="stylesheet" href="/css/form.css">
    <link rel="stylesheet" href="/css/style.css">  --}}
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">  
    <link rel="stylesheet" type="text/css" href="/css/custom.css"> 
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>  
</head>
<body>
    <div id="app">
         <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">  
            <div class="container">
                 <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Digital solutions') }}
                </a>  
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

       
              <div>
                @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
            
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}<i class='bx bx-caret-down'></i>
                    </a>
           

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest

            
              </div>
            </li>
        
          </ul>

          {{-- <div class="profile-detail">
             
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{-- <i class='bx bx-caret-down'></i> {{ Auth::user()->name }} --}}
          </a>
        
        </div> 
          </div>
     
          </nav>
      
          <div class="home-content">
    
            <main class="py-12">
                @yield('content')
            </main>
          </div>
    </section>
                
 </div>
        

   

       
    </div>
</body>
</html>
