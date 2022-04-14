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

        .errorColor {
            color: red;
        }

        .but {
            border: none;
            color: white;
            padding: 5px 9px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .button1 {
            background-color: white;
            color: black;
            border: 2px solid #c4c3c0;
            padding: 6px 8px;
            border-radius: 12%;

        }

        .button1:hover {
            background-color: #c4c3c0;
            color: white;
        }

    </style>
    <div class="container-full topBar">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Time Schedule
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                                Add Time Slot
                            </button>
                        </h4>

                        <!-- AddModal -->
                        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> Add Time Slot</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form>
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label> Slot Name</label>
                                                    <input type="text" class="form-control slot_name"
                                                        placeholder="Enter Slot Name">
                                                    <span id="error_slot_name" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label> Slot Time</label>
                                                        <input type="text" class="form-control slot_time"
                                                            placeholder="08:00-12.00">
                                                        <span id="error_slot_time" class="errorColor"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Status</label><br>
                                                        <input class="form-check-input status" type="radio" name="gender"
                                                            value="Active">Active
                                                        <input class="form-check-input status" type="radio" name="gender"
                                                            value="InActive">InActive<br>
                                                        <span id="error_status" class="errorColor"></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="reset" class="but button1 ">Reset</button>
                                            <button type="button" class="btn btn-primary add_timeslot">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- modal end --}}

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="">
                                        @csrf
                                        <input type="hidden" id="diagnosiscat_id">

                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label> Slot Name</label>
                                                    <input type="text" class="form-control slot_name"
                                                        placeholder="Enter Slot Name" id="slot_name">
                                                    <span id="error_slot_nameedit" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label> Slot Time</label>
                                                        <input type="text" class="form-control " placeholder="08:00-12.00"
                                                            id="slot_time">
                                                        <span id="error_slot_timeedit" class="errorColor"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Status</label><br>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input status1" type="radio"
                                                                name="gender1" id="inlineRadio1" value="Active">
                                                            <label class="form-check-label"
                                                                for="inlineRadio1">Active</label>

                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input status1" type="radio"
                                                                name="gender1" id="inlineRadio2" value="InActive">
                                                            <label class="form-check-label"
                                                                for="inlineRadio2">InActive</label>

                                                        </div>
                                                        <span id="error_statusedit" class="errorColor"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="but button1 ">Reset</button>
                                            <button type="submit"
                                                class="btn btn-rounded btn-info update_schedule_slot">update</button>
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
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Slot Name </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Slot Time</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Status</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($diagnosiscats as $diagnosiscat)
                                                <tr>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $diagnosiscat->slot_name }}</td>
                                                    <td>{{ $diagnosiscat->slot_time }}</td>
                                                    <td>{{ $diagnosiscat->status }}</td>
                                                    <td>
                                                        <button type="button" value="{{ $diagnosiscat->id }}"
                                                            class="btn btn-success editBtn btn-sm">
                                                            <i class="fa fa-pencil-alt"></i></button>
                                                        <a href="{{ route('delete.timeslot', $diagnosiscat->id) }}"
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
                    <!--card-body end-->
                </div>
            </div> <!-- end col -->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            // for adding data using ajax
            $(document).on('click', '.add_timeslot', function(e) {
                e.preventDefault();
                $(this).text('Sending..');
                var data = {
                    'slot_name': $('.slot_name').val(),
                    'slot_time': $('.slot_time').val(),
                    'status': $('.status:checked').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/schedule/store",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#error_slot_name').text(response.errors.slot_name);
                            $('#error_slot_time').text(response.errors.slot_time);
                            $('#error_status').text(response.errors.status);

                            $('.add_timeslot').text('Save');
                        } else {
                            $('#addModal').find('input').val('');
                            $('.add_timeslot').text('Save');
                            $('#addModal').modal('hide');
                            toastr.success(response.message);
                            location.reload();
                        }
                    }
                });
            });

            // // for editing data using ajax
            $(document).on('click', '.editBtn', function() {
                var diagnosiscat_id = $(this).val();
                // alert(newbed_id);

                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/schedule/edit-schedule/" + diagnosiscat_id,
                    success: function(response) {
                        console.log(response.diagnosiscat);
                        $('#diagnosiscat_id').val(response.diagnosiscat.id);
                        $('#slot_name').val(response.diagnosiscat.slot_name);
                        $('#slot_time').val(response.diagnosiscat.slot_time);
                        if (response.diagnosiscat.status == 'Active') {
                            $('#editModal').find(':radio[name=gender1][value="Active"]').prop(
                                'checked', true);
                        } else {
                            $('#editModal').find(':radio[name=gender1][value="InActive"]').prop(
                                'checked', true);
                        }
                    }
                })
            });

            // for updating data using ajax
            $(document).on('click', '.update_schedule_slot', function(e) {
                e.preventDefault();

                $(this).text('Updating..');
                var id = $('#diagnosiscat_id').val();

                var data = {
                    'slot_name': $('#slot_name').val(),
                    'slot_time': $('#slot_time').val(),
                    'status': $('.status1:checked').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/schedule/update/" + id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#error_slot_nameedit').text(response.errors.slot_name);
                            $('#error_slot_timeedit').text(response.errors.slot_time);
                            $('#error_statusedit').text(response.errors.status);
                            $('.update_diagnosis_category').text('Update');
                        } else {
                            $('#editModal').find('input').val('');
                            $('.update_schedule_slot').text('Update');
                            $('#editModal').modal('hide');
                            toastr.success(response.message);
                            location.reload();
                        }
                    }
                });

            });

        });
    </script>
@endsection
