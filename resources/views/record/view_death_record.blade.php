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

        .modal-body .row .col-md-4 {
            margin-bottom: 1rem;
        }

        .ImgBox img {
            border-radius: 50%;
        }

        .circle {
            height: 80px;
            width: 80px;
            display: block;
            background-color: darkseagreen;
            border-radius: 80px;
            position: relative;
        }

        .word {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .modal-body select,
        .modal-body input {
            border: none;
            background: #f5f8fa !important;
            border-radius: 5%;
        }

        .addapoint {
            margin-left: 1rem;
        }

        .card-title i {
            color: rgb(70, 75, 104);
        }

    </style>

    <div class="container-full topBar">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">All Death Record
                            <!-- Button trigger modal -->

                            <button type="button" class="btn btn-success AddDeathRecord" data-bs-toggle="modal"
                                data-bs-target="#AddDeathRecord">
                                New Death Record
                            </button>

                        </h4>

                        <!-- Modal for add doctor -->
                        <div class="modal fade bd-example-modal-lg" id="AddDeathRecord" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Death Record</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('store.death_record') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Patient</label>
                                                        <select name="patient_name_id" class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select Patient Name
                                                            </option>
                                                            @foreach ($patients as $patient)
                                                                <option value="{{ $patient->id }}">{{ $patient->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Death Date</label>
                                                        <input type="dateTime-local" class="form-control"
                                                            placeholder="Enter death date & time" name="death_date">
                                                        @error('death_date')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Guardian Name</label>
                                                        <input type="text" class="form-control" name="guardian_name"
                                                            placeholder="Enter guardian_name">
                                                        @error('guardian_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Attachment</label>
                                                        <input type="file" class="form-control" name="attachment">
                                                        @error('attachment')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nid Number</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter nid_number" name="nid_number">
                                                        @error('nid_number')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Present Address</label>
                                                        <input type="text" class="form-control" name="present_address"
                                                            placeholder="Enter present_address">
                                                        @error('present_address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Parmanent Address</label>
                                                        <input type="text" class="form-control" name="parmanent_address"
                                                            placeholder="Enter parmanent_address">
                                                        @error('parmanent_address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Report</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter mother report" name="report">
                                                        @error('report')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-rounded btn-info" value="Add Death Record">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for add Edit doctor -->
                        <div class="modal fade bd-example-modal-lg" id="EditDeathRecord" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Death Record</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('update.death_record') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" id="death_record_id" name="death_record_id">
                                        <input type="hidden" id="old_image" name="old_image">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Patient</label>
                                                        <select name="patient_name_id" class="form-control" required=""
                                                            id="patient_name_id">
                                                            <option value="" selected="" disabled="">Select Patient Name
                                                            </option>
                                                            @foreach ($patients as $patient)
                                                                <option value="{{ $patient->id }}">
                                                                    {{ $patient->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Death Date</label>
                                                        <input type="dateTime-local" class="form-control"
                                                            placeholder="Enter death date & time" name="death_date"
                                                            id="death_date_id">
                                                        @error('death_date')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Guardian Name</label>
                                                        <input type="text" class="form-control" name="guardian_name"
                                                            placeholder="Enter guardian_name" id="guardian_name_id">
                                                        @error('guardian_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Attachment</label>
                                                        <input type="file" class="form-control" name="attachment"
                                                            id="attachment_id">
                                                        @error('attachment')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nid Number</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter nid_number" name="nid_number"
                                                            id="nid_number_id">
                                                        @error('nid_number')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Present Address</label>
                                                        <input type="text" class="form-control" name="present_address"
                                                            placeholder="Enter present_address" id="present_address_id">
                                                        @error('present_address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Parmanent Address</label>
                                                        <input type="text" class="form-control" name="parmanent_address"
                                                            placeholder="Enter parmanent_address" id="parmanent_address_id">
                                                        @error('parmanent_address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Report</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter mother report" name="report" id="report_id">
                                                        @error('report')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-rounded btn-info"
                                                value="Update Death Record">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-buttons"
                                        class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline text-center align-middle"
                                        style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                        aria-describedby="datatable-buttons_info">
                                        <thead>
                                            <tr>
                                                <th>Patient Name</th>
                                                <th>Death Date</th>
                                                <th>Guardian Name</th>
                                                <th>Attachment</th>
                                                <th>Nid Number</th>
                                                <th>Present Address</th>
                                                <th>Parmanent Address</th>
                                                <th>Report</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($deaths as $death)
                                                <tr>
                                                    <td>{{ $death['patient']['name'] }}</td>
                                                    <td>{{ $death->death_date }}</td>
                                                    <td>{{ $death->guardian_name }}</td>
                                                    <td><img src="{{ asset($death->attachment) }}" alt=""
                                                            class="rounded avatar-lg"></td>
                                                    <td>{{ $death->nid_number }}</td>
                                                    <td>{{ $death->present_address }}</td>
                                                    <td>{{ $death->permanent_address }}</td>
                                                    <td>{{ $death->report }}</td>
                                                    <td>
                                                        <button type="button" value="{{ $death->id }}"
                                                            class="btn btn-success editBtn btn-sm"><i
                                                                class="fa fa-pencil-alt"></i></button>
                                                        <a href="{{ route('delete.death_record', $death->id) }}"
                                                            class="btn btn-sm btn-danger" id="delete" title="delete data">
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
                </div>
            </div> <!-- end col -->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.editBtn', function() {
                var death_record_id = $(this).val();
                // alert(death_record_id);
                $('#EditDeathRecord').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/Record/death/edit/" + death_record_id,
                    success: function(response) {
                        // console.log(response.death_record);
                        $('#death_record_id').val(response.death_record.id);
                        $('#patient_name_id').val(response.death_record.patient_name_id);
                        $('#death_date_id').val(response.death_record.death_date);
                        $('#guardian_name_id').val(response.death_record.guardian_name);
                        $('#old_image').val(response.death_record.attachment);
                        $('#nid_number_id').val(response.death_record.nid_number);
                        $('#present_address_id').val(response.death_record.present_address);
                        $('#parmanent_address_id').val(response.death_record.permanent_address);
                        $('#report_id').val(response.death_record.report);
                    }
                })
            });
        });
    </script>
@endsection
