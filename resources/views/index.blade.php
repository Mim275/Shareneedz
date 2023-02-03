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
 <!----------- header banner ------------>
 <div id="myCarousel" class="carousel slide header-banner" data-bs-ride="carousel">
   
        <div class="carousel-inner">
            @php $i = 1; @endphp
            @foreach($sliders as $slider )
            <div class="carousel-item {{$i == 1 ? 'active' : '' }}">
                @php $i++; @endphp
                <img src="{{asset('uploads/slider/'.$slider->slider)}}" class="d-blocks w-100 img-fluid" alt="...">

                <div class="carousel-caption d-flex h-100 w-75 align-items-center text-bold justify-content-center">

                    @if($localization == 'en')
                    <h1>{{$slider->title}}</h1>
                    @elseif ($localization == 'bn')
                    <h1>{{$slider->title_bn}}</h1>
                    @endif
                </div>
            </div>
            @endforeach
            
            
            
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!----------- main section ------------->
    <main>

        <!-- request section -->
        <section>
            <h2 class="section-header ">
                @lang('index.requesttitle')
            </h2>
           <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 ">
                    <div class="col">
                        <div class="card h-75 rounded">
                            <p><a href="{{route('food')}}">
                                    <img src="{{asset('frontend/images/food.png')}}" class="card-img-top" alt="...">
                                </a></p>

                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-75">
                            <p><a href="{{route('cloth')}}">
                                    <img src="{{asset('frontend/images/cloth.jpg')}}" class="card-img-top" alt="...">
                                </a></p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-75">
                            <p><a href="{{route('book')}}">
                                    <img src="{{asset('frontend/images/books.jpeg')}}" class="card-img-top" alt="...">
                                </a></p>
                        </div>
                    </div>
                </div>
           </div>



        </section>


        <!-- gallery section -->

        <section>
            <h2 class="section-header">
              @lang('index.gallerytitle')
            </h2>
            <div class="container">
                <div class="gallery-slider">
                    @foreach($gallerys as $gallery)
                    <div class="mx-2" > <img class="w-100" src="{{asset('uploads/gallery/'. $gallery->gallery)}}" alt=""></div>
                    @endforeach
                </div>
            </div>

        </section>

        <!-- Donate section -->
        
        <section>
            <h2 class="section-header pt-3">
              @lang('index.donatortitle')
            </h2>
            <div class="container">
                <div class="donator-slider">
                  @foreach($donners as $donner)
                   <!-- Single Starts  -->
                    <div class="col-lg-4 col-md-6 mx-2">
                    <div class="team__item set-bg" style="background-image: url('{{asset('uploads/donner/'. $donner->image)}}');">
                        <div class="team__text">
                        <div class="team__title">
                            <h4>{{$donner->name}}</h4>
                            <span>{{$donner->bio}}</span>
                        </div>
                        
                        <div class="team__social">
                            <a target="_blank" href="{{$donner->facebook}}"><i class="fa fa-facebook"></i></a>
                      
                           
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- Single Ends    -->
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Team section -->
        
        <section>
            <h2 class="section-header pt-3 ">
              @lang('index.teamtitle')
            </h2>
            <div class="container">
                <div class="donator-slider">
                  @foreach($teams as $team)
                   <!-- Single Starts  -->
                    <div class="col-lg-4 col-md-6 mx-2">
                    <div class="team__item set-bg" style="background-image: url('{{asset('uploads/team/'. $team->image)}}');">
                        <div class="team__text">
                        <div class="team__title">
                            <h4>{{$team->name}}</h4>
                            <span>{{$team->bio}}</span>
                        </div>
                        
                        <div class="team__social">
                            <a target="_blank" href="{{$team->facebook}}"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" href="{{$team->github}}"><i class="fa fa-github"></i></a>
                           
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- Single Ends    -->
                    @endforeach
                </div>
            </div>

        </section>
 

    </main>


@endsection