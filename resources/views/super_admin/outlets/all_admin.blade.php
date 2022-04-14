@extends('layouts.admin_master')

@section('super-admin-content')

@section('css')
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
                    <h4 class="card-title text-center">All Admins
                        <button type="button" class="btn btn-success btn-sm float-end" data-bs-toggle="modal"
                            data-bs-target="#AddAdminModal">ADD ADMINS</button>
                    </h4>

                     <!-- Modal for add patient -->
                    <div class="modal fade bd-example-modal-lg" id="AddAdminModal" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Admins</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="addAdminFORM" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Outlet Name</label><span class="errorColor"> *</span>
                                                    <select name="outlet_id" id="outlet_id" class="form-control"
                                                        required="">
                                                        <option value="" selected="" disabled="">Select a outlet
                                                        </option>
                                                        @foreach ($outlets as $outlet)
                                                            <option value="{{ $outlet->id }}">{{ $outlet->outlet_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="error_name" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Admin Name</label><span class="errorColor"> *</span>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter name" id="admin_name" name="admin_name">
                                                    <span id="error_name" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Admin Email</label><span class="errorColor"> *</span>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter email" id="admin_email" name="admin_email">
                                                    <span id="error_name" class="errorColor"></span>
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
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-rounded btn-info" value="Add Admin">
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
                                            <th rowspan="1" colspan="1" style="width: 50px;">Sl</th>
                                            <th rowspan="1" colspan="1" style="width: 50px;">Outlet Name</th>
                                            <th rowspan="1" colspan="1" style="width: 120px;">Outlet Code</th>
                                            <th rowspan="1" colspan="1" style="width: 141px;">Admin Name</th>
                                            <th rowspan="1" colspan="1" style="width: 117px;">Admin Email</th>
                                            <th rowspan="1" colspan="1" style="width: 89px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sn=1;
                                        @endphp
                                        @foreach($admins as $admin)
                                        <tr>
                                            <td>{{ $sn++ }}</td>
                                            <td>{{ $admin['outlet']['outlet_name'] }}</td>
                                            <td>{{ $admin['outlet']['outlet_code'] }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>
                                                <a href="" class="btn btn-danger btn-sm">Delete</a>
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
@endsection

@section('scripts')

<script>
        // for adding admins information
        $(document).on('submit', '#addAdminFORM', function(e) {
            e.preventDefault();
            let formData = new FormData($('#addAdminFORM')[0]);
            $.ajax({
                type: "POST",
                url: "/outlet/admin/store",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 400) {
                        $('#error_name').text(response.errors.name);
                        $('#error_email').text(response.errors.email);
                        $('#error_password').text(response.errors.password);
                    } else if (response.status == 200) {
                        $('#addAdminFORM').modal('hide');
                        location.reload();
                        toastr.success(response.message);
                    }
                }
            });
        });
</script>

@endsection

