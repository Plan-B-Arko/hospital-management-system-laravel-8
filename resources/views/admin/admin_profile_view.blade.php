@extends('layouts.admin_master')

@section('super-admin-content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Admin profile</h6>

                    </div>
                    <div class="col-md-4">
                        <div class="float-end d-none d-md-block">
                            <div class="dropdown">
                                <!-- <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-cog me-2"></i> Settings
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12 ">
                    <div class="card mini-stat bg-dark text-white">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-start mini-stat-img me-4">
                                    <img src="assets/images/services-icon/01.png" alt="">
                                </div>
                                <h5 class="font-size-16 text-uppercase text-white-50">Orders</h5>
                                </i>
                                </h4>
                                <div class="mini-stat-label bg-success">
                                    <p class="mb-0">+ 12%</p>
                                </div>
                            </div>
                            <div class="pt-2">
                                <div class="float-end">
                                    <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                </div>

                                <p class="text-white-50 mb-0 mt-1">Since last month</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
