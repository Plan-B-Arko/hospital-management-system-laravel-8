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

    </style>
    <div class="container-full topBar">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">Blood Group
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#AddbloodGroup">
                                Blood Group
                            </button>
                        </h4>

                        <!-- AddModal -->
                        <div class="modal fade" id="AddbloodGroup" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New Blood Group</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form>
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Blood Group</label>
                                                        <select name="blood_group" class="blood_group form-control"
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
                                                        <span id="error_blood_group" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Remained Bags</label>
                                                        <input type="text" class="bags form-control"
                                                            placeholder="Enter remained bags" name="bags">
                                                        <span id="error_bags" class="errorColor"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-rounded btn-info add_blood_group"
                                                value="Add Blood Group">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- modal end --}}

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editBloodgroup" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Blood Group</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form>
                                        @csrf
                                        <input type="hidden" id="editBloodgroup" name="editBloodgroup">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Blood Group</label>
                                                        <select name="blood_group" id="blood_group"
                                                            class="blood_group form-control" required="">
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
                                                        <span id="error_blood_group_edit" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Remained Bags</label>
                                                        <input type="text" class="bags form-control"
                                                            placeholder="Enter remained bags" name="bags" id="bags">
                                                        <span id="error_bags_edit" class="errorColor"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit"
                                                class="btn btn-rounded btn-info update_blood_group">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Edit  modal end --}}

                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-buttons"
                                        class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline text-center align-middle"
                                        style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                        aria-describedby="datatable-buttons_info">
                                        <thead>
                                            <tr role="row">

                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">SN</th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;"
                                                    aria-label="Salary: activate to sort column ascending">Blood Group</th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;"
                                                    aria-label="Salary: activate to sort column ascending">Bags</th>


                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                $sn = 1;
                                            @endphp
                                            @foreach ($bloodgroups as $bloodgroup)
                                                <tr>
                                                    <td>
                                                        {{ $sn++ }} </td>
                                                    <td>{{ $bloodgroup->blood_group }}</td>
                                                    <td>{{ $bloodgroup->remained_bags }}</td>
                                                    <td>
                                                        <button type="button" value="{{ $bloodgroup->id }}"
                                                            class="btn btn-success editBtn btn-sm">
                                                            <i class="fa fa-pencil-alt"></i></button>

                                                        <a href="{{ route('bloodgroup.delete', $bloodgroup->id) }}"
                                                            class="btn btn-danger btn-sm" id="delete"><i
                                                                class="fa fa-trash"></i></a>
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
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            // for adding data using ajax
            $(document).on('click', '.add_blood_group', function(e) {

                e.preventDefault();
                $(this).text('Sending..');

                var data = {
                    'blood_group': $('.blood_group').val(),
                    'bags': $('.bags').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/bloodgroup/add",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#error_blood_group').text(response.errors.blood_group);
                            $('#error_bags').text(response.errors.bags);
                            $('.add_blood_group').text('Save');
                        } else {
                            $('#AddbloodGroup').find('input').val('');
                            $('.add_blood_group').text('Save');
                            $('#AddbloodGroup').modal('hide');
                            location.reload();
                            toastr.success(response.message);
                        }
                    }
                });
            });

            // for editing data using ajax
            $(document).on('click', '.editBtn', function() {
                var bloodgroup_id = $(this).val();
                $('#editBloodgroup').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/bloodgroup/edit-bloodgroup/" + bloodgroup_id,
                    success: function(response) {
                        $('#editBloodgroup').val(response.bloodgroup.id);
                        $('#blood_group').val(response.bloodgroup.blood_group);
                        $('#bags').val(response.bloodgroup.remained_bags);
                    }
                })
            });

            // for updating data using ajax
            $(document).on('click', '.update_blood_group', function(e) {
                e.preventDefault();
                $(this).text('Updating..');

                var id = $('#editBloodgroup').val();

                // alert(id);

                var data = {
                    'blood_group': $('#blood_group').val(),
                    'bags': $('#bags').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: "/bloodgroup/update/" + id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#error_bags_edit').text(response.errors.bags);
                            $('.update_blood_group').text('Update');
                        } else {
                            $('#editBloodgroup').find('input').val('');
                            $('.update_blood_group').text('Update');
                            $('#editBloodgroup').modal('hide');
                            location.reload();
                            toastr.success(response.message);
                        }
                    }
                });
            });
        });
    </script>
@endsection
