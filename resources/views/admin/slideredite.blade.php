@extends('admin.layouts.app')
@section('content')


 <!-- Page Header-->
 <header class="bg-white shadow-sm px-4 py-3 z-index-20">
    <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">Slider Setting</h2>
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
                                 
                <form action="{{url('slider/'.$data->id)}}" method="POST" enctype="multipart/form-data">
                @method('put')                         
                @csrf
                                            
                                        <div class="">
                                            <p class="fw-bold">BASIC INFO</p>
                                            

                                        </div>

                                        
                                        <div class="col-12">

                                            <label for="inputName1" class="form-label">Title</label>
                                            <input name="name" type="name" value="{{$data->title}}" class="form-control" id="inputName1">
                                        </div>
                                        <div class="col-12">

                                            <label for="inputName2" class="form-label"> Bangla Title</label>
                                            <input name="name_bn" type="name" value="{{$data->title_bn}}" class="form-control" id="inputName2">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Slider Image : size : 1920 x 870 & under 2MB </label>
                                            <input require name="image" class="form-control" id="formFile" type="file">
                                        </div>
                                     
                                      
                                        
                                        <div class="userProfile-formBtn mt-3">
                                                <a href="{{route('slider.index')}}" class="btn btn-outline-dark me-3" type="reset">BACK</a>
                                                <button class="btn btn-outline-dark" type="submit">UPLOAD</button>
                                            </div>
                                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection