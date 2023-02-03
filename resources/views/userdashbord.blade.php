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
         <div class=" pt-5 pb-3 userOrVolunteer">
            <h3><center>@lang('index.user') </center></h3> 
        </div>
  <div class="container">
      <div class="row">
   
          <div class="col-sm-12 col-md-5 col-lg-4 d-flex justify-content-center align-middle text-center userProfile ">
              <div class="">
                  <div class="profileImage m-auto">
                    @if($users->image!=null)
                      <img id="one5" src="{{asset('uploads/profile/'.$users->image)}}" alt="">
                      @else
                      <img id="one5" src="{{asset('frontend/images/userProfile2.png')}}" alt="">
                      @endif
                    </div>
                  <div class="align-middle">
                      <p class="userName"><b>{{$users->name}}</b></p>
                  </div>
              </div>
          </div>

          <div class="col-sm-12 col-md-7 col-lg-8 userForm">
          <form class="row g-3" action="{{route('user.update.profile',$users->id)}}" method="POST" enctype="multipart/form-data">
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
                  <input name="image" onchange="readURL5(this);" type="file" class="form-control" id="inputText9">
                  </div>
                  <div class="userProfile-formBtn">
                          <a href="" class="btn btn-outline-dark me-3" type="reset">@lang('index.pcancle')</a>
                          <button class="btn btn-outline-dark" type="submit">@lang('index.pbutton')</button>
                    </div>
              </form>
              
          </div>
      </div>

</div>
  </div>
</div>



<!-- clarification list -->
<div class="text-center my-5">
  <h5>@lang('index.pddclist')</h3>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">

                    <table class="table">
                    <thead class="thead-light">
                        <tr>
                                        <th>@lang('index.pno')</th>
                                        <th>@lang('index.acctype') </th>
                                        <th> @lang('index.acnumber')</th>
                                        <th> @lang('index.transactionid') </th>
                                        <th>@lang('index.amount')</th>
                                        <th>@lang('index.acdate')</th>
                                        <th> @lang('index.paction') </th>
                        </tr>
                    </thead>
                    <tbody>
                     
                                    @foreach($rows as $key=>$row)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$row->paytype}}</td>
                                        <td>{{$row->anumber}}</td>
                                        <td>{{$row->tid}}</td>
                                        <td>{{$row->amount}}</td>
                                        <td>{!! date('d-M-Y', strtotime($row['paydate'])) !!}</td>
                                     
                                        <td>
                                            <a target="_blank" style="padding:10px;" href="{{url('user/invoice',$row->id)}}" class="btn btn-icon btn-primary"> INVOICE </a>
                                        </td>    
                                    </tr>
                                   @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>



@endsection

<script type="text/javascript">
    function readURL5(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#one5')
                    .attr('src', e.target.result)
                    
            };
            reader.readAsDataURL(input.files[0]);
        }
    }


</script>