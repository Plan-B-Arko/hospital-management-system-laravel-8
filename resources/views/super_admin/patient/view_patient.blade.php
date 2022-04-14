@extends('layouts.admin_master')

@section('super-admin-content')

@section('css')
    <style>
        .topBar {
            margin-top: 4rem;
            padding: 2rem;
        }

        .card-title {
            display: flex;
            justify-content: space-between;
        }

        .modal-body .row .col-md-6,
        .modal-body .row .col-md-12 {
            margin-bottom: 1rem;
        }

        .errorColor {
            color: red;
        }

        #blah {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }

    </style>
@endsection


<div class="container-full topBar">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">All Patient
                        <button type="button" class="btn btn-success btn-sm float-end" data-bs-toggle="modal"
                            data-bs-target="#AddEmployeeModal">ADD PATIENT</button>
                    </h4>

                    <!-- Modal for add patient -->
                    <div class="modal fade bd-example-modal-lg" id="AddEmployeeModal" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Patient</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="AddEmployeeFORM" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6 p-5">
                                                <div class="form-group">
                                                    <label>First Name</label><span class="errorColor"> *</span>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter first name" id="user_name" name="fname">
                                                    <span id="error_name" class="errorColor"></span>
                                                </div>
                                                <div class="text-danger" id='show_user'>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Last Name</label><span class="errorColor"> *</span>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter last name" name="lname">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label><span class="errorColor"> *</span>
                                                    <input type="email" class="form-control"
                                                        placeholder="Enter your email" name="email">
                                                    <span id="error_email" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Password</label><span class="errorColor"> *</span>
                                                    <input type="password" class="form-control"
                                                        placeholder="Enter your password" name="password">
                                                    <span id="error_password" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone Number</label><span class="errorColor"> *</span>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your number" id="phone" name="phone">
                                                    <span id="error_phone" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mobile Number</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your mobile" id="mobile" name="mobile">
                                                    <span id="error_mobile" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Blood Group</label><span class="errorColor"> *</span>
                                                    <select name="blood_group" class="form-control">
                                                        <option value="" selected="" disabled="">Select Blood group
                                                        </option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                    </select>
                                                    <span id="error_blood_group" class="errorColor"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gender</label><span class="errorColor"> *</span><br>
                                                    <input class="form-check-input gender1" type="radio" name="gender"
                                                        value="male">Male
                                                    <input class="form-check-input gender1" type="radio" name="gender"
                                                        value="female">Female<br>
                                                    <span id="error_gender" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>DOB</label><span class="errorColor"> *</span>
                                                    <input type="date" class="form-control"
                                                        placeholder="Enter your birth date" name="dob">
                                                    <span id="error_dob" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Age</label><span class="errorColor"> *</span>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your age" name="age">
                                                    <span id="error_age" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label>Image</label>
                                                            <input type="file" class="form-control"
                                                                placeholder="Enter your image" name="image" id="imgInp">
                                                        </div>
                                                        <img class="col-6" id="blah"
                                                            src="{{ asset('backend') }}/assets/images/avatar.png"
                                                            alt="your image" />
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <p><b>Adress Details</b></p>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address 1</label><span class="errorColor"> *</span>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your address" name="address">
                                                    <span id="error_address" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address 2</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your second address" name="address2">
                                                    <span id="error_address2" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your city" name="city">
                                                    <span id="error_city" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Zip</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your zip" name="zip">
                                                    <span id="error_zip" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <hr>
                                            <p><b>Social Details</b></p>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Facebook URL</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your facebook link" name="facebook">
                                                    <span id="error_facebook" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Twitter URL</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your twitter link" name="twitter">
                                                    <span id="error_twitter" class="errorColor"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-rounded btn-info" value="Add Patient">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- Modal for edit patient --}}
                    <div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Patient</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form id="EditEmployeeFORM" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="patient_id" name="patient_id">
                                    <input type="hidden" id="old_image" name="old_image">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter first name" name="name" id="name">
                                                    <span id="error_nameedit" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control"
                                                        placeholder="Enter your email" name="email" id="email">
                                                    <span id="error_emailedit" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your address" name="address" id="address">
                                                    <span id="error_addressedit" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter phone number" name="phone" id="editPhone">
                                                    <span id="error_phoneedit" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gender</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender1"
                                                            id="inlineRadio1" value="male">
                                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                                        <span id="error_maleedit" class="errorColor"></span>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender1"
                                                            id="inlineRadio2" value="female">
                                                        <label class="form-check-label"
                                                            for="inlineRadio2">Female</label>
                                                        <span id="error_femaleedit" class="errorColor"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>DOB</label>
                                                    <input type="date" class="form-control"
                                                        placeholder="Enter your birth date" name="dob" id="dob">
                                                    <span id="error_dobedit" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your age" name="age" id="age">
                                                    <span id="error_ageedit" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Blood Group</label>
                                                    <select name="bloodgrp" id="bloodgrp" class="form-control"
                                                        required="">
                                                        <option value="" selected="" disabled="">Select Blood group
                                                        </option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                    </select>
                                                    <span id="error_blood_groupedit" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" class="form-control"
                                                        placeholder="Enter your image" name="image" id="image"
                                                        onChange="mainThamUrl(this)">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <img src="" id="mainThmb">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" id="update"
                                            class="btn btn-primary btn-rounded">update</button>
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
                                        <tr role="row">
                                            <th rowspan="1" colspan="1" style="width: 50px;">Id</th>
                                            <th rowspan="1" colspan="1" style="width: 120px;">Name</th>
                                            <th rowspan="1" colspan="1" style="width: 141px;">Image</th>
                                            <th rowspan="1" colspan="1" style="width: 117px;">Email</th>
                                            <th rowspan="1" colspan="1" style="width: 53p">Phone</th>
                                            <th rowspan="1" colspan="1" style="width: 105px;">Sex
                                            </th>
                                            <th rowspan="1" colspan="1" style="width: 89px;">Date Of Birth</th>
                                            <th rowspan="1" colspan="1" style="width: 50px;">Age</th>
                                            <th rowspan="1" colspan="1" style="width: 89px;">Blood Group</th>
                                            <th rowspan="1" colspan="1" style="width: 89px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($patients as $patient)
                                            <tr>
                                                <td>{{ $patient->patient_id }}</td>
                                                <td>{{ $patient->name }}
                                                </td>
                                                <td>
                                                    <img src="{{ asset($patient->image) }}" class="rounded avatar-lg"
                                                        alt="" style="width: 80px;">
                                                </td>
                                                <td>{{ $patient->email }}</td>
                                                <td>+{{ $patient->phone }}</td>
                                                <td>{{ $patient->sex }}</td>
                                                <td>{{ $patient->dob }}</td>
                                                <td>{{ $patient->age }}</td>
                                                <td>{{ $patient->blood_group }}</td>
                                                <td>
                                                    <button type="button" value="{{ $patient->id }}"
                                                        class="btn btn-success editBtn btn-sm"><i
                                                            class="fa fa-pencil-alt"></i></button>
                                                    <a href="{{ route('delete.patient', $patient->id) }}"
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
        </div>
    </div> <!-- end col -->
</div>
</div>
@endsection

@section('scripts')

<script>
    $(document).ready(function() {

        // for adding patient information
        $(document).on('submit', '#AddEmployeeFORM', function(e) {
            e.preventDefault();
            let formData = new FormData($('#AddEmployeeFORM')[0]);
            $.ajax({
                type: "POST",
                url: "/patient/store",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 400) {
                        $('#error_name').text(response.errors.name);
                        $('#error_email').text(response.errors.email);
                        $('#error_password').text(response.errors.password);
                        $('#error_address').text(response.errors.address);
                        $('#error_phone').text(response.errors.phone);
                        $('#error_gender').text(response.errors.gender);
                        $('#error_dob').text(response.errors.dob);
                        $('#error_age').text(response.errors.age);
                        $('#error_blood_group').text(response.errors.blood_group);
                    } else if (response.status == 200) {
                        $('#AddEmployeeModal').modal('hide');
                        location.reload();
                        toastr.success(response.message);
                    }
                }
            });
        });

        // for edit patient information
        $(document).on('click', '.editBtn', function() {
            var patient_id = $(this).val();
            // alert(patient_id);
            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/patient/edit-patient/" + patient_id,
                success: function(response) {
                    $('#patient_id').val(response.patient.id);
                    $('#name').val(response.patient.name);
                    $('#email').val(response.patient.email);
                    $('#old_image').val(response.patient.image);
                    $('#address').val(response.patient.address);
                    $('#editPhone').val(response.patient.phone);
                    $('#gender').val(response.patient.sex);
                    $('#dob').val(response.patient.dob);
                    $('#age').val(response.patient.age);
                    $('#bloodgrp').val(response.patient.blood_group);
                    if (response.patient.sex == 'male') {
                        $('#editModal').find(':radio[name=gender1][value="male"]').prop(
                            'checked', true);
                    } else {
                        $('#editModal').find(':radio[name=gender1][value="female"]').prop(
                            'checked', true);
                    }
                }
            })
        });

        // for updating patient information
        $(document).on('submit', '#EditEmployeeFORM', function(e) {
            e.preventDefault();
            let formData = new FormData($('#EditEmployeeFORM')[0]);
            $.ajax({
                type: "POST",
                url: "/patient/update",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 400) {
                        $('#error_nameedit').text(response.errors.name);
                        $('#error_emailedit').text(response.errors.email);
                        $('#error_addressedit').text(response.errors.address);
                        $('#error_phoneedit').text(response.errors.phone);
                        $('#error_genderedit').text(response.errors.gender1);
                        $('#error_dobedit').text(response.errors.dob);
                        $('#error_ageedit').text(response.errors.age);
                        $('#error_blood_groupedit').text(response.errors.bloodgrp);
                    } else if (response.status == 200) {
                        $('#editModal').modal('hide');
                        location.reload();
                        toastr.success(response.message);
                    }
                }
            });
        });
    });
</script>

<script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {

            blah.src = URL.createObjectURL(file)
        }
    }
</script>



@endsection
