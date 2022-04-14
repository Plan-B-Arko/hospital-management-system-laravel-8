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

                        <h4 class="card-title text-center">New Bed Type
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                                New Bed Type
                            </button>
                        </h4>

                        <!-- AddModal -->
                        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                                    <label> Bed Type</label>
                                                    <input type="text" required class="bed_types form-control">
                                                    <span id="error_bed_types" class="errorColor"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label> Description</label>
                                                        {{-- <textarea class="form-control" id="description"
                                                            name="description"></textarea> --}}
                                                        <input type="text" required class="description form-control">
                                                        <span id="error_description" class="errorColor"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-info add_bed_types">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- modal end --}}

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit New Bed Type</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form action="">
                                    @csrf

                                    <input type="hidden" id="newbedtype_id">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label> Bed Type</label>
                                                <input type="text" class="form-control" placeholder="Enter Bed Type"
                                                    id="bed_typesss">
                                                <span id="error_bed_type" class="errorColor"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label> Description</label>
                                                    <input type="text" class="form-control" id="descriptionsss">
                                                    <span id="error_descriptions" class="errorColor"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button"
                                            class="btn btn-rounded btn-info update_bed_types">update</button>
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
                                                aria-label="Name: activate to sort column descending">Bed Type</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" style="width: 89px;"
                                                aria-label="Salary: activate to sort column ascending">Description</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" style="width: 89px;"
                                                aria-label="Salary: activate to sort column ascending">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($newbedtypes as $newbedtype)
                                            <tr>

                                                <td class="dtr-control sorting_1" tabindex="0">
                                                    {{ $newbedtype->bed_types }}</td>
                                                <td>{{ $newbedtype->description }}</td>

                                                <td>
                                                    <button type="button" value="{{ $newbedtype->id }}"
                                                        class="btn btn-success editBtn btn-sm">
                                                        <i class="fa fa-pencil-alt"></i></button>

                                                    <a href="{{ route('newbedtype.delete', $newbedtype->id) }}"
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


            $(document).on('click', '.editBtn', function() {
                var newbedtype_id = $(this).val();
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/NewBedType/edit-newbedtype/" + newbedtype_id,
                    success: function(response) {
                        //   console.log(response.newbedtype.description);
                        $('#newbedtype_id').val(response.newbedtype.id);
                        $('#bed_typesss').val(response.newbedtype.bed_types);
                        $('#descriptionsss').val(response.newbedtype.description);
                    }
                });
                $('.btn-close').find('input').val('');

            });

            // for adding data using ajax
            $(document).on('click', '.add_bed_types', function(e) {
                e.preventDefault();
                $(this).text('Sending..');
                var data = {
                    'bed_types': $('.bed_types').val(),
                    'description': $('.description').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/NewBedType/add",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#error_bed_types').text(response.errors.bed_types);
                            $('#error_description').text(response.errors.description);

                            $('.add_bed_types').text('Save');
                        } else {
                            $('#addModal').find('input').val('');
                            $('.add_bed_types').text('Save');
                            $('#addModal').modal('hide');
                            toastr.success(response.message);
                            // fetchstudent();
                            location.reload();
                        }
                    }
                });
            });

            $(document).on('click', '.update_bed_types', function(e) {
                e.preventDefault();

                $(this).text('Updating..');
                var id = $('#newbedtype_id').val();
                // alert(id);

                var data = {
                    'bed_types': $('#bed_typesss').val(),
                    'description': $('#descriptionsss').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/NewBedType/update/" + id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#error_bed_type').text(response.errors.bed_types);
                            $('#error_descriptions').text(response.errors.description);
                            $('.update_bed_types').text('Update');
                        } else {
                            $('#editModal').find('input').val('');
                            $('.update_bed_types').text('Update');
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
