@extends('admin.layouts.app')
@section('content')


 <!-- Page Header-->
 <header class="bg-white shadow-sm px-4 py-3 z-index-20">
    <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">Donation Clarification</h2>
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
                <form action="{{route('donatclarify.store')}}" method="POST">
                                                @csrf
                                            
                                        <div class="">
                                            <p class="fw-bold">BASIC INFO</p>
                                            

                                        </div>

                                        
                                        <div class="col-12">
                                            <label class="form-label"  for="inlineFormSelectPref">User Name</label>
                                                <select name="user_id" class="form-select" id="inlineFormSelectPref">
                                                    

                                                    @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        
                                       
                                        <div class="col-12">
                                            <label for="inputName1" class="form-label">Transaction ID</label>
                                            <input name="tid" type="text" value="" class="form-control" id="inputName1">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputNumber4" class="form-label">Amount</label>
                                            <input name="amount" type="number" value="" class="form-control" id="inputNumber4">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputNumber3" class="form-label">Account Number</label>
                                            <input name="anumber" type="number" value="" class="form-control" id="inputNumber3">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputName5" class="form-label">Payment type</label>
                                            <input name="paytype" type="text" value="" class="form-control" id="inputName5">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputDate4" class="form-label"> Date of payment:</label>
                                            <input name="paydate" type="date" class="form-control" id="inputDate4">
                                        </div>
                                        <div class="userProfile-formBtn mt-3">
                                              
                                                <button class="btn btn-outline-dark" type="submit">GENERATE INVOICE</button>
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
                                        <th>Name</th>
                                        <th> Payment type</th>
                                        <th> Account Number</th>
                                        <th> Transaction ID </th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th> Action </th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rows as $key=>$row)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$row->user->name}}</td>
                                       
                                      
                                        <td>{{$row->paytype}}</td>
                                        <td>{{$row->anumber}}</td>
                                        <td>{{$row->tid}}</td>
                                        <td>{{$row->amount}}</td>
                                        <td>{!! date('d/m/y', strtotime($row['paydate'])) !!}</td>
                                     
                                        <td>
                                                        <a target="_blank" style="padding:10px;" href="{{url('donatclarify',$row->id)}}" class="btn btn-icon btn-primary"><i class="fas fa-eye"></i></a>
                                                       

                                                        <form id="delete-form-{{ $row->id }}" action="{{route('donatclarify.destroy',$row->id)}}" style="display: none;" method="POST">
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