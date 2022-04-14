@extends('layouts.admin_master')

@section('super-admin-content')

    <style>
        .card {
            box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px !important;
            border: none !important;
        }

    </style>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row my-3">
                @foreach ($listdoctors as $listdoctor)
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body p-2 py-4">
                                <div class="row d-flex justify-content-center text-center">
                                    <img src="{{ asset($listdoctor->image) }}" style="width:100px;" alt=""
                                        class="rounded-circle avatar-lg"><br>
                                    <b> <a href="{{ route('single.doctor', $listdoctor->id) }}"
                                            style="text-decoration: none;color:black;">{{ $listdoctor->first_name1 }}
                                            {{ $listdoctor->last_name1 }}</a>
                                    </b><br>
                                    <p class="text-muted mb-0">Patient Id: <b>{{ $listdoctor->id }}</b></p>
                                    <p class="mb-0">{{ $listdoctor->address }}</p>
                                </div>
                                <hr>
                                <div class="row mx-1">
                                    <h4 class="card-title">
                                        <b>Phone</b>
                                        <span>
                                            {{ $listdoctor->phone }}
                                        </span>
                                    </h4>
                                </div>
                                <div class="row mx-1">
                                    <h4 class="card-title">
                                        <b>Age</b>
                                        <span>
                                            {{ $listdoctor->age }}
                                        </span>
                                    </h4>
                                </div>
                                <div class="row mx-1">
                                    <h4 class="card-title">
                                        <b>Blood Group</b>
                                        <span>
                                            {{ $listdoctor->blood_group }}
                                        </span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
