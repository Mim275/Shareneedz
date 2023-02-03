@extends('admin.layouts.app')
@section('content')


 <!-- Page Header-->
 <header class="bg-white shadow-sm px-4 py-3 z-index-20">
    <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">Pending Request</h2>
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
                                      
                                        <th>Product Name</th>
                                        <th>Requester name</th>
                                        <th>phone</th>
                                        <th>category</th>
                                        <th>address</th>
                                        <th>Timeline</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($rows as $row )
                                    <tr>
                                      
                                        <td>
                                            {{$row->product_name}}
                                        </td>
                                        <td>
                                            {{$row->name}}
                                        </td>
                                        <td>
                                            {{$row->phone}}
                                        </td>
                                        <td>
                                            {{$row->category}}
                                        </td>
                                        <td>
                                            {{$row->address}}
                                        </td>
                                        <td>
                                            {{$row->end_time}}
                                            {{$row->end_date}}
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