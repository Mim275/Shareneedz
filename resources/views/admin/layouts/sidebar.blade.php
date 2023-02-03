 <!-- Side Navbar -->
 <nav class="side-navbar z-index-40">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center py-4 px-3"><img
            class="avatar shadow-0 img-fluid rounded-circle" src="{{asset('backend/images/adminprofilepic.jpg')}}" alt="...">
        <div class="ms-3 title">
            <h1 class="h4 mb-2"> {{Auth::user()->name;}} </h1>
            <p class="text-sm text-gray-500 fw-light mb-0 lh-1">{{Auth::user()->phone;}}</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus-->
    <ul class="list-unstyled py-4">

      
        <li class="sidebar-item {{ (\Request::route()->getName() == 'admin.dashboard') ? 'active' : '' }}"><a class="sidebar-link" href="{{route('admin.dashboard')}}"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <use xlink:href="#real-estate-1"> </use></svg>
            
            Home </a>
        </li>
        <li class="sidebar-item "><a class="sidebar-link" href="#requestdropdown"
                data-bs-toggle="collapse">
                <i style="font-size: 20px; padding-right:5px" class="far fa-paper-plane"></i>
                Request List</a>
            <ul class="collapse list-unstyled {{ (\Request::route()->getName() == 'pendingrequest') ? 'active show' : '' }} {{ (\Request::route()->getName() == 'acceptrequestlist') ? 'active show' : '' }}" id="requestdropdown">
               
                <li class="{{ (\Request::route()->getName() == 'pendingrequest') ? 'active' : '' }}" ><a class="sidebar-link " href="{{route('pendingrequest')}}">Pending Request </a></li>

                <li class="{{ (\Request::route()->getName() == 'acceptrequestlist') ? 'active' : '' }}" ><a class="sidebar-link" href="{{route('acceptrequestlist')}}">Accepted Request</a></li>
                
            </ul>
         </li>
        <li class="sidebar-item {{ (\Request::route()->getName() == 'sharepost.index') ? 'active' : '' }}"><a class="sidebar-link" href="{{route('sharepost.index')}}"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#survey-1"> </use>
              </svg>
            
            Share Post </a>
        </li>
      

        <li class="sidebar-item {{ (\Request::route()->getName() == 'slider.index') ? 'active' : '' }}"><a class="sidebar-link" href="{{route('slider.index')}}"> 
            <i style="font-size: 20px; padding-right:10px" class="far fa-calendar"></i>
            
            Slider </a>
        </li>
        <li class="sidebar-item {{ (\Request::route()->getName() == 'gallery.index') ? 'active' : '' }}"><a class="sidebar-link" href="{{route('gallery.index')}}"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#portfolio-grid-1"> </use>
              </svg>
            
            Gallery </a>
        </li>
        <li class="sidebar-item {{ (\Request::route()->getName() == 'donner.index') ? 'active' : '' }}"><a class="sidebar-link" href="{{route('donner.index')}}"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                <use xlink:href="#user-1"> </use>
            </svg> &nbsp;
            
            Donator </a>
        </li>
        <li class="sidebar-item {{ (\Request::route()->getName() == 'team.index') ? 'active' : '' }}"><a class="sidebar-link" href="{{route('team.index')}}"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                <use xlink:href="#user-1"> </use>
            </svg> &nbsp;
            
            Team </a>
        </li>
     
        <li class="sidebar-item"><a class="sidebar-link" href="#userdropdown2"
                data-bs-toggle="collapse">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                    <use xlink:href="#sales-up-1"> </use>
                  </svg> Payment List </a>
            <ul class="collapse list-unstyled {{ (\Request::route()->getName() == 'mobilebanking.index') ? 'active show' : '' }} {{ (\Request::route()->getName() == 'bankaccount.index') ? 'active show' : '' }}" id="userdropdown2">
                
                <li class="{{ (\Request::route()->getName() == 'mobilebanking.index') ? 'active' : '' }}" ><a class="sidebar-link" href="{{route('mobilebanking.index')}}">Mobile Banking </a></li>

                <li class="{{ (\Request::route()->getName() == 'bankaccount.index') ? 'active' : '' }}" ><a class="sidebar-link" href="{{route('bankaccount.index')}}">Bank Account</a></li>
                
            </ul>
        </li>
        <li class="sidebar-item"><a class="sidebar-link" href="#userdropdown"
                data-bs-toggle="collapse">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#user-1"> </use>
                </svg> &nbsp;User List</a>
            <ul class="collapse list-unstyled {{ (\Request::route()->getName() == 'userlist') ? 'active show' : '' }} {{ (\Request::route()->getName() == 'volunteerlist') ? 'active show' : '' }}" id="userdropdown">
               
                <li class="{{ (\Request::route()->getName() == 'userlist') ? 'active' : '' }}" ><a class="sidebar-link" href="{{route('userlist')}}">User</a></li>
                
                <li class="{{ (\Request::route()->getName() == 'volunteerlist') ? 'active' : '' }}" ><a class="sidebar-link" href="{{route('volunteerlist')}}">Volunteer</a></li>
                
            </ul>
        </li>
        <li class="sidebar-item {{ (\Request::route()->getName() == 'donatclarify.index') ? 'active' : '' }}">
            
            <a class="sidebar-link" href="{{route('donatclarify.index')}}"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                    <use xlink:href="#quality-1"> </use>
                  </svg>
           Donation Clarification </a>
        </li>
        <li class="sidebar-item {{ (\Request::route()->getName() == 'sitesetting') ? 'active' : '' }}">
            
            <a class="sidebar-link" href="{{route('sitesetting')}}"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                    <use xlink:href="#imac-screen-1"> </use>
                  </svg>
           Site Setting </a>
        </li>
        <li class="sidebar-item {{ (\Request::route()->getName() == 'setting.dashboard') ? 'active' : '' }}">
            
            <a class="sidebar-link" href="{{route('setting.dashboard')}}"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                    <use xlink:href="#disable-1"> </use>
                  </svg>
           Admin Setting </a>
        </li>
    </ul>

</nav>