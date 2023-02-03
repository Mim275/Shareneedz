@extends('admin.layouts.app')
@section('content')


 <!-- Page Header-->
 <header class="bg-white shadow-sm px-4 py-3 z-index-20">
    <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">Team Setting</h2>
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
                                 
                <form action="{{url('team/'.$data->id)}}" method="POST" enctype="multipart/form-data">
                @method('put')                         
                @csrf
                                            
                                        <div class="">
                                            <p class="fw-bold">BASIC INFO</p>
                                            

                                        </div>

                                        
                                        <div class="col-12">

                                        <label for="inputName1" class="form-label">Name</label>
                                        <input name="name" type="name" value="{{$data->name}}" class="form-control" id="inputName1">
                                        </div>
                                        <div class="col-12">
                                        <label for="inputName5" class="form-label">Bio</label>
                                        <input name="bio" type="text" value="{{$data->bio}}" class="form-control" id="inputName5">
                                        </div>
                                        <div class="col-12">
                                        <label class="form-label">Team Member Image : size : 500 x 300 & under 2MB </label>
                                        <input require name="image" class="form-control" id="formFile" type="file">
                                        </div>
                                        <div class="col-12">

                                        <label for="inputName3" class="form-label">Facebook Profile Link</label>
                                        <input name="facebook" type="name" value="{{$data->facebook}}" class="form-control" id="inputName3">
                                        </div>
                                        <div class="col-12">

                                        <label for="inputName4" class="form-label">Github Profile Link</label>
                                        <input name="github" type="name" value="{{$data->github}}" class="form-control" id="inputName4">
                                        </div>
                                      
                                        
                                        <div class="userProfile-formBtn mt-3">
                                                <a href="{{route('team.index')}}" class="btn btn-outline-dark me-3" type="reset">BACK</a>
                                                <button class="btn btn-outline-dark" type="submit">UPLOAD</button>
                                            </div>
                                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection