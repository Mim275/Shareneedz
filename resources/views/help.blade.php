@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row mt-0 mt-md-0">
        <div class="col-12">
        <div style="background:  linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(117, 19, 93, 0.73)), url('{{asset('frontend/images/help.jpg')}}') no-repeat; background-size: cover; background-position: center center;"  class="category-banner justify-content-center align-items-center individual-top-banner">
        <div class="row">
            
        </div>
    </div>
      
            <br>
            <br>
            <p><b>@lang('index.p1')</b><br>
           @lang('index.p2')
             </p><br>

            <p><b>@lang('index.p3')</b><br>
                @lang('index.p4')
            </p><br>

            <p><b>@lang('index.p5')</b><br>
           @lang('index.p6')
            </p><br>

            <p><b>@lang('index.p7')</b><br>
            @lang('index.p8')</p><br>

            <p><b>@lang('index.p9')</b><br>
            @lang('index.p10')</p><br> 


            <p><b>@lang('index.p11')</b><br>
            @lang('index.p12')</p><br>

        </div>
    </div>
</div>

@endsection