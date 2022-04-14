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

    </style>
    <div class="container-full topBar">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">Bed Allotment
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#addBedAllotment">
                                    Bed Allotment
                                </button>
                                <button type="button" class="btn btn-info">
                                    <a href="{{ route('bed.status') }}">Bed Status</a>
                                </button>
                            </div>
                        </h4>

                        <!-- AddModal -->
                        <div class="modal fade bd-example-modal-lg" id="addBedAllotment" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Bed Allotment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form>
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Bed Name</label><span class="errorColor"> *</span>
                                                    <select name="bed_name_id" required="" class="bed_name_id form-control"
                                                        aria-invalid="false">
                                                        <option value="" selected="" disabled="">Select Bed Name</option>
                                                        @foreach ($newbednames as $newbedname)
                                                            <option value="{{ $newbedname->id }}">
                                                                {{ $newbedname->bed }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="error_bed_name" class="errorColor"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Patient Name</label><span class="errorColor"> *</span>
                                                    <select name="patient_name_id" required=""
                                                        class="patient_name_id form-control" aria-invalid="false">
                                                        <option value="" selected="" disabled="">Select Patient Name
                                                        </option>
                                                        @foreach ($patients as $patient)
                                                            <option value="{{ $patient->id }}">
                                                                {{ $patient->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="error_patient_name" class="errorColor"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Doctor Name</label><span class="errorColor"> *</span>
                                                    <select name="doctor_name_id" required=""
                                                        class="doctor_name_id form-control" aria-invalid="false">
                                                        <option value="" selected="" disabled="">Select Doctor Name</option>
                                                        @foreach ($doctors as $doctor)
                                                            <option value="{{ $doctor->id }}">
                                                                {{ $doctor->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="error_doctor_name" class="errorColor"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Allotment Time</label><span class="errorColor"> *</span>
                                                    <input type="datetime-local" class="appointment_date_id form-control"
                                                        id="allotment_date_id">
                                                    <span id="error_Allotment" class="errorColor"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Discharged Time</label><span class="errorColor"> *</span>
                                                    <input type="datetime-local" class="discharge_date_id form-control">

                                                    <span id="error_discharge" class="errorColor"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Description<span class="errorColor"> *</span></label>

                                                        <textarea class="description_id form-control"></textarea>

                                                        <span id="error_descriptionnn" class="errorColor"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-info add_bed_allotment">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- modal end --}}

                        <!-- Edit Modal -->
                        <div class="modal fade bd-example-modal-lg" id="EditBedAllotment" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Bed Allotment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form>
                                        @csrf
                                        <input type="hidden" id="bed_assign_id" name="bed_assign_id">
                                        <input type="hidden" id="old_bed_id" name="old_bed_id">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Bed Name</label><span class="errorColor"> *</span>
                                                    <select id="bed_name_id" required="" class="form-control"
                                                        aria-invalid="false">
                                                        <option value="" selected="" disabled="">Select Bed Name</option>
                                                        @foreach ($newbednamesall as $newbednameall)
                                                            <option value="{{ $newbednameall->id }}">
                                                                {{ $newbednameall->bed }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Patient Name</label><span class="errorColor"> *</span>
                                                    <select id="patient_name_id" required="" class="form-control"
                                                        aria-invalid="false">
                                                        <option value="" selected="" disabled="">Select Patient Name
                                                        </option>
                                                        @foreach ($patients as $patient)
                                                            <option value="{{ $patient->id }}">
                                                                {{ $patient->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Doctor Name</label><span class="errorColor"> *</span>
                                                    <select required="" class="form-control" id="doctor_name_id"
                                                        aria-invalid="false">
                                                        <option value="" selected="" disabled="">Select Doctor Name</option>
                                                        @foreach ($doctors as $doctor)
                                                            <option value="{{ $doctor->id }}">
                                                                {{ $doctor->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Allotment Time</label><span class="errorColor"> *</span>
                                                    <input type="datetime-local" class="form-control"
                                                        id="appointment_date_id">
                                                    <span id="error_Allotment_edit" class="errorColor"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Discharged Time</label><span class="errorColor"> *</span>
                                                    <input type="datetime-local" id="discharge_date_id"
                                                        class="form-control" id="discharge_date_id">
                                                    <span id="error_discharge_edit" class="errorColor"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Description<span class="errorColor"> *</span></label>
                                                        <textarea class="description_id form-control"
                                                            id="description_id"></textarea>
                                                        <span id="error_descriptionnn_edit" class="errorColor"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-info update_bed_allotment">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Edit  modal end --}}

                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer leftside">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-buttons"
                                        class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline text-center align-middle"
                                        style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                        aria-describedby="datatable-buttons_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Bed Details</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Patient Details
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Doctor Details
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Allotment</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Discharge</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Description</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($bedallotments as $bedallotment)
                                                <tr>
                                                    <td>
                                                        <b>Bed Name :</b> {{ $bedallotment['bed']['bed'] }} <br>
                                                        <b>Bed Type :</b> {{ $bedallotment['bedTypeName']['bed_types'] }}
                                                    </td>
                                                    <td>
                                                        <b>Id No:</b> {{ $bedallotment['patient']['id'] }} <br>
                                                        <b>Name:</b> {{ $bedallotment['patient']['name'] }} <br>
                                                        <b>Phone:</b> {{ $bedallotment['patient']['phone'] }} <br>
                                                        <b>Email :</b> {{ $bedallotment['patient']['email'] }} <br>
                                                        <b>Gender:</b> {{ $bedallotment['patient']['sex'] }} <br>

                                                    <td>
                                                        <b>Doctor
                                                            Department:</b>{{ $bedallotment['doctor']['doc_dept'] }} <br>

                                                        <b>Doctor Name:</b> {{ $bedallotment['doctor']['name'] }}

                                                        <br>
                                                        <b>Phone:</b> {{ $bedallotment['doctor']['phone'] }} <br>
                                                        <b>email:</b> {{ $bedallotment['doctor']['email'] }} <br>
                                                        <b>Gender:</b> {{ $bedallotment['doctor']['sex'] }} <br>
                                                    </td>
                                                    @php
                                                        
                                                        $time = explode(' ', $bedallotment->allotment_time);
                                                    @endphp
                                                    <td>
                                                        <b>Date:</b>{{ $time[0] }} <br>
                                                        <b>Time:</b>{{ $time[1] }} <br>
                                                    </td>
                                                    @php
                                                        $times = explode(' ', $bedallotment->discharge_time);
                                                    @endphp
                                                    <td>
                                                        <b>Date:</b>{{ $times[0] }} <br>
                                                        <b>Time:</b>{{ $times[1] }} <br>
                                                    </td>

                                                    <td>
                                                        <b>Description:</b>{{ $bedallotment->discription }}
                                                    </td>


                                                    <td class="text-center">
                                                        <button type="button" value="{{ $bedallotment->id }}"
                                                            class="btn btn-success editBtn btn-sm"><i
                                                                class="fa fa-pencil-alt"></i></button>
                                                        <a href="{{ route('allotment.delete', $bedallotment->id) }}"
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

            // for adding data using ajax
            $(document).on('click', '.add_bed_allotment', function(e) {
                e.preventDefault();
                $(this).text('Sending..');

                var data = {
                    'bed_name_id': $('.bed_name_id').val(),
                    'patient_name_id': $('.patient_name_id').val(),
                    'doctor_name_id': $('.doctor_name_id').val(),
                    'appointment_date_id': $('.appointment_date_id').val(),
                    'discharge_date_id': $('.discharge_date_id').val(),
                    'description_id': $('.description_id').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/BedAssign/add",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#error_bed_name').text(response.errors.bed_name_id);
                            $('#error_patient_name').text(response.errors.patient_name_id);
                            $('#error_doctor_name').text(response.errors.doctor_name_id);
                            $('#error_Allotment').text(response.errors.appointment_date_id);
                            $('#error_discharge').text(response.errors.discharge_date_id);
                            $('#error_descriptionnn').text(response.errors.description_id);

                            $('.add_bed_allotment').text('Save');
                        } else {
                            $('#addBedAllotment').find('input').val('');
                            $('.add_bed_allotment').text('Save');
                            $('#addBedAllotment').modal('hide');
                            toastr.success(response.message);
                            location.reload();
                        }
                    }
                });
            });

            // for editing data using ajax
            $(document).on('click', '.editBtn', function() {
                var newbed_id = $(this).val();
                // alert(newbed_id);
                $('#EditBedAllotment').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/BedAssign/edit/" + newbed_id,
                    success: function(response) {
                        // console.log(response.bedassign);
                        $('#old_bed_id').val(response.bedassign.new_bed_id);
                        $('#bed_assign_id').val(response.bedassign.id);
                        $('#bed_name_id').val(response.bedassign.new_bed_id);
                        $('#patient_name_id').val(response.bedassign.patient_id);
                        $('#doctor_name_id').val(response.bedassign.doctor_id);
                        $('#discharge_date_id').val(response.bedassign.allotment_time);
                        $('#description_id').val(response.bedassign.discription);
                    }
                })
            });

            // for updating data using ajax
            $(document).on('click', '.update_bed_allotment', function(e) {
                e.preventDefault();

                $(this).text('Updating..');

                var id = $('#bed_assign_id').val();
                // alert(id);

                var data = {
                    'bed': $('#bed_assign_id').val(),
                    'old_bed': $('#old_bed_id').val(),
                    'bed_name_id': $('#bed_name_id').val(),
                    'patient_name_id': $('#patient_name_id').val(),
                    'doctor_name_id': $('#doctor_name_id').val(),
                    'appointment_date_id': $('#appointment_date_id').val(),
                    'discharge_date_id': $('#discharge_date_id').val(),
                    'description_id': $('#description_id').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/BedAssign/update/" + id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#error_Allotment_edit').text(response.errors
                                .appointment_date_id);
                            $('#error_discharge_edit').text(response.errors.discharge_date_id);
                            $('#error_descriptionnn_edit').text(response.errors.description_id);
                            $('.update_bed_allotment').text('Update');
                        } else {
                            $('#EditBedAllotment').find('input').val('');
                            $('.update_bed_allotment').text('Update');
                            $('#EditBedAllotment').modal('hide');
                            toastr.success(response.message);
                            // fetchstudent();
                            location.reload();
                        }
                    }
                });

            });


        });
    </script>
@endsection
