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

                        <h4 class="card-title text-center">New Bed
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Add New Bed
                            </button>
                        </h4>

                        <!-- AddModal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New Bed Type</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form>
                                        @csrf
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Bed Name</label>
                                                    <input type="text" class="form-control bed" placeholder="Enter Bed Type"
                                                        name="bed">
                                                    <span id="error_bed" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label> Bed Type</label>
                                                    <select name="bed_type_id" required="" class="form-control bed_type_id"
                                                        aria-invalid="false">
                                                        <option value="" selected="" disabled="">Select Bed Type</option>
                                                        @foreach ($newbedtypes as $newbedtype)
                                                            <option value="{{ $newbedtype->id }}">
                                                                {{ $newbedtype->bed_types }}</option>
                                                        @endforeach

                                                    </select>
                                                    <span id="error_bed_types" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label> Charge</label>
                                                        <input type="text" class="form-control charge" name="charge">
                                                        <span id="error_charge" class="errorColor"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label> Description</label>
                                                        <textarea class="form-control description"
                                                            name="description"></textarea>
                                                        <span id="error_description" class="errorColor"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-info add_bed">Save</button>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Bed</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form>
                                        @csrf

                                        <input type="hidden" id="newbed_id" name="newbed_id">

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label> Bed </label>
                                                    <input type="text" class="form-control" placeholder="Enter Bed Type"
                                                        id="bed">
                                                    <span id="error_bededit" class="errorColor"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label> Charge </label>
                                                    <input type="text" class="form-control" placeholder="Enter Bed Type"
                                                        id="charge">
                                                    <span id="error_chargeedit" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label> Bed Type</label>
                                                    <select required="" id="bed_type_id" class="form-control"
                                                        aria-invalid="false">
                                                        <option value="" selected="" disabled="">Select Bed Type</option>
                                                        @foreach ($newbedtypes as $newbedtype)
                                                            <option value="{{ $newbedtype->id }}">
                                                                {{ $newbedtype->bed_types }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="error_bed_typesedit" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label> Description</label>
                                                        <input type="text" class="form-control" id="description">
                                                        <span id="error_descriptionedit" class="errorColor"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button"
                                                class="btn btn-rounded btn-info update_bed">update</button>
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
                                                    aria-label="Name: activate to sort column descending">Bed Name</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Bed Type</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Charge</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($newbeds as $newbed)
                                                <tr>
                                                    <td class="dtr-control sorting_1" tabindex="0">{{ $newbed->bed }}</td>
                                                    <td>
                                                        {{ $newbed['newbed']['bed_types'] }} </td>
                                                    <td>{{ $newbed->charge }}</td>
                                                    <td>
                                                        @if ($newbed->status == 0)
                                                            <span class="badge p-1 px-2"
                                                                style="background-color: #45ca7f;color:white;border-radius:10px;">Available</span>
                                                        @else
                                                            <span class="badge p-1 px-2 bg-danger"
                                                                style="color:white;border-radius:10px;">Not Available</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button type="button" value="{{ $newbed->id }}"
                                                            class="btn btn-success editBtn btn-sm"><i
                                                                class="fa fa-pencil-alt"></i></button>
                                                        <a href="{{ route('newbed.delete', $newbed->id) }}"
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
            </div> <!-- end col -->

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $(document).on('click', '.editBtn', function() {
                var newbed_id = $(this).val();
                // alert(newbed_id);
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/NewBed/edit-newbed/" + newbed_id,
                    success: function(response) {
                        //   console.log(response.newbed);
                        $('#newbed_id').val(response.newbed.id);
                        $('#bed').val(response.newbed.bed);
                        $('#bed_type_id').val(response.newbed.bed_type_id);
                        $('#charge').val(response.newbed.charge);
                        $('#description').val(response.newbed.description);
                    }
                })
            });

            // for adding data using ajax
            $(document).on('click', '.add_bed', function(e) {

                e.preventDefault();
                $(this).text('Sending..');
                var data = {
                    'bed': $('.bed').val(),
                    'bed_type_id': $('.bed_type_id').val(),
                    'charge': $('.charge').val(),
                    'description': $('.description').val(),

                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/NewBed/add",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#error_bed').text(response.errors.bed);
                            $('#error_bed_types').text(response.errors.bed_type_id);
                            $('#error_charge').text(response.errors.charge);
                            $('#error_description').text(response.errors.description);

                            $('.add_bed').text('Save');
                        } else {
                            $('#addModal').find('input').val('');
                            $('.add_bed').text('Save');
                            $('#addModal').modal('hide');
                            toastr.success(response.message);
                            // fetchstudent();
                            location.reload();
                        }
                    }
                });
            });

            $(document).on('click', '.update_bed', function(e) {
                e.preventDefault();

                $(this).text('Updating..');
                var id = $('#newbed_id').val();
                // alert(id);

                var data = {
                    'bed': $('#bed').val(),
                    'bed_type_id': $('#bed_type_id').val(),
                    'charge': $('#charge').val(),
                    'description': $('#description').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/NewBed/update/" + id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#error_bededit').text(response.errors.bed);
                            $('#error_bed_typesedit').text(response.errors.bed_type_id);
                            $('#error_chargeedit').text(response.errors.charge);
                            $('#error_descriptionedit').text(response.errors.description);
                            $('.update_bed').text('Update');
                        } else {
                            $('#editModal').find('input').val('');
                            $('.update_bed').text('Update');
                            $('#editModal').modal('hide');
                            toastr.success(response.message);
                            // fetchstudent();
                            location.reload();
                        }
                    }
                });

            });

        });
    </script>


@endsection
