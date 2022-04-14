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

        .modal-body .row .col-md-6 {
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

        .errorColor {
            color: red;
        }

    </style>

    <div class="container-full topBar">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">All Doctor
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#Add_Blood_Issue">
                                New Blood Issue
                            </button>
                        </h4>

                        <!-- Modal for add doctor -->
                        <div class="modal fade bd-example-modal-lg" id="Add_Blood_Issue" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Blood Issue</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form>
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Patient</label><span class="errorColor"> *</span>
                                                        <select name="patient_name" class="patient_name form-control"
                                                            required="">
                                                            <option value="" selected="" disabled="">Select Patient Name
                                                            </option>
                                                            @foreach ($patients as $patient)
                                                                <option value="{{ $patient->id }}">{{ $patient->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <span id="error_patient_name" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Doctor</label><span class="errorColor"> *</span>
                                                        <select name="doctor_name" class="doctor_name form-control"
                                                            required="">
                                                            <option value="" selected="" disabled="">Select Doctor Name
                                                            </option>
                                                            @foreach ($doctors as $doctor)
                                                                <option value="{{ $doctor->id }}">{{ $doctor->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <span id="error_doctor_name" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Donor</label><span class="errorColor"> *</span>
                                                        <select name="donor_id" class="donor_id form-control" required="">
                                                            <option value="" selected="" disabled="">Select Donor Name
                                                            </option>
                                                            @foreach ($donors as $donor)
                                                                <option value="{{ $donor->id }}">{{ $donor->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <span id="error_donor_id" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Blood Group</label>
                                                        <select class="blood_donor_group form-control"
                                                            placeholder="Blood group of donor" name="blood_donor_group">
                                                            <option label="Choose one"></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Amount</label><span class="errorColor"> *</span>
                                                        <input type="text" class="amount form-control"
                                                            placeholder="Enter smount" name="amount">
                                                        @error('amount')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <span id="error_amount" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Remarks</label><span class="errorColor"> *</span>
                                                        <input type="text" class="remarks form-control"
                                                            placeholder="Enter remarks" name="remarks">
                                                        @error('remarks')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <span id="error_remarks" class="errorColor"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-rounded btn-info add_blood_issue"
                                                value="Add Issue">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for add Edit doctor -->
                        <div class="modal fade bd-example-modal-lg" id="EditBloodIssue" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Blood Issue</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form>
                                        @csrf
                                        <input type="hidden" id="bloodissue_id" name="bloodissue_id">
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Patient</label>
                                                        <select name="patient_name" id="patient_name_id"
                                                            class="form-control" required="">
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
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Doctor</label>
                                                        <select name="doctor_name" id="doctor_name_id"
                                                            class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select Doctor Name
                                                            </option>
                                                            @foreach ($doctors as $doctor)
                                                                <option value="{{ $doctor->id }}">{{ $doctor->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Donor</label>
                                                        <select name="donor_edit_id" id="donor_name_id"
                                                            class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select Donor Name
                                                            </option>
                                                            @foreach ($donors as $donor)
                                                                <option value="{{ $donor->id }}">{{ $donor->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Blood Group</label>
                                                        <select class="form-control" placeholder="Blood group of donor"
                                                            name="blood_donor_group_edit" id="blood_donor_group_edit_id">
                                                            <option label="Choose one"></option>
                                                        </select>
                                                        <span id="error_blood_donor_group_edit"
                                                            class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Amount</label>
                                                        <input type="text" class="form-control" placeholder="Enter smount"
                                                            name="amount" id="amount">
                                                        <span id="error_amount_edit" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Remarks</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter remarks" name="remarks" id="remarks">
                                                        <span id="error_remarks_edit" class="errorColor"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-rounded btn-info update_blood_issue"
                                                value="Update Issue">
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
                                                <th>Patient</th>
                                                <th>Doctor</th>
                                                <th>Donor</th>
                                                <th>Issue Date</th>
                                                <th>Blood Group</th>
                                                <th>Amount</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody class="text-center">
                                            @foreach ($bloods as $blood)
                                                @php
                                                    $donor_name = $blood['donor']['name'];
                                                @endphp

                                                <tr class="ImgBox">
                                                    <td>
                                                        <div class="row d-flex align-items-center">
                                                            <div class="col-md-6 text-end">
                                                                <img src="{{ asset($blood['patient']['image']) }}" alt=""
                                                                    class="rounded-circle avatar-md">
                                                            </div>
                                                            <div class="col-md-6 text-start">
                                                                <a href=""><b>{{ $blood['patient']['name'] }}</b></a><br>
                                                                {{ $blood['patient']['email'] }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row d-flex align-items-center">
                                                            <div class="col-md-6 text-end">
                                                                <img src="{{ asset($blood['doctor']['image']) }}" alt=""
                                                                    class="rounded-circle avatar-md">
                                                            </div>
                                                            <div class="col-md-6 text-start">
                                                                <a href=""><b>{{ $blood['doctor']['name'] }}</b></a><br>
                                                                {{ $blood['doctor']['email'] }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row d-flex align-items-center">
                                                            <div class="col-md-6">
                                                                <div class="circle">
                                                                    <div class="word">
                                                                        {{ $donor_name[0] }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 text-start">
                                                                <a href=""><b>{{ $blood['donor']['name'] }}</b></a><br>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $blood['created_at'] }}</td>
                                                    <td>{{ $blood['blood_group'] }}</td>
                                                    <td>${{ $blood['amount'] }}</td>
                                                    <td>
                                                        <button type="button" value="{{ $blood->id }}"
                                                            class="btn btn-success editBtn btn-sm"><i
                                                                class="fa fa-pencil-alt"></i></button>
                                                        <a href="{{ route('delete.blood.issue', $blood->id) }}"
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="donor_id"]').on('change', function() {
                var donor_id = $(this).val();
                // alert(donor_id);
                if (donor_id) {
                    $.ajax({
                        url: "{{ url('/blood/donor/group') }}/" + donor_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="blood_donor_group"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="blood_donor_group"]').append(
                                    '<option value="' + value.blood_group +
                                    '">' + value
                                    .blood_group + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="donor_edit_id"]').on('change', function() {
                var donor_edit_id = $(this).val();
                // alert(donor_edit_id);
                if (donor_edit_id) {
                    $.ajax({
                        url: "{{ url('/blood/donor/group/edit') }}/" + donor_edit_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="blood_donor_group_edit"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="blood_donor_group_edit"]').append(
                                    '<option value="' + value.blood_group +
                                    '">' + value
                                    .blood_group + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            // for adding data using ajax
            $(document).on('click', '.add_blood_issue', function(e) {

                e.preventDefault();
                $(this).text('Sending..');
                var data = {
                    'patient_name': $('.patient_name').val(),
                    'doctor_name': $('.doctor_name').val(),
                    'donor_id': $('.donor_id').val(),
                    'blood_donor_group': $('.blood_donor_group').val(),
                    'amount': $('.amount').val(),
                    'remarks': $('.remarks').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/blood/issue/store",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#error_patient_name').text(response.errors.patient_name);
                            $('#error_doctor_name').text(response.errors.doctor_name);
                            $('#error_donor_id').text(response.errors.donor_id);
                            $('#error_amount').text(response.errors.amount);
                            $('#error_remarks').text(response.errors.remarks);
                            $('.add_blood_issue').text('Save');
                        } else {
                            $('#Add_Blood_Issue').find('input').val('');
                            $('.add_blood_issue').text('Save');
                            $('#Add_Blood_Issue').modal('hide');
                            location.reload();
                            toastr.success(response.message);
                        }
                    }
                });
            });

            // for editing data using ajax
            $(document).on('click', '.editBtn', function() {
                var bloodissue_id = $(this).val();
                // alert(bloodissue_id);
                $('#EditBloodIssue').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/blood/issue/edit/" + bloodissue_id,
                    success: function(response) {
                        // console.log(response.blood_issue.blood_group);
                        $('#bloodissue_id').val(response.blood_issue.id);
                        $('#patient_name_id').val(response.blood_issue.patient_id);
                        $('#doctor_name_id').val(response.blood_issue.doctor_id);
                        $('#donor_name_id').val(response.blood_issue.donor_id);
                        $('#blood_donor_group_edit_id').val(response.blood_issue.blood_group);
                        $('#amount').val(response.blood_issue.amount);
                        $('#remarks').val(response.blood_issue.remarks);
                    }
                })
            });

            // for updating data using ajax
            $(document).on('click', '.update_blood_issue', function(e) {
                e.preventDefault();
                $(this).text('Updating..');
                var id = $('#bloodissue_id').val();

                var data = {
                    'patient_name': $('#patient_name_id').val(),
                    'doctor_name': $('#doctor_name_id').val(),
                    'donor_id': $('#donor_name_id').val(),
                    'blood_donor_group': $('#blood_donor_group_edit_id').val(),
                    'amount': $('#amount').val(),
                    'remarks': $('#remarks').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: "/blood/issue/update/" + id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#error_amount_edit').text(response.errors.amount);
                            $('#error_amount_edit').text(response.errors.amount);
                            $('#error_blood_donor_group_edit').text(response.errors
                                .blood_donor_group);
                            $('.update_blood_issue').text('Update');
                        } else {
                            $('#EditBloodIssue').find('input').val('');
                            $('.update_blood_issue').text('Update');
                            $('#EditBloodIssue').modal('hide');
                            location.reload();
                            toastr.success(response.message);
                        }
                    }
                });
            });

        });
    </script>
@endsection
