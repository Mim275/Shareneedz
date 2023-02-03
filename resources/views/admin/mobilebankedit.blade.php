@extends('admin.layouts.app')
@section('content')


 <!-- Page Header-->
 <header class="bg-white shadow-sm px-4 py-3 z-index-20">
    <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">Mobile Banking</h2>
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
                <form action="{{url('mobilebanking/'.$data->id)}}" method="POST" enctype="multipart/form-data">
                @method('put')                          
                @csrf
                                            
                                        <div class="">
                                            <p class="fw-bold">BASIC INFO</p>
                                            

                                        </div>

                                        
                                        <div class="col-12">

                                            <label for="inputName1" class="form-label">Account Name</label>
                                            <input name="name" type="name" value="{{$data->name}}" class="form-control" id="inputName1">
                                        </div>
                                        
                                        <div class="col-12">
                                            <label for="inputNumber3" class="form-label">Account Number</label>
                                            <input name="acnumber" type="number" value="{{$data->acnumber}}" class="form-control" id="inputNumber3">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Account logo : size : 200 x 200 & remove background </label>
                                            <input require name="image" class="form-control" id="formFile" type="file">
                                        </div>
                                        <div class="col-12 my-4">
                                            <label  for="inlineFormSelectPref">Account Type</label>
                                                <select name="actype" class="form-select" id="inlineFormSelectPref">
                                                    <option value="" >Choose...</option>
                                                  
                                                    <option value="Personal" {{ $data->actype ==  'Personal' ? 'selected' : '' }} >Personal</option>
                                                    <option value="Merchant" {{ $data->actype == 'Merchant' ? 'selected' : '' }} >Merchant</option>
                                                </select>
                                        </div>
                                      
                                        
                                        <div class="userProfile-formBtn mt-3">
                                                <a href="{{route('mobilebanking.index')}}" class="btn btn-outline-dark me-3" type="reset">Back</a>
                                                <button class="btn btn-outline-dark" type="submit">UPDATE</button>
                                            </div>
                                    </form>     
                </div>
            </div>
        </div>
    </div>
</section>


@endsection