@extends('layouts.admin_master')

@section('super-admin-content')
    <style>
        .topBar {
            margin-top: 4rem;
        }

        .topBar {
            padding: 2rem;
        }

        .card-title {
            display: flex;
            justify-content: space-between;
        }

        .leftside table tbody tr td {
            text-align: left;
        }

        .btn-info a {
            text-decoration: none;
            color: white;
        }

        .statusBed .card {
            border: none !important;
            border-radius: 10px !important;
            box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px !important;
        }

        .topstatus {
            display: flex;
            justify-content: space-between;
        }

        .statusright {
            position: absolute;
            right: 2%;
        }

    </style>
    <div class="container-full topBar statusBed">

        <div class="row">
            <div class="col-md-2"></div>

            <div class="col-8">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="topstatus">
                                    <div class="statusleft">
                                        <b>Bed Status</b>&emsp;&emsp;
                                        <i class="fas fa-procedures fa-2x" style="color: rgb(156, 9, 9)"></i>
                                        : Assigned Beds &emsp;&emsp;
                                        <i class="fas fa-bed fa-2x" style="color: green"></i>
                                        : Available Beds
                                    </div>
                                    <div class="statusright">
                                        <button class="btn-info btn-round btn"><a href="{{ url('BedAssign/view') }}"
                                                style="color: white;">Back</a></button>
                                    </div>
                                    <hr>
                                </div>
                                <div class="bodystatus mt-5">
                                    @foreach ($newbedtypes as $newbedtype)
                                        <b>{{ $newbedtype->bed_types }}</b>
                                        <hr>
                                        @php
                                            $id = $newbedtype->id;
                                            $newbeds = App\Models\NewBed::where('new_bed_type_id', $id)->get();
                                        @endphp
                                        <div class="row">
                                            @foreach ($newbeds as $newbed)
                                                <div class="col-2">
                                                    @if ($newbed->status == 0)
                                                        <i class="fas fa-bed fa-2x" style="color: green"></i><br>
                                                        {{ $newbed->bed }} &emsp;&emsp;
                                                    @else
                                                        @php
                                                            $new_bed_id = $newbed->id;
                                                            $newbeds = App\Models\NewBedAllotment::where('new_bed_id', $new_bed_id)->get();
                                                            $patient_id = $newbeds[0]->patient_id;
                                                            
                                                            $patient_name = App\Models\Patient::where('id', $patient_id)->get();
                                                            $patient_name = $patient_name[0]->name;
                                                            // dd($patient_name);
                                                        @endphp
                                                        <i class="fas fa-procedures fa-2x"
                                                            style="color: rgb(156, 9, 9)"></i><br>
                                                        {{ $patient_name }} &emsp;&emsp;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-md-2"></div>
        </div>
    </div>
@endsection
