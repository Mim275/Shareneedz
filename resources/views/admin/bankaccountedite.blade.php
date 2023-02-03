@extends('admin.layouts.app')
@section('content')


 <!-- Page Header-->
 <header class="bg-white shadow-sm px-4 py-3 z-index-20">
    <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">MObile Banking</h2>
    </div>
</header>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Dashboard Counts Section-->
<section class="pb-0">
    <div class="container-fluid">
        <div class="card mb-0">
            <div class="card-body">
                <div class="row gx-5 bg-white">
                <form action="{{url('bankaccount/'.$data->id)}}" method="POST" enctype="multipart/form-data">
                @method('put')                    
                @csrf
                                            
                                        <div class="">
                                            <p class="fw-bold">BASIC INFO</p>
                                            

                                        </div>

                                        
                                        <div class="col-12">
                                            <label for="inputName1" class="form-label">Bank Name </label>
                                            <input name="bname" type="name" value="{{$data->bname}}" class="form-control" id="inputName1">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputName2" class="form-label">Account Name</label>
                                            <input name="acname" type="name" value="{{$data->acname}}" class="form-control" id="inputName2">
                                        </div>
                                        
                                        <div class="col-12">
                                            <label for="inputNumber3" class="form-label">Account Number</label>
                                            <input name="acnumber" type="number" value="{{$data->acnumber}}" class="form-control" id="inputNumber3">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Account logo : size : 200 x 200 & remove background</label>
                                            <input require name="image" class="form-control" id="formFile" type="file">
                                        </div>

                                        <div class="col-12">
                                            <label for="inputNumber5" class="form-label">Swift Code</label>
                                            <input name="swift" type="text" value="{{$data->swift}}" class="form-control" id="inputNumber5">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputNumber6" class="form-label">Routing No</label>
                                            <input name="routno" type="number" value="{{$data->routno}}" class="form-control" id="inputNumber6">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputNumber5" class="form-label">Branch Name</label>
                                            <input name="branch" type="text" value="{{$data->branch}}" class="form-control" id="inputNumber5">
                                        </div>
                                        
                                        <div class="userProfile-formBtn mt-3">
                                                <a href="{{route('bankaccount.index')}}" class="btn btn-outline-dark me-3" type="reset">BACK</a>
                                                <button class="btn btn-outline-dark" type="submit">UPDATE</button>
                                            </div>
                                    </form>
                              
                </div>
            </div>
        </div>
    </div>
</section>


@endsection