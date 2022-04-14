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

        .topCard{
            display: flex;
            justify-content: end;
        }

    </style>

<div class="container-full topBar">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="mb-2 topCard">
                        <a href="{{ route('add.employe') }}" class="btn btn-success"> <i class="fa fa-plus"> Add Employee</i></a>
                    </div>

                    {{-- Modal for edit --}}
                    <div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit accountant</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form id="EditEmployeeFORM" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" id="accountant_id" name="accountant_id">
                                    <input type="hidden" id="old_image" name="old_image">
                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>User Role</label>
                                                    <select name="user_role" class="form-control" id="user_role">
                                                        <option selected="" disabled="">Select User Role</option>
                                                        <option value="Accountant">Accountant</option>
                                                        <option value="accountant">accountant</option>
                                                        <option value="Pharmacist">Pharmacist</option>
                                                        <option value="Nurse">Nurse</option>
                                                        <option value="Receptionist">Receptionist</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                    placeholder="Enter your name" id="name">
                                                    <span id="error_name" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control"
                                                        placeholder="Enter your email" name="email" id="email">
                                                        <span id="error_email" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                      <input type="text" class="form-control"
                                                        placeholder="Enter Mobile No" name="mobile" id="phone">
                                                        <span id="error_mobile" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Sex</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender1"
                                                            id="inlineRadio1" value="male">
                                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender1"
                                                            id="inlineRadio2" value="female">
                                                        <label class="form-check-label"
                                                            for="inlineRadio2">Female</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" class="form-control"
                                                        placeholder="Enter your image" name="image" id="image">
                                                        <span id="error_image" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                     <textarea type="text" class="form-control"
                                                        placeholder="Enter your address" name="address" id="address"></textarea>
                                                        <span id="error_address" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Status</label><br>
                                                    <input class="form-check-input status1" type="radio" name="status"
                                                        value="active"> Active
                                                    <input class="form-check-input status1" type="radio" name="status"
                                                        value="deactive"> Deactive <br>
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
                                                <td>SL</td>
                                                <td>Name</td>
                                                <td>Image</td>
                                                <td>Email</td>
                                                <td>Mobile</td>
                                                <td>Gender</td>
                                                <td>User Role</td>
                                                <td>Created Date</td>
                                                <td>Status</td>
                                                <td>Actions</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $sn=1;
                                            @endphp
                                            @foreach ($accountants as $accountant)
                                                <tr>
                                                    <td>{{ $sn++ }}</td>
                                                    <td>{{ $accountant->name }}
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset($accountant->image) }}" class="rounded avatar-lg"
                                                        alt="" style="width: 80px;">
                                                    </td>
                                                    <td>{{ $accountant->email }}</td>
                                                    <td>{{ $accountant->mobile }}</td>
                                                    <td>{{ $accountant->gender }}</td>
                                                    <td>{{ $accountant->user_role }}</td>
                                                    <td>{{ $accountant->created_at }}</td>
                                                    <td>{{ $accountant->status }}</td>
                                                    <td>
                                                        <button type="button" value="{{ $accountant->id }}"
                                                            class="btn btn-success editBtn btn-sm"><i
                                                                class="fa fa-pencil-alt"></i></button>
                                                        <a href="{{ route('accountant.delete', $accountant->id) }}"
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
            $(document).on('click', '.editBtn', function() {
                var accountant_id = $(this).val();
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/accountant/edit-accountant/" + accountant_id,
                    success: function(response) {
                        $('#accountant_id').val(response.accountant.id);
                        $('#old_image').val(response.accountant.image);
                        $('#user_role').val(response.accountant.user_role);
                        $('#name').val(response.accountant.name);
                        $('#email').val(response.accountant.email);
                        $('#phone').val(response.accountant.mobile);
                        $('#address').val(response.accountant.address);
                        $('#status').val(response.accountant.status);
                        if (response.accountant.gender == 'male') {
                            $('#editModal').find(':radio[name=gender1][value="male"]').prop(
                                'checked', true);
                        } else {
                            $('#editModal').find(':radio[name=gender1][value="female"]').prop(
                                'checked', true);
                        }
                        if (response.accountant.status == 'active') {
                            $('#editModal').find(':radio[name=status][value="active"]').prop(
                                'checked', true);
                        } else {
                            $('#editModal').find(':radio[name=status][value="deactive"]').prop(
                                'checked', true);
                        }
                    }
                })
            });

            // for update
            $(document).on('submit', '#EditEmployeeFORM', function (e) {
                 e.preventDefault();
                 let formData=new FormData($('#EditEmployeeFORM')[0]);
                 $.ajax({
                    type:"POST",
                    url: "/accountant/update",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                    if (response.status == 400)
                    {
                        $('#error_user_role').text(response.errors.user_role);
                        $('#error_name').text(response.errors.name);
                        $('#error_address').text(response.errors.address);
                        $('#error_mobile').text(response.errors.mobile);
                        $('#error_gender1').text(response.errors.gender1);
                        $('#error_email').text(response.errors.email);
                        $('#error_status').text(response.errors.status);
                    }
                    else if(response.status ==200)
                    {
                        $('#editModal').modal('hide');
                        location.reload();
                        toastr.success(response.message);
                    }
                  }
                });
            });
        });
    </script>
@endsection
