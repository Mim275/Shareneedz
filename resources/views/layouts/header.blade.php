 <!----------- header section ----------->
 <header class="header">

<!------ top header --------->
<div class="top-header py-2 d-none d-sm-block">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="d-flex" >
                    <div class="pe-3" >
                        <a href="">{{$setting->number}}</a>
                    </div>
                    <div >
                        <a href="">{{$setting->email}}</a>
                    </div>
            </div>
             <span>
               
                 <a href="locale/en">English</a>
                /
                  <a href="locale/bn">বাংলা</a>

             </span>
        </div>
    </div>
</div>


<!----- header navigation ----->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div id="site-header-logo">
            <a href="{{url('/')}}"><img src="{{asset('frontend/images/logo.png')}}" alt=""></a>
        </div>

      <!-- humber button -->
       
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon"></span>
      </button>

      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto ">

            <li class="nav-item "> <a class="nav-link" href="{{route('share')}}"> @lang('index.Share')  </a> </li>
            <li class="nav-item dropdown active">
                <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">  @lang('index.Request')  </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('food')}}"> @lang('index.Food')</a></li>
                  <li><a class="dropdown-item" href="{{route('cloth')}}"> @lang('index.Cloth') </a></li>
                  <li><a class="dropdown-item" href="{{route('book')}}"> @lang('index.Book') </a></li>
                </ul>
            </li>
           
            <li class="nav-item"><a class="nav-link" href="{{ route('help') }}"> @lang('index.Help') </a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('donate')}}"> @lang('index.Donate') </a></li>
           
           
           
       
             <!----------------- Authentication Links ------------------>

             @guest
                        <li class="nav-item">
                            <a data-bs-toggle="modal" href="#exampleModalToggle" role="button" id="site-header-login-button"
                            class="site-header-auth-button nav-link">@lang('index.login')</a>
                        </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                <a style="cursor:pointer;" data-bs-dismiss="modal" aria-label="Close" class="nav-link"
                                data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
                                
                                @lang('index.ragistration') 
                            
                            </a>
                                  
                                </li>
                            @endif
                        @else

                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                               <img class="avatar shadow-0 img-fluid rounded-circle"  src="{{asset('backend/images/userProfile1.png')}}" alt="...">
                              
                            
                        
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                            @if( \Auth::user()->role  == 3)
                                <li>
                                    <a target="_blank" class="dropdown-item"  href="{{route('admin.dashboard')}}"> @lang('index.admindashbord')</a>
                                </li>
                               
                            @elseif(\Auth::user()->role  == 2)
                              
                                 <li>
                                    <a class="dropdown-item"  href="{{route('volunteer.dashboard')}}">@lang('index.VolunteerDashboard')</a>
                                </li>
                          
                            @else
                                <li>
                                    <a class="dropdown-item"  href="{{route('user.dashboard')}}">@lang('index.userdashbord')</a>
                                </li>

                            @endif


                                <li>   <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        @lang('index.logout')
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        @endguest
         <!----------------- end Authentication Links ------------------>
    
        </ul>
       

      </div>
    </div>
</nav>


 
  <!-- offcanvas navigation -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <p></p>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
       <nav class="navbar" >
        <ul class="navbar-nav text-center w-100">
    
            <li class="nav-item "> <a class="nav-link" href="{{route('share')}}">@lang('index.Share')  </a> </li>
            <li class="nav-item dropdown active">
                <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">  @lang('index.Request')  </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('food')}}"> @lang('index.Food')</a></li>
                  <li><a class="dropdown-item" href="{{route('cloth')}}"> @lang('index.Cloth') </a></li>
                  <li><a class="dropdown-item" href="{{route('book')}}"> @lang('index.Book') </a></li>
                </ul>
            </li>
           
            <li class="nav-item"><a class="nav-link" href="{{ route('help') }}"> @lang('index.Help') </a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('donate')}}"> @lang('index.Donate') </a></li>
           
           
           
       
             <!----------------- Authentication Links ------------------>

             @guest
                        <li class="nav-item">
                            <a data-bs-dismiss="offcanvas" aria-label="Close" data-bs-toggle="modal" href="#exampleModalToggle" role="button" id="site-header-login-button"
                            class="site-header-auth-button nav-link">@lang('index.login')</a>
                        </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                <a data-bs-dismiss="offcanvas" style="cursor:pointer;" data-bs-dismiss="modal" aria-label="Close" class="nav-link"
                                data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">@lang('index.ragistration') </a>
                                  
                                </li>
                            @endif
                        @else

                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="avatar shadow-0 img-fluid rounded-circle" src="{{asset('backend/images/userProfile2.png')}}" alt="...">
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                            @if( \Auth::user()->role  == 3)
                                <li>
                                    <a target="_blank" class="dropdown-item"  href="{{route('admin.dashboard')}}"> Admin Dashboard</a>
                                </li>
                               
                            @elseif(\Auth::user()->role  == 2)
                              
                                 <li>
                                    <a class="dropdown-item"  href="{{route('volunteer.dashboard')}}">Volunteer Dashboard</a>
                                </li>
                          
                            @else
                                <li>
                                    <a class="dropdown-item"  href="{{route('user.dashboard')}}">User Dashboard</a>
                                </li>

                            @endif


                                <li>   <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        @lang('index.logout')
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        @endguest
                        <li class="nav-item" > <a class="nav-link" href="locale/en">English </a></li>
                        <li class="nav-item" > <a class="nav-link" href="locale/bn">বাংলা</a></li>
        </ul>
       </nav>
    </div>
</div>


</header>
