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

        .modal-body .row .col-md-6,
        .modal-body .row .col-md-12 {
            margin-bottom: 1rem;
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

                    <h4 class="card-title text-center">All Laboratorist
                        <button type="button" class="btn btn-success btn-sm float-end" data-bs-toggle="modal" data-bs-target="#AddEmployeeModal">ADD RECEPTIONIST</button>
                    </h4>

                    <!-- Modal for add patient -->
                    <div class="modal fade bd-example-modal-lg" id="AddEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Laboratorist</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="AddEmployeeFORM" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <ul class="alert alert-warning d-none" id="save_errorList"></ul>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter first name" name="name">
                                                        <span id="error_name" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control"
                                                        placeholder="Enter your email" name="email">
                                                        <span id="error_email" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control"
                                                        placeholder="Enter your password" name="password">
                                                        <span id="error_password" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your address" name="address">
                                                        <span id="error_address" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter phone number" name="phone">
                                                        <span id="error_phone" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gender</label><br>
                                                    <input class="form-check-input gender1" type="radio" name="gender"
                                                            value="male">Male
                                                            <input class="form-check-input gender1" type="radio" name="gender"
                                                             value="female">Female<br>
                                                    <span id="error_gender" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>DOB</label>
                                                    <input type="date" class="form-control"
                                                        placeholder="Enter your birth date" name="dob">
                                                        <span id="error_dob" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your age" name="age">
                                                        <span id="error_age" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Blood Group</label>
                                                    <select name="blood_group" class="form-control" >
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
                                                    <label>Image</label>
                                                    <input type="file" class="form-control" onchange="loadFile(event)"
                                                        placeholder="Enter your image" name="image">
                                                </div>
                                            </div>
                                            <div class="col-md-6 img-show">
                                                <img id="output" width="100" />
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
                    <div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Laboratorist</h5>
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
                                                        placeholder="Enter phone number" name="phone"  id="phone">
                                                        <span id="error_phoneedit" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Sex</label><br>
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

