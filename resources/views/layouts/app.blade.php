

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--====== Title ======-->
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="{{asset('frontend/images/logo.png')}}" type="image/x-icon">
        <!-- font awesome -->
        <script src="{{url('https://kit.fontawesome.com/a364c6e355.js')}}" crossorigin="anonymous"></script>




       
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@100;200;300;400;500;600;700;800;900&family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


        
        {{-- share button --}}
        <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=undefined&product=undefined' async='async'></script>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
        alpha/css/bootstrap.css" rel="stylesheet">
       
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    
        <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



        <!-- bootstrap css -->
        <link rel="stylesheet" type="text/css" href="{{asset('backend/datatable/datatables.min.css')}}">
        
         <!-- bootstrap css -->
        <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
        <!-- stylesheet -->
        <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
        <!-- css breakpoint -->
        <link rel="stylesheet" href="{{asset('frontend/css/breakpoint.css')}}">
        <!-- slick slider css -->
        <link rel="stylesheet" href="{{asset('frontend/slick/slick.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/slick/slick-theme.css')}}">
        <!-- modal css -->
        <link rel="stylesheet" href="{{asset('frontend/css/modal.css')}}">
        



    </head>
    <body >
       
            @include('layouts.header')
            @yield('content')
            @include('layouts.footer')
            @include('layouts.login')

          
            <!-- jquery -->
            <script src="{{asset('frontend/js/jquery.js')}}"></script>
            <!-- slick slider js -->
            <script src="{{asset('frontend/slick/slick.min.js ')}}"></script>
            <!-- bootstrap js -->
            <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
             
            
            <!-- data table -->
             <script type="text/javascript" charset="utf8" src="{{asset('backend/datatable/datatables.min.js')}}"></script>
          
          
            <!-- modal js -->
            <script src="{{asset('frontend/js/modal.js')}}"></script>


            <script>
                @if(Session::has('success'))
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
                        toastr.success("{{ session('success') }}");
                @endif
              
                @if(Session::has('error'))
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
                        toastr.error("{{ session('error') }}");
                @endif
              
                @if(Session::has('info'))
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
                        toastr.info("{{ session('info') }}");
                @endif
              
                @if(Session::has('warning'))
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
                        toastr.warning("{{ session('warning') }}");
                @endif
              </script>
<!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "111768158460983");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v15.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>              


            <!-- js -->
            <script src="{{asset('frontend/js/script.js')}}"></script>
    </body>
</html>
