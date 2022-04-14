@extends('layouts.admin_master')

@section('css')
    <style>
        .content-wrapper{
            margin: 5rem 2rem;
        }

        .card {
            border: none;
            box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px !important;
            border: none !important;
            padding: 0rem 1rem;
            padding-bottom: 1rem;
        }

        .avatar-sm img, .avatar-sm {
            height: 40px;
            width: 40px;
            margin-right: -10px!important;
        }

        .list-inline, .list-unstyled {
            padding-left: 0;
            list-style: none;
        }

        .AddImg img{
            height: 100px;
        }

        .errorColor{
            color: red;
        }
    </style>
@endsection

@section('super-admin-content')

{{-- modal for add role --}}
<div class="modal fade" id="AddRole" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="AddRoleForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12" style="padding:1rem 2rem 0rem;">
                        <div class="form-group">
                            <label>Role Name</label><span class="errorColor"> *</span>
                            <input type="text" class="form-control"
                                placeholder="Enter first name" id="user_name" name="name">
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

<div class="content-wrapper">
    <div class="content-header">
        <h3>Roles List</h3>
    </div>
    <div class="content-body">
      <div class="row">
        @foreach ($roles as $role)
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                        <span>Total  <b> 4</b> users</span>
                        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="" class="avatar avatar-sm pull-up" data-bs-original-title="Vinnie Mostowy">
                            <img class="rounded-circle" src="{{ asset('/backend') }}/assets/images/users/user-4.jpg" alt="Avatar">
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="" class="avatar avatar-sm pull-up" data-bs-original-title="Allen Rieske">
                            <img class="rounded-circle" src="{{ asset('/backend') }}/assets/images/users/user-3.jpg" alt="Avatar">
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="" class="avatar avatar-sm pull-up" data-bs-original-title="Julee Rossignol">
                            <img class="rounded-circle" src="{{ asset('/backend') }}/assets/images/users/user-2.jpg" alt="Avatar">
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="" class="avatar avatar-sm pull-up" data-bs-original-title="Kaith D'souza">
                            <img class="rounded-circle" src="{{ asset('/backend') }}/assets/images/users/user-1.jpg" alt="Avatar">
                            </li>
                        </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                            <div class="role-heading">
                                <h4 class="fw-bolder">{{ $role->name }}</h4>
                                <a href="javascript:;" class="role-edit-modal" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                                <small class="fw-bolder">Edit Role</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        <div class="col-xl-4 col-lg-6 col-md-6 AddImg">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <img class="" src="{{ asset('/backend') }}/assets/images/hekku.svg" alt="Avatar">
                            </div>
                            <div class="col-7 d-flex justify-content-center align-items-center flex-column">
                                <button type="button" class="btn btn-info mb-2 addBtn" data-bs-toggle="modal"
                                 data-bs-target="#AddRole">ADD NEW ROLE</button>
                                 <p class="mb-0">Add role, if it does not exist</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
      </div>
    </div>
</div>

@endsection

@section('scripts')
  <script>
        $(document).ready(function() {
            // for adding role information
            $(document).on('submit', '#AddRoleForm', function(e) {
                e.preventDefault();
                let formData = new FormData($('#AddRoleForm')[0]);
                $.ajax({
                    type: "POST",
                    url: "/role/store",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 400) {
                            $('#error_name').text(response.errors.name);
                        } else if (response.status == 200) {
                            $('#AddRoleForm').modal('hide');
                            location.reload();
                            toastr.success(response.message);
                        }
                    }
                });
            });
        });
  </script>
@endsection

