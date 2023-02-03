@extends('admin.layouts.app')
@section('content')


 <!-- Page Header-->
 <header class="bg-white shadow-sm px-4 py-3 z-index-20">
    <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">Admin Setting</h2>
    </div>
</header>

<!-- Dashboard Counts Section-->
<section class="pb-0">
    <div class="container-fluid">
        <div class="card mb-0">
            <div class="card-body">
                <div class="row gx-5 bg-white">
                <form action="" method="POST">
                                                @csrf
                                            
                                        <div class="">
                                            <p class="fw-bold">BASIC INFO</p>
                                            
                                        
                                        </div>

                                        
                                        <div class="col-12">

                                            <label for="inputName1" class="form-label">Name</label>
                                            <input name="name" type="name" value=" " class="form-control" id="inputName1">
                                        </div>
                                        
                                        <div class="col-12">
                                            <label for="inputNumber3" class="form-label">Phone</label>
                                            <input name="phone" type="number" value="" class="form-control" id="inputNumber3">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputText7" class="form-label">Address</label>
                                            <textarea name="address" id="inputText7" class="form-control" value="" rows="3" aria-label="With textarea"></textarea>
                                        </div>

                                        
                                        <div class="userProfile-formBtn mt-3">
                                                <button class="btn btn-outline-dark me-3" type="reset">CANCEL</button>
                                                <button class="btn btn-outline-dark" type="submit">UPDATE</button>
                                            </div>
                                    </form> 
                                    
                                    <table id="table_id1" class="display">
                                <thead>
                                    <tr>
                                        <th>Column 1</th>
                                        <th>Column 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Row 1 Data 1</td>
                                        <td>Row 1 Data 2</td>
                                    </tr>
                                    <tr>
                                        <td>Row 2 Data 1</td>
                                        <td>Row 2 Data 2</td>
                                    </tr>
                                </tbody>
                            </table> 
                              
                </div>
            </div>
        </div>
    </div>
</section>


@endsection



@extends('admin.layouts.app')
@section('content')


 <!-- Page Header-->
 <header class="bg-white shadow-sm px-4 py-3 z-index-20">
    <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">Admin Setting</h2>
    </div>
</header>

<!-- Dashboard Counts Section-->
<section class="pb-0">
    <div class="container-fluid">
        <div class="card mb-0">
            <div class="card-body">
                <div class="row gx-5 bg-white"> 
                                    
                            <table id="table_id1" class="display">
                                <thead>
                                    <tr>
                                        <th>Column 1</th>
                                        <th>Column 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Row 1 Data 1</td>
                                        <td>Row 1 Data 2</td>
                                    </tr>
                                    <tr>
                                        <td>Row 2 Data 1</td>
                                        <td>Row 2 Data 2</td>
                                    </tr>
                                </tbody>
                            </table> 
                              
                </div>
            </div>
        </div>
    </div>
</section>


@endsection