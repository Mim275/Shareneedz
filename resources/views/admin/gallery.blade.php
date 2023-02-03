@extends('admin.layouts.app')
@section('content')


 <!-- Page Header-->
 <header class="bg-white shadow-sm px-4 py-3 z-index-20">
    <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">Gallery Setting</h2>
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
                                 
                <form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                            
                                        <div class="">
                                            <p class="fw-bold">BASIC INFO</p>
                                            

                                        </div>

                                        
                                        <div class="col-12">

                                            <label for="inputName1" class="form-label">Title</label>
                                            <input name="name" type="name" value="" class="form-control" id="inputName1">
                                        </div>
                                        
                                        <div class="col-12">
                                            <label class="form-label">Gallery Image : size : 800 x 550 & under 2MB </label>
                                            <input name="image" class="form-control" id="formFile" type="file">
                                        </div>
                                     
                                      
                                        
                                        <div class="userProfile-formBtn mt-3">
                                             
                                                <button class="btn btn-outline-dark" type="submit">UPLOAD</button>
                                            </div>
                                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Dashboard Counts Section-->
<section class="pb-0">
    <div class="container-fluid">
        <div class="card mb-0">
            <div class="card-body">
                <div class="row gx-5 bg-white">
                                 
                <table id="table_id1" class="display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th> Action </th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rows as $key=>$row)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$row->title}}</td>
                                        <td>
                                            <img style="width:200px;height:100px;"  src="{{asset('uploads/gallery/'.$row->gallery)}}" alt="gallery">
                                        </td>
                                     
                                        <td>
                                                        <a href="{{url('gallery/'.$row->id.'/edit')}}" class="btn btn-icon btn-primary"><i class="fas fa-pen-nib"></i></a>
                                                       

                                                        <form id="delete-form-{{ $row->id }}" action="{{route('gallery.destroy',$row->id)}}" style="display: none;" method="POST">
                                                        @method('DELETE')    
                                                        @csrf
                                                           
                                                                   </form>
                                                            <button type="button" class=" btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $row->id }}').submit();
                                                           }else {
                                                             event.preventDefault();
                                                              }"><i style="padding:6px;" class="fas fa-trash"></i></button>
                                                    
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


@endsection