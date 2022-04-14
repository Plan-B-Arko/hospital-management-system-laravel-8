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
        
        .card .card-body `button:focus{
            outline: none;
        }

    </style>
    <div class="container-full topBar">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">Medicine Category
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#medicineCategory">
                                Medicine Category
                            </button>
                        </h4>

                        <!-- AddModal -->
                        <div class="modal fade" id="medicineCategory" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Medicine Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label> Medicine Category</label><span class="errorColor"> *</span>
                                                    <input type="text" required class="name form-control">
                                                    <span id="error_name" class="errorColor"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="button" class="btn btn-rounded btn-info add_medicine_type"
                                                value="Add Medicine Type">
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
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Medicine Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="">
                                        @csrf

                                        <input type="hidden" id="medicinecategory_id" name="medicinecategory_id">

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label> Medicine Category</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Medicine Type" name="name" id="name">
                                                    <span class="error_name errorColor"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit"
                                                class="btn btn-rounded btn-info update_med_cat">update</button>
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
                                                    aria-label="Name: activate to sort column descending">Serial Number</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Medicine Category
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                $sn = 1;
                                            @endphp
                                            @foreach ($medicinecategorys as $medicinecategory)
                                                <tr>

                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $sn++ }}</td>
                                                    <td>{{ $medicinecategory->name }}</td>
                                                    <td>
                                                        <button type="button" value="{{ $medicinecategory->id }}"
                                                            class="btn btn-success editBtn btn-sm">
                                                            <i class="fa fa-pencil-alt"></i></button>

                                                        <a href="{{ route('delete.medicinecategory', $medicinecategory->id) }}"
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
            $(document).on('click', '.add_medicine_type', function(e) {
                e.preventDefault();
                $(this).text('Sending..');

                var data = {
                    'name': $('.name').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/Medicine/category/store",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#error_name').text(response.errors.name);
                            $('.add_medicine_type').text('Save');
                        } else {
                            $('#medicineCategory').find('input').val('');
                            $('.add_medicine_type').text('Save');
                            $('#medicineCategory').modal('hide');
                            location.reload();
                            toastr.success(response.message);
                        }
                    }
                });
            });

            // for editing data using ajax
            $(document).on('click', '.editBtn', function() {
                var medicinecategory_id = $(this).val();
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/Medicine/category/edit/" + medicinecategory_id,
                    success: function(response) {
                        //   console.log(response.newbedtype.description);
                        $('#medicinecategory_id').val(response.medicinecategory.id);
                        $('#name').val(response.medicinecategory.name);
                    }
                })
            });

            // for updating data using ajax
            $(document).on('click', '.update_med_cat', function(e) {
                e.preventDefault();
                $(this).text('Updating..');
                var id = $('#medicinecategory_id').val();
                // alert(id);
                var data = {
                    'name': $('#name').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: "/Medicine/category/update/" + id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('.error_name').text(response.errors.name);
                            $('.update_med_cat').text('Update');
                        } else {
                            $('#editModal').find('input').val('');
                            $('.update_med_cat').text('Update');
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
