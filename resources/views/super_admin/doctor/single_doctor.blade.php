@extends('layouts.admin_master')
@section('super-admin-content')
    <style>
        .mail {
            color: #ABB0AC;
        }

        .total {
            border: 2px dotted #EDEDED;
            width: 180px;
            padding: 20px 20px 20px 20px;
        }

        .total h6 {
            color: #ABB0AC;
        }

        h6 .ta {
            font-size: 5px;
        }

        .padding-0 {
            padding-right: 0;
            padding-left: 0;
        }

        .overview ul li {
            list-style: none;
            font-size: 15px;
            color: #8d8d91;
            font-weight: 500;
        }

        .overview1 ul li {
            list-style: none;
            font-size: 15px;
        }

        .card {
            border: none !important;
            margin: 0 auto;
            float: none;
            margin-bottom: 10px;
            box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px !important;
        }

        .namebadge .badg {
            color: #326E2C;
            background-color: #E8FFF3;
            font-size: 12px;
        }

        .nav-tabs .nav-link {
            color: #8d8d91;
            font-weight: 600;
            border: none !important;
        }

        .nav-tabs .nav-link.active {
            color: #009ef7 !important;
            border-bottom: 3px solid #009ef7 !important;
            border-top: none;
            border-left: none;
            border-right: none;
        }

        .nav-tabs {
            border: none;
        }

    </style>
    <div class="container-full topBar">
        <div class="row">
            <div class="col-12 overall">
                <div class="card" style="width: 1000px;">
                    <div class="card-body" style="align-items: center;">
                        <div class="conatiner">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ asset($doctor->image) }}" class="rounded avatar-lg" alt=""
                                        style="width: 150px; height:195px;">
                                </div>
                                <div class="col-md-10">
                                    <div class="namebadge">
                                        <h3><b>{{ $doctor->name }}</b>
                                            @if ($doctor->status == '1')
                                                <span class="badge badg">Available</span>
                                            @else
                                                <span class="badge badg">Not Available</span>
                                            @endif
                                        </h3>
                                    </div>
                                    <div class="mail">
                                        <i class="fas fa-envelope"></i>&nbsp;<span>{{ $doctor->email }}</span>&nbsp;<i
                                            class="fas fa-map-marker-alt"></i>&nbsp;
                                        <span>{{ $doctor->address }}</span>
                                    </div>
                                    <br>
                                    <div class="row no-gutters">
                                        <div class="col-md-4 ">
                                            <div class="total">
                                                <i class="fa-2x fas fa-book-medical"></i>&nbsp; &nbsp;<span><b>3</b></span>
                                                <h6><b>Total Classes</b></h6>
                                            </div>
                                        </div>
                                        <div class="col-md-4 ">
                                            <div class="total">
                                                <i class="fa-2x fas fa-table"
                                                    style="color: rgba(168, 168, 3, 0.87);"></i>&nbsp;
                                                &nbsp;<span><b></b></span>
                                                <h6><b>Admissions</b></h6>
                                            </div>
                                        </div>
                                        <div class="col-md-4 ">
                                            <div class="total">
                                                <i class="fas fa-calendar-alt fa-2x"
                                                    style="color: #7D2877;"></i>&nbsp;&nbsp;
                                                <span><b>{{ $appointments }}</b></span>
                                                <h6 class="ta"><b>Appointments</b></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                            aria-selected="true">Overview</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#Cases" type="button" role="tab" aria-controls="profile"
                                            aria-selected="false">Cases</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#Patients" type="button" role="tab" aria-controls="contact"
                                            aria-selected="false">Patients</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#Appointments" type="button" role="tab" aria-controls="profile"
                                            aria-selected="false">Appointments</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#Schedules" type="button" role="tab" aria-controls="contact"
                                            aria-selected="false">Schedules</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" style="width: 1000px;">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="overview">
                                            <ul>
                                                <li>Designation</li><br>
                                                <li>Phone</li><br>
                                                <li>Doctor Department</li><br>
                                                <li>Qualification</li><br>
                                                <li>Blood Group</li><br>
                                                <li>Date of Birth</li><br>
                                                <li>Specialist</li><br>
                                                <li>Gender</li><br>
                                                <li>Created On</li><br>
                                                <li>Last Update</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @php
                                            $date = $doctor->created_at;
                                            $now = Carbon\Carbon::now()->timezone('CST');
                                            // $totalDuration = $now->diffForHumans($date);
                                            $totalDuration = $date->diffForHumans($now);
                                            
                                            $date1 = $doctor->updated_at;
                                            $now1 = Carbon\Carbon::now()->timezone('CST');
                                            $totalDuration1 = $date1->diffForHumans($now1);
                                        @endphp
                                        <div class="overview1">
                                            <ul>
                                                <li><b>MD</b></li>
                                                <br>
                                                <li><b>{{ $doctor->phone }}</b></li>
                                                <br>
                                                <li><b>{{ $doctor->doc_dept }}</b></li>
                                                <br>
                                                <li><b>Qualification</b></li>
                                                <br>
                                                <li><b>{{ $doctor->blood_group }}</b></li>
                                                <br>
                                                <li><b>{{ $doctor->dob }}</b></li>
                                                <br>
                                                <li><b>Specialist</b></li>
                                                <br>
                                                <li><b>{{ $doctor->sex }}</b></li>
                                                <br>
                                                <li><b>{{ $totalDuration }}</b></li>
                                                <br>
                                                <li><b>{{ $totalDuration1 }}</b></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Cases" role="tabpanel" aria-labelledby="profile-tab">
                                data 1
                            </div>
                            <div class="tab-pane fade" id="Patients" role="tabpanel" aria-labelledby="contact-tab">
                                data 2</div>
                            <div class="tab-pane fade" id="Appointments" role="tabpanel" aria-labelledby="profile-tab">
                                <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="datatable-buttons"
                                                class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline text-center align-middle"
                                                style="border-collapse: collapse; border-spacing: 0px; width: 100%;"
                                                role="grid" aria-describedby="datatable-buttons_info">
                                                <thead>
                                                    <tr>
                                                        <th>Patient</th>
                                                        <th>Doctor</th>
                                                        <th>Doctor Dept</th>
                                                        <th>Date</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>

                                                <tbody class="text-center">
                                                    @foreach ($appointmentsAll as $appointmentsAls)
                                                        <td>{{ $appointmentsAls['patient']['name'] }}</td>
                                                        <td>{{ $appointmentsAls['doctor']['name'] }}</td>
                                                        <td>{{ $appointmentsAls->doctor_dept }}</td>
                                                        <td>{{ $appointmentsAls['date'] }}</td>
                                                        <td>
                                                            <button type="button" value="{{ $appointmentsAls->id }}"
                                                                class="btn btn-success editBtn btn-sm"><i
                                                                    class="fa fa-pencil-alt"></i></button>
                                                            <a href="{{ route('delete.appointment', $appointmentsAls->id) }}"
                                                                class="btn btn-sm btn-danger" id="delete"
                                                                title="delete data">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Schedules" role="tabpanel" aria-labelledby="contact-tab">
                                data 4</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
