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
    <div style="background:  linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(117, 19, 93, 0.73)), url('{{asset('frontend/images/share.jpg')}}') no-repeat; background-size: cover; background-position: center center;"  class="category-banner d-flex justify-content-center align-items-center individual-top-banner">
        <div class="row">
            <div class="text-center">
                <h2><b>@lang('index.pagetitle')</b></h2>
            </div>
        </div>
    </div>

    
<!-- form -->
<div class="container">

    @if(Auth::check())
    <!-- form description -->
    <div class="row">
        <div class="text-center my-3 my-md-4 my-lg-5  py-3 py-md-4 py-lg-5">
            <h3>@lang('index.fromtitle')</h3>
            <p class="text-center ">
                @lang('index.fromsubtitle')
            </p>
        </div>
    </div>


    
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="row gy-4 px-3 px-md-5 bg-light">
            <div class="col-lg-6 col-12   input-box">
                <label class="form-label">@lang('index.sharetype')</label>
                <select name="category" type="selected" class="postcat form-select-md form-select-input" aria-label=".form-select-md example">
                  
                    <option value="@lang('index.Food')">@lang('index.Food')</option>
                    <option value="@lang('index.Book')">@lang('index.Book')</option>
                    <option value="@lang('index.Cloth')">@lang('index.Cloth')</option>
                </select>
            </div>
            <div class="col-lg-6 col-12  input-box">
                <label class="form-label">@lang('index.type')</label>
                <select name="type" type="selected" class="form-select-md form-select-input" aria-label=".form-select-md example">
                  
                    <option value="@lang('index.individual')">@lang('index.individual')</option>
                    <option class="resto" value="@lang('index.restaurant')">@lang('index.restaurant')</option>
                </select>
            </div>

            <div class="col-lg-6 col-12  input-box">
                <label for="inputName4" class="form-label">@lang('index.shareholder'):</label>
                <input value="{{$user->name}}" name="name" type="text" class="form-control" id="inputName4">
            </div>
            <div class="col-lg-6 col-12  input-box">
                <label for="inputnumber5" class="form-label">@lang('index.phone'):</label>
                <input  value="{{$user->phone}}" name="phone" type="number" class="form-control" id="inputnumber5">
            </div>
            <div class="col-lg-6 col-12  input-box">
                <label for="inputnumber10" class="form-label">@lang('index.pname'):</label>
                <input name="product" type="text" class="form-control" id="inputnumber10">
            </div>

            <div class="col-12 col-lg-6 input-box">
                <label for="inputAddress" class="form-label">@lang('index.address'):</label>
                <input  value="{{$user->address}}" name="address" type="text" class="form-control" id="inputAddress" placeholder="">
            </div>

            <div class="etime col-lg-6 col-12  input-box">
                <label for="inputDate4" class="form-label">@lang('index.edate'):</label>
                <input name="date" type="date" class="form-control" id="inputDate4">
            </div>
            <div class="etime col-lg-6 col-12  input-box">
                <label  for="inputTime4" class="form-label ">@lang('index.etitme'):</label>
                <input name="time" type="time" class="form-control" id="inputTime4">
            </div>

            <div class="col-12 input-box">
                <label for="inputText4" class="form-label">@lang('index.details'):</label>
                <textarea name="details" class="form-control" rows="4" aria-label="With textarea"></textarea>
            </div>

            <div class="col-lg-6 col-12  input-box">
                <label style="font-size: 12px" for="" class="form-label">@lang('index.inputmax'):</label>
                
                <input name="image_one" onchange="readURL1(this);" type="file" class="form-control" id="">
            </div>
            <div class="col-lg-6 col-12  input-box">
                <label style="font-size: 12px" for="" class="form-label">@lang('index.inputmax'):</label>
                <input name="image_two" onchange="readURL2(this);" type="file" class="form-control" id="">
            </div>

            <div class="col-lg-6 col-12  input-box">
                
                <input name="image_three" onchange="readURL3(this);" type="file" class="form-control" id="">
            </div>
            <div class="col-lg-6 col-12  input-box">
                <input name="image_four" onchange="readURL4(this);" type="file" class="form-control" id="">
            </div>

            <div class="row mt-5">
                <div class="col-2 offset-2">
                    <img style="width:100px;border:1px solid #E9ECEF;"
                        src="{{ asset('frontend/images/projectdemo.png') }}" id="one" alt="">
                </div>
                <div class="col-2 ">
                    <img style="width:100px;border:1px solid #E9ECEF;"
                        src="{{ asset('frontend/images/projectdemo.png') }}" id="two" alt="">
                </div>
                <div class="col-2 ">
                    <img style="width:100px;border:1px solid #E9ECEF;"
                        src="{{ asset('frontend/images/projectdemo.png') }}" id="three" alt="">
                </div>
                <div class="col-2">
                    <img style="width:100px;border:1px solid #E9ECEF;"
                        src="{{ asset('frontend/images/projectdemo.png') }}" id="four" alt="">
                </div>
            </div>

      
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <div class="col-12 d-flex justify-content-center align-middle py-4 py-lg-5">
                    <button type="submit" class="btn btn-dark form-submit-btn">@lang('index.submitpost')</button>
                </div>
           
          
        </div>
    </form>
    @else
    <div class="row">
        <div class="text-center my-3 my-md-4 my-lg-5  py-3 py-md-4 py-lg-5">
            <h3>@lang('index.logoutsharepagetile')</h3>
            <p class="text-center ">
                @lang('index.fromsubtitle')
            </p>
            <div class="d-flex justify-content-center sharepost">
                <button data-bs-toggle="modal" href="#exampleModalToggle" role="button" id="site-header-login-button"
                class="me-2 px-3">@lang('index.login')</button>
            <button data-bs-dismiss="modal" aria-label="Close" class="ms-2 "
                data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">@lang('index.ragistration')</button>
            </div>
        </div>
    </div>                       
   
    
    @endif
  
</div>


@endsection
<!-- # fron end show image in project page -->
<script type="text/javascript">
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#one')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#two')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#three')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#four')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
