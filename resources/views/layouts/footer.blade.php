    <!----------- footer ------------>
<footer class="footer-section footer-info py-3 py-sm-4 py-md-5 mt-4 mt-sm-5 ">
       <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 ">
            <div class="col ">
                
                        <img src="{{asset('frontend/images/logo.png')}}" alt="">
                        <p class="card-text"> 
                            @lang('index.footersiteinfo')
                        </p>
                        <div class="socialIcons">

                            <p><a href="{{$setting->facebook}}" target="_blank"><i class="fab fa-facebook social-icon"></i></a></p>
                            <p><a href="{{$setting->twitter}}" target="_blank" rel=""><i class="fab fa-twitter social-icon"></i></a></p>
                            <p><a href="{{$setting->youtube}}" target="_blank"><i class="fab fa-youtube social-icon"></i></a></p>
                        </div>
                   
            </div>
            <div class="col pt-4 pt-md-0">
                
                        <h5 class="card-title">@lang('index.Site')</h5>
                        <div class="footer-horizental-line"></div>
                        <ul class="list-unstyled" >
                            <li >
                                <a class="link-dark py-1 d-inline-block" href="{{route('share')}}">@lang('index.Share')  </a>
                            </li>
                        
                            <li ><a class="link-dark py-1 d-inline-block" href="{{route('food')}}"> @lang('index.Food')</a></li>
                            <li ><a class="link-dark py-1 d-inline-block" href="{{route('cloth')}}"> @lang('index.Cloth') </a></li>
                            <li ><a class="link-dark py-1 d-inline-block" href="{{route('book')}}"> @lang('index.Book') </a></li>
                            <li >
                                <a class="link-dark py-1 d-inline-block" href="{{route('donate')}}"> @lang('index.Donate') </a>
                            </li>
                        </ul>

                    </div>
            <div class="col pt-4 pt-md-0">
               
                        <h5 class="card-title">@lang('index.Support')</h5>
                        <div class="footer-horizental-line"></div>
                        <ul class="list-unstyled" >
                            <li  >
                                <a class="link-dark py-1 d-inline-block" href=""> @lang('index.Help') </a>
                            </li>
                            <li  >
                                <a class="link-dark py-1 d-inline-block" href=""> @lang('index.Terms') </a>
                            </li>
                        </ul> 
                </div>
                
            <div class="col pt-4 pt-md-0">
              
                        <h5 class="card-title">@lang('index.ContactUs')</h5>
                        <div class="footer-horizental-line"></div>
                        <p class="card-text"><i class="fas fa-phone"></i> {{$setting->number}}</p>
                        <p class="card-text"><i class="fas fa-envelope"></i> {{$setting->email}}</p>
                   
            </div>
        </div>
       </div>
    </footer>

    <!-- footer bottom 
    <div class="d-flex justify-content-around py-2 footer-bottom">
        <span>@lang('index.bottomfooter')</span>
        <span> Developed by <a target="_blank" href="https://www.webnurullah.com/"> <img style="width:25px"; src="{{asset('frontend/images/Developer_nurullah_logo.png')}}" alt=""> </a> </span>
    </div> -->
