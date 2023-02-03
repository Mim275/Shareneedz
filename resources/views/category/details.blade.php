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
    <div style="background:  linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(117, 19, 93, 0.73)), url('{{asset('uploads/post/'. $posts->image_one) }}') no-repeat; background-size: cover; background-position: center center;" class="category-banner d-flex justify-content-center align-items-center individual-top-banner">
       
            <div class="text-center">
                <h2 class="text-capitalize" ><b>{{$posts->category}} </b></h2>
            </div>
     
    </div>

    




    <!-- post details -->
    <section class="py-3 py-md-5" >
        <div class="container" >
            <div class="row row-cols-1 row-cols-lg-2">
                <div class="col">
                    <div class="preview">
                        <div class="preview-pic tab-content">
                    
                            <div class="tab-pane active" id="pic-1"><img src="{{asset('uploads/post/'. $posts->image_one)}}" /></div>
                            @if($posts->image_two!=null)
                            <div class="tab-pane" id="pic-2"><img src="{{asset('uploads/post/'. $posts->image_two)}}" /></div>
                           @endif
                           @if($posts->image_three!=null)
                            <div class="tab-pane" id="pic-3"><img src="{{asset('uploads/post/'. $posts->image_three)}}" /></div>
                            @endif
                            @if($posts->image_four!=null)
                            <div class="tab-pane" id="pic-4"><img src="{{asset('uploads/post/'. $posts->image_four)}}" /></div>
                            @endif
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            <li class="active">
                                <a data-bs-target="#pic-1" data-bs-toggle="tab"><img src="{{asset('uploads/post/'. $posts->image_one)}}" /></a>
                            </li>
                            @if($posts->image_two!=null)
                            <li>
                                <a data-bs-target="#pic-2" data-bs-toggle="tab"><img src="{{asset('uploads/post/'. $posts->image_two)}}" /></a>
                            </li>
                            @endif
                            @if($posts->image_three!=null)
                            <li>
                                <a data-bs-target="#pic-3" data-bs-toggle="tab"><img src="{{asset('uploads/post/'. $posts->image_three)}}" /></a>
                            </li>
                            @endif
                            @if($posts->image_four!=null)
                            <li>
                                <a data-bs-target="#pic-4" data-bs-toggle="tab"><img src="{{asset('uploads/post/'. $posts->image_four)}}" /></a>
                            </li>
                            @endif
                        </ul>
                    </div> 
                </div>                         
 
                <div class=" col">

                    <div class="card postDetails py-3">
                        <div class="card-body">
                            <ul>
                                <li> <h5 class="">{{$posts->product}} </h5></li>
                               
                                <li><b>@lang('index.shareholder'):</b> {{$posts->name}}</li>
                                <li><b>@lang('index.phone'):</b> {{$posts->phone}}</li>
                                <li><b>@lang('index.address'):</b> {{$posts->address}}</li>

                                @if($posts->date)
                                <li><b>@lang('index.edate'):</b> {{$posts->time}} {{$posts->date}}</li>
                               @endif
                                <li><b>@lang('index.details'):</b>
                                    <p>{{$posts->details}}</p>
                                </li>
                            </ul>
                            <div class="text-center">

                            @if(Auth::check())

                            <form method="POST" action="{{route('sentrequest',$posts->id)}}">
                                    @csrf
                                
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <input type="hidden" name="user_name" value="{{$user->name}}">
                                    <input type="hidden" name="user_phone" value="{{$user->phone}}">
                                    <input type="hidden" name="user_address" value="{{$user->address}}">
                                    <input type="hidden" name="user_email" value="{{$user->email}}">
                                  

                                    <button class="btn btn-primary" type="submit">@lang('index.sentrequest')</button>
                             </form>


                             @else

                           
                           
                            <div class="d-flex justify-content-center">
                                <button data-bs-toggle="modal" href="#exampleModalToggle" role="button" id="site-header-login-button"
                                class="me-2 px-3">@lang('index.login')</button>
                            <button data-bs-dismiss="modal" aria-label="Close" class="ms-2 "
                                data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">@lang('index.ragistration')</button>
                            </div>
                            <p>@lang('index.creattext')</p>
                                @endif


                             
                            </div>
                        </div>
                      </div>

                 
                </div>
            </div>
        </div>
    </section>

    <!-- share on social media -->
 <!-- ShareThis BEGIN -->
 <div class="sharethis-inline-share-buttons"></div>
 <!-- ShareThis END -->


@endsection