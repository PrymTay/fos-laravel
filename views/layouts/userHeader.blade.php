
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="/css/style.css">

        <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
        <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
   
         <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"> 
         <link rel="stylesheet" type="text/css" href="/css/custom.css"> 
         <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
 
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

  <div class="sidebar">
    <div class="logo-details">
      
      <span class="logo_name">DigitalSolutions</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="{{ request()->is("/")? 'active':'' }}">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
     
     
        <li>
            <a href="{{ route('userOrder.index') }}" class="{{ request()->is("menu-admin")?'active':'' }}">
              <i class='bx bxs-dish' ></i>
              <span class="links_name">Order Now</span>
            </a>
          </li>
      
        <li>
          <a href="{{ route('userReport') }}" class="{{ request()->is("report_admin")?'active':'' }}">
            <i class='bx bxs-wallet' ></i>
            <span class="links_name">Expenditure</span>
          </a>
        </li>
        <li class="log_out">
          {{-- <i class='bx bx-power-off'></i> <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              {{ __('Logout') }}</a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form> --}}
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">

            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav style="background-color: #6AB187">
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li><a href="{{ route('recentOrders') }}">Home</a></li>
        
        <li class="nav-item dropdown">
            
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
                aria-haspopup="true" aria-expanded="false">My Account 
                <i class='bx bx-caret-down'></i></a> 
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    
                    
                  <i class='bx bxs-lock' ></i> <a class="dropdown-item" href="{{ route('password.request') }}">Change Password</a>
                  <div class="dropdown-divider"></div>
                
                  <i class='bx bx-power-off'></i> <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}</a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    
                </form>
                </div>
            
          
        </li>
  
    </ul>
    </div>
      <div class="profile-detail">
       
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
        aria-haspopup="true" aria-expanded="false"><span class="admin-name"> </span>
        {{ Auth::user()->username }} <i class='bx bx-caret-down'></i></a> 
        
  
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <i class='bx bx-user' ></i> <a style="color: black;" class="dropdown-item" href="{{ route('login') }}">Change Account</a>

        </div>
      </div>
    </nav>
    <section class="hom-section">
      <div class="home-content">  
     
             <main class="py-12">
               @yield('content')
           </main>
           </div>
         </div>
        </div>
    </section>
   
   
  </section>
