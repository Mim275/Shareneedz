@extends('admin.layouts.app')
@section('content')


 <!-- Page Header-->
 <header class="bg-white shadow-sm px-4 py-3 z-index-20">
    <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">Volunteer List</h2>
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
                                    
                            <table id="table_id1" class="display">
                                <thead>
                                    <tr>
                                        <th>image</th>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>phone</th>
                                        <th>address</th>
                                        <th>email</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($rows as $key=>$row )
                                    <tr>
                                        <td>
                                            <img style="width:150px" src="{{url('uploads/profile/'.$row->image)}}" alt="user profile">
                                        </td>
                                        <td>
                                            {{$row->id}}
                                        </td>
                                        <td>
                                            {{$row->name}}
                                        </td>
                                        <td>
                                            {{$row->phone}}
                                        </td>
                                        <td>
                                            {{$row->address}}
                                        </td>
                                        <td>
                                            {{$row->email}}
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