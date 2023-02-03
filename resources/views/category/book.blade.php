@extends('layouts.app')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
    </ul>
</div>
@endif
  <!-----------individual top banner --------------->
<div style="background:  linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(117, 19, 93, 0.73)), url('{{asset('frontend/images/books.jpeg')}}') no-repeat; background-size: cover; background-position: center center;" class="category-banner d-flex justify-content-center align-items-center individual-top-banner">
       
       <div class="text-center">
           <h2><b>@lang('index.book')</b></h2>
       </div>
  
</div>

<!------------ search bar ------------->
<div class="container">
    <div class="row search-bar d-flex justify-content-center align-items-center">
        <div class="col-md-8">
           <form action="{{route('search')}}" method="GET">
            <div class="search">
                <i class="fa fa-search"></i>
                <input name="search" type="text" class="form-control px-md-4" placeholder="@lang('index.search')">
                <button class="btn btn-primary"><i>@lang('index.search')</i></button>
            </div>
         </form>
        </div>
    </div>
 </div>

<!-------------- card -------------->
<div class="container">
   <div class="row gy-5 row-cols-1 row-cols-sm-2 row-cols-md-3">


    @foreach($posts as $book)
       <div class="col">
           <div class="card  border-0 individual-card">
               <img class="post-img" src="{{asset('uploads/post/'. $book->image_one)}}" class="card-img-top" alt="...">
               <div class="card-body card-info">
                   <h6 class="card-title"><b>{{$book->product}}</b></h6>
                   <p class="card-text">{{$book->category}}, {{$book->type}}</p>
                   <a class="btn btn-dark" href="{{url('post/' . $book->id)}}">@lang('index.details')</a>
               </div>
           </div>
       </div>
    @endforeach
    

   </div>
</div>
<!--------- pagination --------->
<div class="container">
    <div class="row">
        <div class="col-12 text-center mt-4 mt-md-5 pt-md-5">
        {{ $posts->render()}}
        </div>
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