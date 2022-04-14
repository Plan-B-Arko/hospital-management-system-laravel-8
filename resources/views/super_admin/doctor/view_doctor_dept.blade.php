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

    </style>
@endsection


<div class="container-full topBar">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title text-center">All Doctor Dept
                        <button type="button" class="btn btn-success btn-sm float-end" data-bs-toggle="modal"
                            data-bs-target="#AddEmployeeModal">ADD Doctor Dept</button>
                    </h4>

                    <!-- Modal for add doctor department -->
                    <div class="modal fade" id="AddEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Doctor Dept</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="AddEmployeeFORM" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Name</label><span class="errorColor"> *</span>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter first name" name="name">
                                                    <span id="error_name" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter description" name="description">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-rounded btn-info" value="Add">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="editDocDeptModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Doctor Dept</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="EditEmployeeFORM" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="dept_id" class="dept_id">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Name</label><span class="errorColor"> *</span>
                                                    <input type="text" class="name form-control"
                                                        placeholder="Enter first name" name="name">
                                                    <span id="error_nameedit" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <input type="text" class="description form-control"
                                                        placeholder="Enter description" name="description">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-rounded btn-info" value="Update">
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
                                            <th rowspan="1" colspan="1" style="width: 141px;">Description</th>
                                            <th rowspan="1" colspan="1" style="width: 89px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctorDepts as $doctorDept)
                                            <tr>
                                                <td>{{ $doctorDept->id }}</td>
                                                <td>{{ $doctorDept->name }}
                                                </td>
                                                <td>{{ $doctorDept->description }}</td>
                                                <td>
                                                    <button type="button" value="{{ $doctorDept->id }}"
                                                        class="btn btn-success editBtn btn-sm"><i
                                                            class="fa fa-pencil-alt"></i></button>
                                                    <a href="{{ route('delete.doctorDept', $doctorDept->id) }}"
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
        // add doctor department
        $(document).on('submit', '#AddEmployeeFORM', function(e) {
            e.preventDefault();
            let formData = new FormData($('#AddEmployeeFORM')[0]);
            $.ajax({
                type: "POST",
                url: "/doctor/dept/store",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 400) {
                        $('#error_name').text(response.errors.name);
                    } else if (response.status == 200) {
                        $('#AddEmployeeModal').modal('hide');
                        location.reload();
                        toastr.success(response.message);
                    }
                }
            });
        });
        // edit doc department
        $(document).on('click', '.editBtn', function() {
            var dept_id = $(this).val();
            // alert(dept_id);
            $('#editDocDeptModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/doctor/dept/edit/" + dept_id,
                success: function(response) {
                    $('.dept_id').val(response.doctorDepts.id);
                    $('.name').val(response.doctorDepts.name);
                    $('.description').val(response.doctorDepts.description);
                }
            })
        });
        // update doctor department
        $(document).on('submit', '#EditEmployeeFORM', function(e) {
            e.preventDefault();
            let formData = new FormData($('#EditEmployeeFORM')[0]);
            $.ajax({
                type: "POST",
                url: "/doctor/dept/update",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 400) {
                        $('#error_nameedit').text(response.errors.name);
                    } else if (response.status == 200) {
                        $('#editDocDeptModal').modal('hide');
                        location.reload();
                        toastr.success(response.message);
                    }
                }
            });
        });
    });
</script>

@endsection
