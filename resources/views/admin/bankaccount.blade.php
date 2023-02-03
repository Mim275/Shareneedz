@extends('admin.layouts.app')
@section('content')


 <!-- Page Header-->
 <header class="bg-white shadow-sm px-4 py-3 z-index-20">
    <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">Bank Account</h2>
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
                                 
                <form action="{{route('bankaccount.store')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                            
                                        <div class="">
                                            <p class="fw-bold">BASIC INFO</p>
                                            

                                        </div>

                                        
                                        <div class="col-12">
                                            <label for="inputName1" class="form-label">Bank Name</label>
                                            <input name="bname" type="name" value=" " class="form-control" id="inputName1">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputName2" class="form-label">Account Name</label>
                                            <input name="acname" type="name" value=" " class="form-control" id="inputName2">
                                        </div>
                                        
                                        <div class="col-12">
                                            <label for="inputNumber3" class="form-label">Account Number</label>
                                            <input name="acnumber" type="number" value="" class="form-control" id="inputNumber3">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Account logo : size : 200 x 200 & remove background</label>
                                            <input name="image" class="form-control" id="formFile" type="file">
                                        </div>

                                        <div class="col-12">
                                            <label for="inputNumber5" class="form-label">Swift Code</label>
                                            <input name="swift" type="text" value="" class="form-control" id="inputNumber5">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputNumber6" class="form-label">Routing No</label>
                                            <input name="routno" type="number" value="" class="form-control" id="inputNumber6">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputNumber5" class="form-label">Branch Name</label>
                                            <input name="branch" type="text" value="" class="form-control" id="inputNumber5">
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
                                        <th> Name</th>
                                        <th>Account Name</th>
                                        <th>Account Number</th>
                                        <th> Swift Code </th>
                                        <th>Routing Number</th>
                                        <th>Branch Name</th>
                                        <th>Action</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rows as $key=>$row)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$row->bname}}</td>
                                        <td>{{$row->acname}}</td>
                                        <td>{{$row->acnumber}}</td>
                                        <td>{{$row->swift}}</td>
                                        <td>{{$row->routno}}</td>
                                        <td>{{$row->branch}}</td>
                                        <td>{{$row->status}}</td>
                                        <td>
                                                        <a href="{{url('bankaccount/'.$row->id.'/edit')}}" class="btn btn-icon btn-primary"><i class="fas fa-pen-nib"></i></a>
                                                       

                                                        <form id="delete-form-{{ $row->id }}" action="{{route('bankaccount.destroy',$row->id)}}" style="display: none;" method="POST">
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