@extends('layouts.admin_master')

@section('super-admin-content')
@section('css')
    <style>
        .iconCenter {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .mini-stat .card-body a {
            text-decoration: none;
            color: black;
        }

    </style>
@endsection
@section('logout')
    <form method="POST" action="{{ route('super_admin.logout') }}">
            @csrf

            <x-jet-dropdown-link href="{{ route('super_admin.logout') }}"
                        onclick="event.preventDefault();
                            this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-jet-dropdown-link>
    </form>
@endsection
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Dashboard</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Welcome to Hospital Management System</li>
                        </ol>
                    </div>
                    <div class="col-md-4">
                        <div class="float-end d-none d-md-block">
                            <div class="dropdown">
                                <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-cog me-2"></i> Settings
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-3 iconCenter">
                                    <i class="fas fa-user-md fa-2x" style="color:#626ed4;"></i>
                                </div>
                                <div class="col-9">
                                    <p> <a href="{{ route('list.doctors') }}"><b>Doctors</b></a> </p>
                                    Total: <b>{{ $doctors }}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-3 iconCenter">
                                    <i class="fas fa-user-injured fa-2x text-success"></i>
                                </div>
                                <div class="col-9">
                                    <p> <a href="{{ route('list.patients') }}"><b>Patients</b></a> </p>
                                    Total: <b>{{ $patients }}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-3 iconCenter">
                                    <i class="fas fa-user-tie fa-2x text-secondary"></i>
                                </div>
                                <div class="col-9">
                                    <p> <a href="{{ route('list.receptionists') }}"><b>Receptionist</b></a> </p>
                                    Total: <b>{{ $receptionist }}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-3 iconCenter">
                                    <i class="fas fa-user-tag fa-2x text-warning"></i>
                                </div>
                                <div class="col-9">
                                    <p> <a href="{{ route('list.pharmacists') }}"><b>Pharmacist</b></a> </p>
                                    Total: <b>{{ $pharmacist }}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-3 iconCenter">
                                    <i class="fas fa-user-nurse fa-2x text-info"></i>
                                </div>
                                <div class="col-9">
                                    <p> <a href="{{ route('list.nurses') }}"><b>Nurse</b></a> </p>
                                    Total: <b>{{ $nurses }}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-3 iconCenter">
                                    <i class="fas fa-user-secret text-danger fa-2x"></i>
                                </div>
                                <div class="col-9">
                                    <p> <a href="{{ route('list.laboratorist') }}"><b>Laboratorist</b></a> </p>
                                    Total: <b>{{ $laboratorist }}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-3 iconCenter">
                                    <i class="fas fa-user-alt fa-2x text-primary"></i>
                                </div>
                                <div class="col-9">
                                    <p> <a href="{{ route('list.accountant') }}"><b>Accountant</b></a> </p>
                                    Total: <b>{{ $accountant }}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-3 iconCenter">
                                    <i class="fas fa-bed fa-2x" style="color:#626ed4;"></i>
                                </div>
                                <div class="col-9">
                                    <p><b>Available Beds</b></p>
                                    Total: <b>{{ $allbed }}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
