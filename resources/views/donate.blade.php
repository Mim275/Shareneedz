@extends('layouts.app')
@section('content')


    <!-----------individual top banner --------------->
    <div style="background:  linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(117, 19, 93, 0.73)), url('{{asset('frontend/images/logo-donation.jpg')}}') no-repeat; background-size: cover; background-position: center center;"  class="category-banner d-flex justify-content-center align-items-center individual-top-banner">
        <div class="row">
            <div class="text-center">
                <h2><b>@lang('index.donattile')</b></h2>
            </div>
        </div>
    </div>
    <div class="text-center mt-5 ">
        <h5>@lang('index.note')</h5>
    </div>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- payment with mobile title -->
    <div class="text-center mt-5 ">
        <h4 class="py-3 py-md-5"><b>@lang('index.paymobiel')</b></h4>
    </div>

    <!-- payment with mobile -->
    <div class="container ">
    
        <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3">
          @foreach($mobils as $mobil)
            <div class="col">
                <div class="pay-circle border border-secondary d-flex justify-content-center align-items-center">
                    <img src="{{asset('uploads/account/'.$mobil->img)}}" alt="">
                </div>
                <div class="card-box card bg-light border-secondary" >
                    
                    <div class="card-body text-center">
                    <h5 class="card-title text-uppercase fw-bold">{{$mobil->name}}</h5>
                    
                    <p class="card-text fw-bold"><i class="fa fa-money" aria-hidden="true"></i> A/C TYPE:{{$mobil->actype}}</p>
                    <p class="card-text fw-bold"><i class="fa fa-credit-card" aria-hidden="true"></i> A/C NO: {{$mobil->acnumber}}</p>
                    </div>
                </div>
            </div>
        @endforeach
            
        </div>
  
    </div>




    <!-- payment with bank title -->
   
    <div class="text-center mt-5 ">
        <h4 class="py-3 py-md-5"><b>@lang('index.paybank')</b></h4>
    </div>

    <!-- payment with bank Account -->
    <div class="container ">
    
        <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3">
        @foreach($banks as $bank)
            <div class="col">
                <div class="pay-circle border border-secondary d-flex justify-content-center align-items-center">
                    <img src="{{asset('uploads/account/'.$bank->logo)}}" alt="">
                </div>
                <div class="card-box card bg-light border-secondary" >
                    
                    <div class="card-body text-center">
                    <h5 class="card-title text-uppercase fw-bold">{{$bank->bname}}</h5>
                    
                    <p class="card-text fw-bold"><i class="fa fa-money" aria-hidden="true"></i> A/C NAME :{{$bank->acname}}</p>
                    <p class="card-text fw-bold"><i class="fa fa-credit-card" aria-hidden="true"></i> A/C NO :{{$bank->acnumber}}</p>
                    <p class="card-text fw-bold"><i class="fa fa-codepen" aria-hidden="true"></i> SWIFT CODE : {{$bank->swift}}</p>
                    <p class="card-text fw-bold"><i class="fa fa-codepen" aria-hidden="true"></i> ROUTING NO :  {{$bank->routno}}</p>
                    <p class="card-text fw-bold"><i class="fa fa-map-marker" aria-hidden="true"></i> BRANCHES : {{$bank->branch}}</p>
                    </div>
                </div>
            </div>
        @endforeach
           
            
        </div>
  
    </div>
    
    
<!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "104838159073388");
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

@endsection