@extends('admin.layouts.app')
@section('content')


 <!-- Page Header-->
 <header class="bg-white shadow-sm px-4 py-3 z-index-20">
    <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">Site Setting</h2>
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
                                <form  action="{{route('admin.sitesettingupdate',$row->id)}}" method="POST">
                                                @csrf
                                            
                                        <div class="">
                                            <p class="fw-bold">BASIC INFO</p>
                                            
                                        </div>

                                        
                                        <div class="col-12">

                                            <label for="inputName1" class="form-label">Phone Number</label>
                                            <input name="number" type="number" value="{{$row->number}}" class="form-control" id="inputName1">
                                        </div>
                                        
                                        <div class="col-12">

                                            <label for="inputName2" class="form-label">Email</label>
                                            <input name="email" type="email" value="{{$row->email}}" class="form-control" id="inputName2">
                                        </div>
                                        
                                        <div class="col-12">

                                            <label for="inputName3" class="form-label">Facebook Link</label>
                                            <input name="facebook" type="url" value="{{$row->facebook}}" class="form-control" id="inputName3">
                                        </div>
                                        
                                        <div class="col-12">

                                            <label for="inputName4" class="form-label">Youtube link</label>
                                            <input name="youtube" type="url" value="{{$row->youtube}}" class="form-control" id="inputName4">
                                        </div>
                                        
                                        <div class="col-12">

                                            <label for="inputName5" class="form-label">Twitter link</label>
                                            <input name="twitter" type="url" value="{{$row->twitter}}" class="form-control" id="inputName5">
                                        </div>
                                        
                                        <div class="col-12">

                                            <label for="inputName6" class="form-label">Linkdin Number</label>
                                            <input name="linkdin" type="url" value="{{$row->linkdin}}" class="form-control" id="inputName6">
                                        </div>
                                        
                                        <div class="col-12">
                                            <label for="inputText7" class="form-label">Footer info</label>
                                            <textarea name="footerinfo" id="inputText7" class="form-control" value="" rows="3" aria-label="With textarea">{{$row->footerinfo}}</textarea>
                                        </div>
                                      

                                        
                                            <div class="userProfile-formBtn mt-3">
                                             
                                                <button class="btn btn-outline-dark" type="submit">UPDATE</button>
                                            </div>
                                    </form>          
                              
                </div>
            </div>
        </div>
    </div>
</section>


@endsection