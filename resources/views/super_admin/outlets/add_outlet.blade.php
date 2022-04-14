@extends('layouts.admin_master')

@section('css')
    <style>
        .bt {
            margin-top: 20px;
            padding: 8px 70px;
            font-size: 17px;
            font-weight: bold;
        }

        .col-md-6{
            margin-bottom: 1rem;
        }

    </style>
@endsection


@section('super-admin-content')

        <div class="container-full topBar">
            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Add Outlets</h6>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('store.outlet')}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Outlet Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter outlet name"
                                            name="outlet_name">
                                        <span id="error_fname" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Outlet Email<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" placeholder="Enter your email"
                                            name="outlet_email">
                                        <span id="error_email" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter your phone no"
                                            name="phone">
                                        <span id="error_email" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address<span class="text-danger">*</span></label>
                                        <textarea class="form-control" placeholder="Write address here..." id="floatingTextarea" name="address"></textarea>
                                        <span id="error_fname" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Active Status<span class="text-danger">*</span></label>
                                        <select name="status" class="form-select" aria-label="Default select example">
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <span id="error_doc_dept" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Outlet Icon<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" placeholder="Enter your outlet name"
                                            name="icon">
                                        <span id="error_fname" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" placeholder="Enter your password"
                                            name="password">
                                        <span id="error_email" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirm Password<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" placeholder="Enter your confirm password"
                                            name="password_confirmation">
                                        <span id="error_email" class="errorColor"></span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

@endsection
