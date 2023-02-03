@extends('admin.layouts.app')
@section('content')

 <!-- Page Header-->
 <header class="bg-white shadow-sm px-4 py-3 z-index-20">
                    <div class="container-fluid px-0">
                        <h2 class="mb-0 p-1">Dashboard</h2>
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
                                    <!-- Item -->
                                    <div class="col-xl-3 col-sm-6 py-4 border-lg-end border-gray-200">
                                        <div class="d-flex align-items-center">
                                          

                                            <div class="icon flex-shrink-0 bg-orange"><i class="far fa-paper-plane"></i>
                                            </div>
                                            <div class="mx-3">
                                                <h6 class="h4 fw-light text-gray-600 mb-3">Pending<br>Request</h6>
                                                <div class="progress" style="height: 4px">
                                                    <div class="progress-bar bg-violet" role="progressbar"
                                                        style="width: {{count($pendings)}}%; height: 4px;" aria-valuenow="25"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="number"><strong class="text-lg">{{count($pendings)}}</strong></div>
                                        </div>
                                    </div>
                                    <!-- Item -->
                                    <div class="col-xl-3 col-sm-6 py-4 border-lg-end border-gray-200">
                                        <div class="d-flex align-items-center">
                                            <div class="icon flex-shrink-0 bg-violet">
                                                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                                                    <use xlink:href="#user-1"> </use>
                                                </svg>
                                            </div>
                                            <div class="mx-3">
                                                <h6 class="h4 fw-light text-gray-600 mb-3">Total<br>Volunteer</h6>
                                                <div class="progress" style="height: 4px">
                                                    <div class="progress-bar bg-red" role="progressbar"
                                                        style="width: {{count($volunteers)}}%; height: 4px;" aria-valuenow="70"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="number"><strong class="text-lg">{{count($volunteers)}}</strong></div>
                                        </div>
                                    </div>

                                     <!-- Item -->
                                     <div class="col-xl-3 col-sm-6 py-4 border-lg-end border-gray-200">
                                        <div class="d-flex align-items-center">
                                            <div class="icon flex-shrink-0 bg-red">
                                                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                                                    <use xlink:href="#survey-1"> </use>
                                                </svg>
                                            </div>
                                            <div class="mx-3">
                                                <h6 class="h4 fw-light text-gray-600 mb-3">Share<br>Post</h6>
                                                <div class="progress" style="height: 4px">
                                                    <div class="progress-bar bg-red" role="progressbar"
                                                        style="width: {{count($posts)}}%; height: 4px;" aria-valuenow="70"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="number"><strong class="text-lg"> {{count($posts)}}</strong></div>
                                        </div>
                                    </div>
                                    <!-- Item -->
                                    <div class="col-xl-3 col-sm-6 py-4 border-lg-end border-gray-200">
                                        <div class="d-flex align-items-center">
                                            <div class="icon flex-shrink-0 bg-violet">
                                                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                                                    <use xlink:href="#user-1"> </use>
                                                </svg>
                                            </div>
                                            <div class="mx-3">
                                                <h6 class="h4 fw-light text-gray-600 mb-3">Total<br>User</h6>
                                                <div class="progress" style="height: 4px">
                                                    <div class="progress-bar bg-red" role="progressbar"
                                                        style="width:  {{count($users)}}%; height: 4px;" aria-valuenow="70"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="number"><strong class="text-lg">{{count($users)}}</strong></div>
                                        </div>
                                    </div>
                                   

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Dashboard Header Section    -->
                {{-- <section class="pb-0">
                    <div class="container-fluid">
                        <div class="row align-items-stretch">
                            <!-- Statistics -->
                            <div class="col-lg-3 col-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon flex-shrink-0 bg-red"><i class="fas fa-tasks"></i></div>
                                            <div class="ms-3"><strong
                                                    class="text-lg d-block lh-1 mb-1">234</strong><small
                                                    class="text-uppercase text-gray-500 small d-block lh-1">Applications</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon flex-shrink-0 bg-green"><i class="far fa-calendar"></i>
                                            </div>
                                            <div class="ms-3"><strong
                                                    class="text-lg d-block lh-1 mb-1">152</strong><small
                                                    class="text-uppercase text-gray-500 small d-block lh-1">Interviews</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon flex-shrink-0 bg-orange"><i class="far fa-paper-plane"></i>
                                            </div>
                                            <div class="ms-3"><strong
                                                    class="text-lg d-block lh-1 mb-1">147</strong><small
                                                    class="text-uppercase text-gray-500 small d-block lh-1">Forwards</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> --}}

@endsection