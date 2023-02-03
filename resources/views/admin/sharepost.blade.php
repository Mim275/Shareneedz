@extends('admin.layouts.app')
@section('content')


 <!-- Page Header-->
 <header class="bg-white shadow-sm px-4 py-3 z-index-20">
    <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">Share Post List</h2>
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
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Name</th>
                                        <th>phone</th>
                                        <th>address</th>
                                        <th>Category</th>
                                        <th>Timeline</th>
                                        <th> Action </th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rows as $key=>$row)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$row->product}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->phone}}</td>
                                        <td>{{$row->address}}</td>
                                        <td>{{$row->category}},{{$row->type}}</td>
                                        <td>
                                            {{$row->date}}
                                        </td>

                                     
                                        <td>
                                                        <a href="{{url('sharepost/'.$row->id.'/edit')}}" class="btn btn-icon btn-primary"><i class="fas fa-pen-nib"></i></a>
                                                       

                                                        <form id="delete-form-{{ $row->id }}" action="{{route('sharepost.destroy',$row->id)}}" style="display: none;" method="POST">
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