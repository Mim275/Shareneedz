@extends('admin.layouts.app')
@section('content')

 <!-- Page Header-->
 <header class="bg-white shadow-sm px-4 py-3 z-index-20">
                    <div class="container-fluid px-0">
                        <h2 class="mb-0 p-1">Admin Setting</h2>
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
                                        <form action="{{route('admin.update.profile',$users->id)}}" method="POST">
                                                @csrf
                                            
                                        <div class="">
                                            <p class="fw-bold">BASIC INFO</p>
                                            

                                        </div>

                                        
                                        <div class="col-12">

                                            <label for="inputName1" class="form-label">Name</label>
                                            <input name="name" type="name" value="{{$users->name}} " class="form-control" id="inputName1">
                                        </div>
                                        
                                        <div class="col-12">
                                            <label for="inputNumber3" class="form-label">Phone</label>
                                            <input name="phone" type="number" value="{{$users->phone}}" class="form-control" id="inputNumber3">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputText7" class="form-label">Address</label>
                                            <textarea name="address" id="inputText7" class="form-control" value="" rows="3" aria-label="With textarea">{{$users->address}}</textarea>
                                        </div>

                                        
                                        <div class="userProfile-formBtn mt-3">
                                               
                                                <button class="btn btn-outline-dark" type="submit">UPDATE</button>
                                            </div>
                                    </form>
                                    <form class="" method="POST" action="{{ route('email.update')}}">
                                                @csrf
                                                @method('PUT')
                                                <div class="col-12">

                                                    <div class="mt-5">
                                                    <p class="fw-bold">UPDATE EMAIL INFO </p>
                                                    </div>
                                                    <label for="inputEmail2" class="form-label">Email</label>
                                                    <input name="email" type="email" value="{{$users->email}}" class="form-control" id="inputEmail2">
                                                </div>
                                                
                                        <div class="userProfile-formBtn mt-3">
                                                
                                                <button class="btn btn-outline-dark" type="submit">UPDATE</button>
                                            </div>
                                    </form>
                                    <form class="" method="POST" action="{{ route('creadintial.update') }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="col-12">

                                                <div class="mt-5">
                                                <p class="fw-bold"> PASSWORD INFO </p>
                                                
                                        <div class="col-12">
                                            <label for="inputPassword4" class="form-label">Current password</label>
                                            <input type="password" class="form-control" id="inputPassword4" name="old_password">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputPassword5" class="form-label">New password</label>
                                            <input type="password" class="form-control" id="inputPassword5" name="password">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputPassword6" class="form-label">Confirm password</label>
                                            <input type="password" class="form-control" id="inputPassword6" name="password_confirmation">
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