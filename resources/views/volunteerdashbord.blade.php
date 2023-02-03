@extends('layouts.app')
@section('content')

 <!-----------individual top banner --------------->
  <!-----------individual top banner --------------->
  <div style="background:  linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(117, 19, 93, 0.73)), url('{{asset('frontend/images/PROFILE.png')}}') no-repeat; background-size: cover; background-position: center center;"  class="category-banner d-flex justify-content-center align-items-center individual-top-banner">
        <div class="row">
            <div class="text-center">
            <h2><b>@lang('index.mprofile')</b></h2>
            </div>
        </div>
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


<!-- profile and form -->
<div class="bg-light">
    <!-- user volunteer -->
<div class="pb-3 pt-5 userOrVolunteer">
    <h3><center>@lang('index.Volunteer')</center> </h3>
  </div>
  <div class="container">
      <div class="row">

          <div class="col-sm-12 col-md-5 col-lg-4 d-flex justify-content-center align-middle text-center userProfile ">
              <div class="">
                  <div class="profileImage m-auto">
                     @if($users->image!=null)
                      <img id="one6" src="{{asset('uploads/profile/'.$users->image)}}" alt="">
                      @else
                      <img id="one6" src="{{asset('frontend/images/userProfile2.png')}}" alt="">
                      @endif
                  </div>
                  <div class="align-middle">
                      <p class="userName"><b>{{$users->name}}</b></p>
                  </div>
              </div>
          </div>
          <div class="col-sm-12 col-md-7 col-lg-8 userForm">
          <form class="row g-3" action="{{route('volunteer.update.profile',$users->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                  <div class="">
                      <p class="fw-bold">@lang('index.binfo')</p>
                    

                  </div>

                  
                  <div class="col-12">

                      <label for="inputName1" class="form-label">@lang('index.pppname')</label>
                      <input name="name" type="name" value="{{$users->name}} " class="form-control" id="inputName1">
                  </div>
                  
                  <div class="col-12">
                      <label for="inputNumber3" class="form-label">@lang('index.pphone')</label>
                      <input name="phone" type="number" value="{{$users->phone}}" class="form-control" id="inputNumber3">
                  </div>
                  <div class="col-12">
                      <label for="inputText7" class="form-label">@lang('index.address')</label>
                      <textarea name="address" id="inputText7" class="form-control" value="" rows="3" aria-label="With textarea">{{$users->address}}</textarea>
                  </div>
                  <div class="col-12">
                  <label for="inputText9" class="form-label">@lang('index.pp')</label>
                  <input name="image" onchange="readURL6(this);" type="file" class="form-control" id="inputText9">
                  </div>
                  
                  <div class="userProfile-formBtn">
                          <a href="" class="btn btn-outline-dark me-3" type="reset">@lang('index.pcancle')</a>
                          <button class="btn btn-outline-dark" type="submit">@lang('index.pbutton')</button>
                    </div>
              </form>
              <form class="row g-3" method="POST" action="{{ route('email.update')}}">
                        @csrf
                        @method('PUT')
                        <div class="col-12">

                            <div class="mt-5">
                            <p class="fw-bold">@lang('index.pemilaudate') </p>
                            </div>
                            <label for="inputEmail2" class="form-label">@lang('index.pemail')</label>
                            <input name="email" type="email" value="{{$users->email}}" class="form-control" id="inputEmail2">
                        </div>
                        
                  <div class="userProfile-formBtn">
                          <a href="" class="btn btn-outline-dark me-3" type="reset">@lang('index.pcancle')</a>
                          <button class="btn btn-outline-dark" type="submit">@lang('index.pbutton')</button>
                    </div>
              </form>
              <form class="row g-3" method="POST" action="{{ route('creadintial.update') }}">
                     @csrf
                    @method('PUT')
                    <div class="col-12">

                        <div class="mt-5">
                        <p class="fw-bold"> @lang('index.ppi') </p>
                        
                  <div class="col-12">
                      <label for="inputPassword4" class="form-label">@lang('index.pccp')</label>
                      <input type="password" class="form-control" id="inputPassword4" name="old_password">
                  </div>
                  <div class="col-12">
                      <label for="inputPassword5" class="form-label">@lang('index.pnp')</label>
                      <input type="password" class="form-control" id="inputPassword5" name="password">
                  </div>
                  <div class="col-12">
                      <label for="inputPassword6" class="form-label">@lang('index.pcp')</label>
                      <input type="password" class="form-control" id="inputPassword6" name="password_confirmation">
                  </div>

                  <div class="userProfile-formBtn mt-3">
                          <a href="" class="btn btn-outline-dark me-3" type="reset">@lang('index.pcancle')</a>
                          <button class="btn btn-outline-dark" type="submit">@lang('index.pbutton')</button>
                    </div>
            </form>
            
          </div>
      </div>

    </div>
  </div>
</div>



<!-- Dashboard Counts Section-->
<section class="pb-0">
    <div class="container">
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center my-3">
                    <h3>@lang('index.prlist')</h3> 
                 </div>
                <div class="row bg-white">
                <table id="frontdatatable" class="display">
                                <thead>
                                    <tr>
                                        <th>@lang('index.pno')</th>
                                        <th>@lang('index.prname')</th>
                                        <th>@lang('index.pitemname')</th>
                                        <th>@lang('index.pphonenumber')</th>
                                        <th>@lang('index.pcat')</th>
                                        <th>@lang('index.paddresslist')</th>
                                        <th>@lang('index.pexpiredate')</th>
                                        <th>@lang('index.paction')</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($requests as $key=>$request)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$request->name}}</td>
                                        <td>{{$request->product_name}}</td>
                                        <td>{{$request->phone}}</td>
                                        <td>{{$request->category}}</td>
                                        <td>{{$request->address}}</td>
                                        <td>{{$request->end_date}} {{$request->end_time}}</td>
                                        
                                                    <td>
                                                        <a href="{{url('acceptrequest/'.$request->id,$users->id)}}" class="btn btn-icon btn-primary">@lang('index.paccept')</a>
                                               
                                                    </td>    
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>         
                </div>
            </div>
        </div>
    </div>
</section>




<!-- My Accepted List-->
<section class="mt-5">
    <div class="container">
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center my-3">
                    <h3>@lang('index.pmyacceptlist')</h3> 
                 </div>
                <div class="row bg-white">
                <table id="frontdatatable2" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>@lang('index.pno')</th>
                                        <th>@lang('index.prname')</th>
                                        <th>@lang('index.pitemname')</th>
                                        <th>@lang('index.pphonenumber')</th>
                                        <th>@lang('index.pcat')</th>
                                        <th>@lang('index.paddresslist')</th>
                                        <th>@lang('index.pexpiredate')</th>
                                    
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($accepts as $key=>$accept)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$accept->name}}</td>
                                        <td>{{$accept->product_name}}</td>
                                        <td>{{$accept->phone}}</td>
                                        <td>{{$accept->category}}</td>
                                        <td>{{$accept->address}}</td>
                                        <td>{{$accept->end_date}} {{$accept->end_time}}</td>
                                        
                                                 
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>         
                </div>
            </div>
        </div>
    </div>
</section>




@endsection



<script type="text/javascript">
    function readURL6(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#one6')
                    .attr('src', e.target.result)
                    
            };
            reader.readAsDataURL(input.files[0]);
        }
    }


</script>