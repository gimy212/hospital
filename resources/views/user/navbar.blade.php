<nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="user.index"><span class="text-primary">One</span>-Health</a>

      <form action="#">
        <div class="input-group input-navbar">
          <div class="input-group-prepend">
            <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
          </div>
          <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
        </div>
      </form>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupport">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="user.index">Home</a> 
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="#3">Doctors</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="#4">News</a>
          </li>
          <li class="nav-item">
              <a class="nav-link"  href="#5">Appointment</a>
            </li>
          <li class="nav-item">
            <a class="nav-link"  href="#6">Contact</a>
          </li>
          @if(Route::has('login'))
          @auth
          <li class="nav-item">
            <a class="nav-link" style="background-color: greenyellow; color:white;" href="{{url('myappointment')}}">my appointment</a>
          </li>
          <li class="dropdown notification-list topbar-dropdown">
              <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                  <img src="{{asset('user/assets/img/20.jpg')}}" alt="user-image" class="rounded-circle" width="50" length="50">
                  <span class="pro-user-name ml-1">
                      {{auth()->user()->name}} <i class="mdi mdi-chevron-down"></i> 
                  </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                  <!-- item-->
                  <div class="dropdown-header noti-title">
                      <h6 class="text-overflow m-0">Welcome !</h6>
                  </div>
  
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <i class="fe-user"></i>
                      <span>My Account</span>
                  </a>
  
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <i class="fe-settings"></i>
                      <span>Settings</span>
                  </a>
  
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <i class="fe-lock"></i>
                      <span>Lock Screen</span>
                  </a>
  
                  <div class="dropdown-divider"></div>
  
                  <!-- item-->
                  {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <i class="fe-log-out"></i>
                      <span>Logout</span>
                  </a>
                   --}}
                  <a class="dropdown-item notify-item"

                      href="{{ route('logout') }}" 
                      onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"
                  >
                      <i class="fe-log-out"></i>
                      <span>Logout</span>
              
                  </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                  @csrf
              </form>
  
              </div>
          </li>
         
          @else
          <li class="nav-item">
            <a class="btn btn-primary ml-lg-3" href="{{ url('/' . $page='login') }}">Login </a>
            <a class="btn btn-primary ml-lg-3" href="{{ url('/' . $page='register') }}">Register</a>
          </li>
          @endauth
          @endif
          
        </ul>
      </div> <!-- .navbar-collapse -->
    </div> <!-- .container -->
  </nav>