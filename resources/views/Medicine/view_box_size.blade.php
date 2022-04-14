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

                        <h4 class="card-title text-center">Medicine Box Size List
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#medicineCategory"><span style="padding: 5px; font-weight: bold;">+</span>
                                Add Box Size
                            </button>
                        </h4>

                        <!-- AddModal -->
                        <div class="modal fade" id="medicineCategory" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Medicine Box Size</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label> Medicine Box Size</label><span class="errorColor"> *</span>
                                                    <input type="text" class="box_size_name form-control" name="box_size_name">
                                                    <span id="error_boxname" class="errorColor"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="button" class="btn btn-rounded btn-info "
                                            id="add_medicine_boxsize"  value="Add Box Size">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{--Add modal end --}}

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Medicine Box Size</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="">
                                        @csrf

                                        <input type="hidden" id="medicineBox_id" name="medicineBox_id">

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label> Medicine Box Size</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Medicine Type" name="box_size_name" id="box_size_name">
                                                    <span class="error_boxname errorColor"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit"
                                                class="btn btn-rounded btn-info update_box_size">update</button>
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
                                                    aria-label="Name: activate to sort column descending">Medicine Box Size
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
                                            @foreach ($medicineboxsizes as $medicineboxsize)
                                                <tr>

                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $sn++ }}</td>
                                                    <td>{{ $medicineboxsize->box_size_name }}</td>
                                                    <td>
                                                        <button type="button" value="{{ $medicineboxsize->id }}"
                                                            class="btn btn-success editBtn btn-sm">
                                                            <i class="fa fa-pencil-alt"></i></button>

                                                        <a href="{{ route('delete.medicine_boxsize', $medicineboxsize->id) }}"
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

@push('box')
    <script>

$(()=>{



// //for adding data using ajax
$('#add_medicine_boxsize').click( function(e) {
    e.preventDefault();


    var data = {
        'box_size_name': $('.box_size_name').val(),
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: "/Medicine/box-size/store",
        data: data,
        dataType: "json",
        success: function(response) {
            if (response.status == 400) {
                $('#error_boxname').text(response.errors.box_size_name);
                $('.add_medicine_boxsize').text('Save');
            } else {
                $('#medicineCategory').find('input').val('');
                $('.add_medicine_boxsize').text('Save');
                $('#medicineCategory').modal('hide');
                location.reload();
                toastr.success(response.message);
            }
        }
    });
});

//for editing data using ajax
$(document).on('click', '.editBtn', function() {
    var medicineBox_id = $(this).val();
    // alert(medicineBox_id);
    $('#editModal').modal('show');
    $.ajax({
        type: "GET",
        url: "/Medicine/box-size/edit/" + medicineBox_id,
        success: function(response) {
            //   console.log(response);
            $('#medicineBox_id').val(response.medicineboxsize.id);
            $('#box_size_name').val(response.medicineboxsize.box_size_name);
        }
    })
});

//for updating data using ajax
$(document).on('click', '.update_box_size', function(e) {
    e.preventDefault();
    $(this).text('Updating..');
    var id = $('#medicineBox_id').val();
     //alert(id);
    var data = {
        'box_size_name': $('#box_size_name').val(),
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "PUT",
        url: "/Medicine/box-size/update/" + id,
        data: data,
        dataType: "json",
        success: function(response) {
            // console.log(response);
            if (response.status == 400) {
                $('.error_boxname').text(response.errors.box_size_name);
                $('.update_box_size').text('Update');
            } else {
                $('#editModal').find('input').val('');
                $('.update_box_size').text('Update');
                $('#editModal').modal('hide');
                location.reload();
                toastr.success(response.message);
            }
        }
    });
});


});

</script>
@endpush
