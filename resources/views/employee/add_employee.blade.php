@extends('layouts.admin_master')

@section('super-admin-content')

    <style>
        .topBar {
            margin-top: 4rem;
        }

        .topBar {
            padding: 2rem;
        }

        .modal-body .row .col-md-6,
        .modal-body .row .col-md-12 {
            margin-bottom: 1rem;
        }

        .errorColor {
            color: red;
        }

        .btn-primary {
            background-color: #428bca;
            border-color: #3b7cb4;
        }

        .card-header{
            border-bottom: 1px solid #3b7cb4!important;
        }

        .card-header a{
            margin-bottom: 1rem;
        }
        .col-3{
            display: flex;
            align-items: center;
        }

        .card-body .row{
            margin-bottom: 1rem;
        }
    </style>

<div class="container-full topBar">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                        <a href="{{ route("all.laboratorist") }}" class="btn btn-primary">
                            <i class="fa fa-list"></i>
                            Laboratorist List
                        </a>
                        <a href="{{ route("view.nurse")}}" class="btn btn-primary">
                            <i class="fa fa-list"></i>
                            Nurse List
                        </a>
                        <a href="{{ route("all.receptionist")}}" class="btn btn-primary">
                            <i class="fa fa-list"></i>
                            Receptionist List
                        </a>
                        <a href="{{ route("view.pharmacist")}}" class="btn btn-primary">
                            <i class="fa fa-list"></i>
                            Pharmacist List
                        </a>
                        <a href="{{ route("all.accountant")}}" class="btn btn-primary">
                            <i class="fa fa-list"></i>
                            Accountant List
                        </a>
                </div>
                <div class="card-body">
                  <form  id="AddEmployee" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <label for="">User Role</label><span class="errorColor"> *</span>
                        </div>
                        <div class="col-6">
                            <select name="user_role" class="form-control">
                                <option selected="" disabled="">Select User Role</option>
                                <option value="Accountant">Accountant</option>
                                <option value="Laboratorist">Laboratorist</option>
                                <option value="Pharmacist">Pharmacist</option>
                                <option value="Nurse">Nurse</option>
                                <option value="Receptionist">Receptionist</option>
                            </select>
                            <span id="error_user_role" class="errorColor"></span>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="">First Name</label><span class="errorColor"> *</span>
                        </div>
                        <div class="col-6">
                            <input type="text" id="fname" name="fname" class="form-control"
                            placeholder="Enter your first name">
                            <span id="error_fname" class="errorColor"></span>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="">Last Name</label><span class="errorColor"> *</span>
                        </div>
                        <div class="col-6">
                            <input type="text" name="lname" class="form-control"
                            placeholder="Enter your last name">
                            <span id="error_lname" class="errorColor"></span>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="">Email Address</label><span class="errorColor"> *</span>
                        </div>
                        <div class="col-6">
                            <input type="email" name="email" class="form-control"
                            placeholder="Enter Email Address">
                             <span id="error_email" class="errorColor"></span>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="">Password</label><span class="errorColor"> *</span>
                        </div>
                        <div class="col-6">
                            <input type="password" class="form-control"
                            placeholder="Enter Password" name="password">
                            <span id="error_password" class="errorColor"></span>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="">Password Confirmation</label><span class="errorColor"> *</span>
                        </div>
                        <div class="col-6">
                            <input type="password" class="form-control"
                            placeholder="Enter Confirmation Password" name="password_confirmation">
                            <span id="error_password_confirmation" class="errorColor"></span>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="">Mobile No</label><span class="errorColor"> *</span>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control"
                            placeholder="Enter Mobile No" name="mobile">
                            <span id="error_mobile" class="errorColor"></span>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="">Gender</label><span class="errorColor"> *</span>
                        </div>
                        <div class="col-6">
                            <input class="form-check-input gender1" type="radio" name="gender"
                                value="male"> Male
                            <input class="form-check-input gender1" type="radio" name="gender"
                                value="female"> Female <br>
                            <span id="error_gender" class="errorColor"></span>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="">Picture</label><span class="errorColor"> *</span>
                        </div>
                        <div class="col-6">
                            <input type="file" class="form-control"
                            placeholder="Enter your image" name="image">
                            <span id="error_image" class="errorColor"></span>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="">Address</label><span class="errorColor"> *</span>
                        </div>
                        <div class="col-6">
                            <textarea type="text" class="form-control"
                            placeholder="Enter your address" name="address"></textarea>
                             <span id="error_address" class="errorColor"></span>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="">Status</label><span class="errorColor"> *</span>
                        </div>
                        <div class="col-6">
                             <input class="form-check-input status1" type="radio" name="status"
                                value="active"> Active
                            <input class="form-check-input status1" type="radio" name="status"
                                value="deactive"> Deactive <br>
                            <span id="error_status" class="errorColor"></span>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <button type ="submit" class="btn btn-info"> Save </button>
                  </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
</div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // for adding patient information
            $(document).on('submit', '#AddEmployee', function(e) {
                e.preventDefault();
                let formData = new FormData($('#AddEmployee')[0]);
                $.ajax({
                    type: "POST",
                    url: "/employe/store",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 400) {
                            console.log(response);
                            $('#error_user_role').text(response.errors.user_role);
                            $('#error_fname').text(response.errors.fname);
                            $('#error_lname').text(response.errors.lname);
                            $('#error_address').text(response.errors.address);
                            $('#error_mobile').text(response.errors.mobile);
                            $('#error_password').text(response.errors.password);
                            $('#error_password_confirmation').text(response.errors.password_confirmation);
                            $('#error_gender').text(response.errors.gender);
                            $('#error_email').text(response.errors.email);
                            $('#error_image').text(response.errors.image);
                            $('#error_status').text(response.errors.status);
                        } else if (response.status == 200) {
                            document.getElementById("AddEmployee").reset();
                            toastr.success(response.message);
                        }
                    }
                });
            });

        });
    </script>
@endsection
