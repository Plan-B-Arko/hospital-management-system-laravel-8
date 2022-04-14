@extends('layouts.admin_master')

@section('super-admin-content')

@section('css')
    <style>
        .PermissionTop{
            font-size: 2rem;
        }
    </style>
@endsection

{{-- modal for add permission --}}
<div class="modal fade" id="AddPermissionModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="AddPermissionForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12" style="padding:1rem 2rem 0rem;">
                        <div class="form-group">
                            <label>Permission Name</label><span class="errorColor"> *</span>
                            <input type="text" class="form-control"
                                placeholder="Enter permission name" id="user_name" name="name">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                    </div>
                </div>
                <div class="text-danger" id='show_user'>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="update"
                        class="btn btn-info btn-rounded">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-full topBar">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center"><span class="PermissionTop">Permissions List</span>
                        <button type="button" class="btn btn-info float-end" data-bs-toggle="modal"
                            data-bs-target="#AddPermissionModal">Add Permission</button>
                    </h2>

                    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline text-center align-middle"
                                    style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                    aria-describedby="datatable-buttons_info">

                                    <thead>
                                        <tr role="row">
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sl=1;
                                        @endphp
                                        @foreach ($permissions as $permission)
                                            <tr>
                                                <td>{{ $sl++ }}</td>
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->created_at }}</td>
                                                <td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
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

        // for adding permission information
        $(document).on('submit', '#AddPermissionForm', function(e) {
            e.preventDefault();
            let formData = new FormData($('#AddPermissionForm')[0]);
            $.ajax({
                type: "POST",
                url: "/permission/store",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 400) {
                        $('#error_name').text(response.errors.name);
                    } else if (response.status == 200) {
                        $('#AddPermissionForm').modal('hide');
                        location.reload();
                        toastr.success(response.message);
                    }
                }
            });
        });
    });
</script>

@endsection
