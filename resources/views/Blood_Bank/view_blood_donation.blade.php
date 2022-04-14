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

    </style>
    <div class="container-full topBar">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">Blood Donation
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#AddblooDonation">
                                New Blood Donation
                            </button>
                        </h4>

                        <!-- AddModal -->
                        <div class="modal fade" id="AddblooDonation" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New Blood Donation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form>
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <select name="donor_id" class="donor_id form-control">
                                                            <option value="" selected="" disabled="">Select Donor Name
                                                            </option>
                                                            @foreach ($blooddonors as $blooddonor)
                                                                <option value="{{ $blooddonor->id }}">
                                                                    {{ $blooddonor->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span id="error_donor_id" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Blood Bags</label>
                                                        <input type="text" class="bags form-control"
                                                            placeholder="Enter your age" name="bags">
                                                        <span id="error_bags" class="errorColor"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-rounded btn-info add_blood_donation"
                                                value="Add Blood Donation">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- modal end --}}

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editBloodDonation" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Blood Donation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form>
                                        @csrf
                                        <input type="hidden" id="blooddonation_id" name="blooddonation_id">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Blood Donor Name</label>
                                                        <select name="donor_id" id="donor_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Donor Name
                                                            </option>
                                                            @foreach ($blooddonors as $blooddonor)
                                                                <option value="{{ $blooddonor->id }}">
                                                                    {{ $blooddonor->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Blood Bags</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your bags" name="bags" id="bags">
                                                        <span id="error_bags_edit" class="errorColor"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit"
                                                class="btn btn-rounded btn-info update_blood_donation">update</button>
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
                                                    aria-label="Name: activate to sort column descending">Donor Name</th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Bags</th>


                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($blooddonations as $blooddonation)
                                                <tr>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $blooddonation['donor']['name'] }} </td>
                                                    <td>{{ $blooddonation->bags }}</td>
                                                    <td>
                                                        <button type="button" value="{{ $blooddonation->id }}"
                                                            class="btn btn-success editBtn btn-sm">
                                                            <i class="fa fa-pencil-alt"></i></button>

                                                        <a href="{{ route('blooddonation.delete', $blooddonation->id) }}"
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
            $(document).on('click', '.add_blood_donation', function(e) {

                e.preventDefault();
                $(this).text('Sending..');

                var data = {
                    'donor_id': $('.donor_id').val(),
                    'bags': $('.bags').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/bloodDonation/add",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#error_donor_id').text(response.errors.donor_id);
                            $('#error_bags').text(response.errors.bags);
                            $('.add_blood_donation').text('Save');
                        } else {
                            $('#AddblooDonation').find('input').val('');
                            $('.add_blood_donation').text('Save');
                            $('#AddblooDonation').modal('hide');
                            location.reload();
                            toastr.success(response.message);
                        }
                    }
                });
            });

            // for editing data using ajax
            $(document).on('click', '.editBtn', function() {
                var blooddonation_id = $(this).val();
                $('#editBloodDonation').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/bloodDonation/edit-blooddonation/" + blooddonation_id,
                    success: function(response) {
                        $('#blooddonation_id').val(response.blooddonation.id);
                        $('#donor_id').val(response.blooddonation.donor_id);
                        $('#bags').val(response.blooddonation.bags);
                    }
                })
            });

            // for updating data using ajax
            $(document).on('click', '.update_blood_donation', function(e) {
                e.preventDefault();
                $(this).text('Updating..');

                var id = $('#blooddonation_id').val();

                var data = {
                    'donor_id': $('#donor_id').val(),
                    'bags': $('#bags').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: "/bloodDonation/update/" + id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#error_bags_edit').text(response.errors.bags);
                            $('.update_blood_donation').text('Update');
                        } else {
                            $('#editBloodDonation').find('input').val('');
                            $('.update_blood_donation').text('Update');
                            $('#editBloodDonation').modal('hide');
                            location.reload();
                            toastr.success(response.message);
                        }
                    }
                });
            });
        });
    </script>
@endsection
