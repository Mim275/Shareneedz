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
<div class="container">
    
<form action="{{ url('sharepost/'.$posts->id) }}" method="POST" enctype="multipart/form-data">
@method('put')  
@csrf


        <div class="row gy-4 px-3 px-md-5 bg-light">

            <div class="col-lg-6 col-12   input-box">
                <label class="form-label">Donate Type:</label>
                <select name="category" type="selected" class="postcat form-select-md form-select-input" aria-label=".form-select-md example">
                  
                    <option value="food" {{ $posts->category ==  'food' ? 'selected' : '' }}>Foods</option>
                    <option value="book" {{ $posts->category ==  'book' ? 'selected' : '' }}>Books</option>
                    <option value="cloth" {{ $posts->category ==  'cloth' ? 'selected' : '' }}>Clothes</option>
                </select>
            </div>
            <div class="col-lg-6 col-12  input-box">
                <label class="form-label">Type:</label>
                <select name="type" type="selected" class="form-select-md form-select-input" aria-label=".form-select-md example">
                  
                    <option value="individual" {{ $posts->type ==  'individual' ? 'selected' : '' }}>Individual</option>
                    <option class="resto" value="restaurant" {{ $posts->type ==  'restaurant' ? 'selected' : '' }}>Restaurant</option>
                </select>
            </div>

            <div class="col-lg-6 col-12  input-box">
                <label for="inputName4" class="form-label">Sharer Name:</label>
                <input name="name" value="{{$posts->name}}" type="text" class="form-control" id="inputName4">
            </div>
            <div class="col-lg-6 col-12  input-box">
                <label for="inputnumber5" class="form-label">Phone Number:</label>
                <input name="phone" value="{{$posts->phone}}" type="number" class="form-control" id="inputnumber5">
            </div>
            <div class="col-lg-6 col-12  input-box">
                <label for="inputnumber10" class="form-label">Product Name:</label>
                <input name="product" value="{{$posts->product}}" type="text" class="form-control" id="inputnumber10">
            </div>

            <div class="col-12 col-lg-6 input-box">
                <label for="inputAddress" class="form-label">Address:</label>
                <input name="address" value="{{$posts->address}}" type="text" class="form-control" id="inputAddress" placeholder="">
            </div>

            <div class="etime col-lg-6 col-12  input-box">
                <label for="inputDate4" class="form-label">Expiry Date:</label>
                <input name="date"value="{{$posts->date}}" type="date" class="form-control" id="inputDate4">
            </div>
            <div class="etime col-lg-6 col-12  input-box">
                <label for="inputTime4" class="form-label">Expiry time:</label>
                <input name="time" value="{{$posts->time}}" type="time" class="form-control" id="inputTime4">
            </div>

            <div class="col-12 input-box">
                <label for="inputText4" class="form-label">Details:</label>
                <textarea name="details" class="form-control" rows="4" aria-label="With textarea">{{$posts->details}}</textarea>
            </div>

            <div class="col-lg-6 col-12  input-box">
                <label style="font-size: 12px" for="" class="form-label">Image not more then 5MB</label>
                <input name="image_one" onchange="readURL1(this);" type="file" class="form-control" id="">
            </div>
            <div class="col-lg-6 col-12  input-box">
                <label style="font-size: 12px" for="" class="form-label">Image not more then 5MB</label>
                <input name="image_two" onchange="readURL2(this);" type="file" class="form-control" id="">
            </div>

            <div class="col-lg-6 col-12  input-box">
                <input name="image_three" onchange="readURL3(this);" type="file" class="form-control" id="">
            </div>
            <div class="col-lg-6 col-12  input-box">
                <input name="image_four" onchange="readURL4(this);" type="file" class="form-control" id="">
            </div>

            <div class="row mt-5">
                <div class="col-2 offset-2">
                    <img style="width:100px;border:1px solid #E9ECEF;"
                        src="{{ asset('uploads/post/'. $posts->image_one) }}" id="one" alt="">
                </div>
                <div class="col-2 ">
                    <img style="width:100px;border:1px solid #E9ECEF;"
                        src="{{ asset('uploads/post/'. $posts->image_two) }}" id="two" alt="">
                </div>
                <div class="col-2 ">
                    <img style="width:100px;border:1px solid #E9ECEF;"
                        src="{{ asset('uploads/post/'. $posts->image_three) }}" id="three" alt="">
                </div>
                <div class="col-2">
                    <img style="width:100px;border:1px solid #E9ECEF;"
                        src="{{ asset('uploads/post/'. $posts->image_four) }}" id="four" alt="">
                </div>
            </div>

            <div class="col-12 d-flex justify-content-center align-middle py-4 py-lg-5">
                <button type="submit" class="btn btn-dark form-submit-btn">Submit Post</button>
            </div>

        </div>
    </form>
</div>


@endsection