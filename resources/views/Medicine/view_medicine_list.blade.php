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

        .circle {
            height: 100px;
            width: 100px;
            display: block;
            border: 1px solid black;
            border-radius: 100px;
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

                        <h4 class="card-title text-center">Medicine List
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#AddmedicineList">
                                Add Medicine List
                            </button>
                        </h4>

                        <!-- AddModal -->
                        <div class="modal fade bd-example-modal-lg" id="AddmedicineList" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Medicine List</h5>
                                        <button style="-moz-user-focus{outline:none}; " type="button" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" enctype="multipart/form-data" id="AddMedicine">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Bar Code/QR Code :</label>
                                                        <input type="text" class="bar_code form-control"
                                                            placeholder="Bar Code/QR Code" name="bar_code">
                                                        <span id="error_bar_code" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Medicine Name :</label>
                                                        <input type="text" class="name form-control"
                                                            placeholder="Enter medicine name" name="name">
                                                        <span id="error_name" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Strength :</label>
                                                        <input type="text" class="strength form-control"
                                                            placeholder="Strength" name="strength">
                                                        <span id="error_strength_name" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Generic Name :</label>
                                                        <input type="text" class="gen_name form-control"
                                                            placeholder="Generic Name" name="gen_name">
                                                        <span id="error_gen_name" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Box Size :</label>
                                                        <select name="box_size_id"
                                                            class="box_size form-select form-control">
                                                            <option value="" selected="" disabled="">Select Leaf Pattern
                                                            </option>
                                                            @foreach ($medicine_boxs as $medicine_box)
                                                                <option value="{{ $medicine_box->id }}">
                                                                    {{ $medicine_box->box_size_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span id="error_boz_size" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Unit :</label>
                                                        <select name="unit_id" class="unit_id form-select form-control">
                                                            <option value="" selected="" disabled="">Select Unit</option>
                                                            @foreach ($medicine_units as $medicine_unit)
                                                                <option value="{{ $medicine_unit->id }}">
                                                                    {{ $medicine_unit->unit_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span id="error_unit" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Shelf :</label>
                                                        <input type="text" class="shelf form-control" placeholder="Shelf"
                                                            name="shelf">
                                                        <span id="error_shelf" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Medicine Details :</label>
                                                        {{-- <input type="text" class="med_details form-control"
                                                            placeholder="Medicine Details" name="medicine_det"> --}}
                                                        <textarea class="form-control" name="med_details"
                                                            placeholder="Medicine Details"></textarea>
                                                        <span id="error_medicine_det" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Category :</label>
                                                        <select name="category_id"
                                                            class="category_id form-select form-control">
                                                            <option value="" selected="" disabled="">Select Category Name
                                                            </option>
                                                            @foreach ($medicine_cat as $medicine_catt)
                                                                <option value="{{ $medicine_catt->id }}">
                                                                    {{ $medicine_catt->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span id="error_category_id" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Price :</label>
                                                        <input type="text" class="price form-control"
                                                            placeholder="Enter price" name="price" id="net-price">
                                                        <span id="error_price" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Medicine Type :</label>
                                                        <select name="type_id" class="med_type form-select form-control">
                                                            <option value="" selected="" disabled="">Select Medicine Type
                                                            </option>
                                                            @foreach ($medicine_type as $medicine_typee)
                                                                <option value="{{ $medicine_typee->id }}">
                                                                    {{ $medicine_typee->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span id="error_type_id" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label>Image</label>
                                                                <input type="file" class="image form-control"
                                                                    placeholder="Enter your image" name="image" id="imgInp">
                                                            </div>
                                                            {{-- <img src="{{ asset('uploads/medicine/product.png') }}"
                                                                alt="your image"
                                                                style="height: 85px; width: 145px; border-radius: 50%"> --}}
                                                        </div>
                                                        <span id="error_image" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Manufacture :</label>
                                                        <select name="manufacture_id"
                                                            class="manufacture_id form-select form-control">
                                                            <option value="" selected="" disabled="">Select Manufacture Name
                                                            </option>
                                                            @foreach ($medicine_manufacture as $medicine_manufactur)
                                                                <option value="{{ $medicine_manufactur->id }}">
                                                                    {{ $medicine_manufactur->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span id="error_manufacture_id" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Manufacture Price</label>
                                                        <input type="text" class="manufacture_price form-control"
                                                            placeholder="Manufacture Enter price" name="menu_price">
                                                        <span id="error_menu_price" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Vat Rate (%):</label>
                                                        <input type="text" class="vat form-control" placeholder="0.00"
                                                            name="vat" id="vat-rate">
                                                        <span id="error_vat" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>IGTA Rate (%):</label>
                                                        <input type="text" class="igta form-control" placeholder="0.00"
                                                            name="gta">
                                                        <span id="error_igta" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Status :</label>&nbsp;&nbsp;&nbsp;
                                                        <input class="form-check-input" type="radio" value="1" name="status"
                                                            id="RadioDefault1">&nbsp; Active
                                                        <input class="form-check-input" type="radio" value="0" name="status"
                                                            id="RadioDefault2">&nbsp; Inactive
                                                        <br>
                                                        <span id="error_status" class="errorColor"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-rounded btn-info" value="Add Medicine List">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- modal end --}}
                        <!-- Edit Modal -->
                        <div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Medicine List</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('update.medicinelist') }}" method="POST"
                                        enctype="multipart/form-data" id="Updatemediicne">
                                        @csrf

                                        <input type="hidden" id="medicinelist_id" name="medicinelist_id">
                                        <input type="hidden" id="old_image" name="old_image">

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Medicine Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter medicine name" name="name" id="name">
                                                        <span id="error_name" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Generic Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter medicine name" name="gen_name"
                                                            id="gene_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Medicine Details</label>
                                                        {{-- <input type="text" class="form-control"
                                                            placeholder="Enter medicine name" name="med_details"
                                                            id="med_details"> --}}
                                                        <textarea class="form-control" name="med_details"
                                                            id="med_details"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Category :</label>
                                                        <select name="category_id"
                                                            class="category_id form-select form-control" id="category">
                                                            <option value="" selected="" disabled="">Select Category
                                                                Name
                                                            </option>
                                                            @foreach ($medicine_cat as $medicine_catt)
                                                                <option value="{{ $medicine_catt->id }}">
                                                                    {{ $medicine_catt->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span id="error_category_id" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                {{-- <input type="text" class="form-control"
                                                            placeholder="Enter medicine name" name="manufacture"
                                                            id="manufacture"> --}}
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Manufacture :</label>
                                                        <select name="manufacture_id"
                                                            class="manufacture_id form-select form-control"
                                                            id="manufacture">
                                                            <option value="" selected="" disabled="">Select
                                                                Manufacture Name
                                                            </option>
                                                            @foreach ($medicine_manufacture as $medicine_manufactur)
                                                                <option value="{{ $medicine_manufactur->id }}">
                                                                    {{ $medicine_manufactur->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span id="error_manufacture_id" class="errorColor"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Shelf</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter medicine name" name="shelf" id="shelf">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Manufacture Price</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter medicine name" name="menu_price"
                                                            id="manu_price">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Price</label>
                                                        <input type="text" class="form-control" placeholder="Enter price"
                                                            name="price" id="price">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Strength</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter medicine name" name="strength" id="strength">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Image</label>
                                                        <input type="file" class="form-control"
                                                            placeholder="Enter your image" name="image" id="old_image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-rounded btn-info">update</button>
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
                                                    aria-label="Name: activate to sort column descending">SL</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Image
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Medicine Name
                                                </th>

                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Generic Name</th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Category</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Manufacturer</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Shelf
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Price include Vat
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Manufacturer
                                                    Price</th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Strength</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Medicine Details
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                $sn = 1;
                                            @endphp
                                            @foreach ($medicinelsts as $medicinelistt)
                                                <tr>
                                                    <td class="dtr-control sorting_1" tabindex="0">{{ $sn++ }}
                                                    </td>
                                                    <td class="dtr-control sorting_1" tabindex="0"><img
                                                            src="{{ asset($medicinelistt->image) }} "
                                                            class="rounded avatar-lg" height="80px;" width="80px;"></td>
                                                    <td>{{ $medicinelistt->medicine_name }}</td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $medicinelistt->generic_name }}</td>


                                                    <td class="dtr-control sorting_1" tabindex="0">

                                                        {{ $medicinelistt['Medicinecategory']['name'] }}</td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $medicinelistt['MedicineManufacture']['name'] }}</td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $medicinelistt->shelf }}</td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $medicinelistt->price + $medicinelistt->price * ($medicinelistt->vat / 100) }}
                                                    </td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $medicinelistt->manufacturer_price }}</td>
                                                    <td> {{ $medicinelistt->strength }}</td>

                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $medicinelistt->medicine_details }}</td>
                                                    <td>
                                                        <button type="button" value="{{ $medicinelistt->id }}"
                                                            class="btn btn-success editBtn btn-sm">
                                                            <i class="fa fa-pencil-alt"></i></button>

                                                        <a href="{{ route('delete.medicinelist', $medicinelistt->id) }}"
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // for adding data using ajax

        $(document).on('submit', '#AddMedicine', function(e) {
            e.preventDefault();
            let formData = new FormData($('#AddMedicine')[0]);

            $.ajax({
                type: "POST",
                url: "/Medicine/list/store",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 400) {
                        $('#error_bar_code').text(response.errors.bar_code);
                        $('#error_name').text(response.errors.name);
                        $('#error_strength_name').text(response.errors.strength);
                        $('#error_gen_name').text(response.errors.gen_name);
                        $('#error_boz_size').text(response.errors.box_size);
                        $('#error_unit').text(response.errors.unit_id);
                        $('#error_shelf').text(response.errors.shelf);
                        $('#error_medicine_det').text(response.errors.med_details);
                        $('#error_category_id').text(response.errors.category_id);
                        $('#error_price').text(response.errors.price);
                        $('#error_type_id').text(response.errors.med_type);
                        $('#error_image').text(response.errors.image);
                        $('#error_manufacture_id').text(response.errors.manufacture_id);
                        $('#error_menu_price').text(response.errors.manufacture_price);
                        $('#error_vat').text(response.errors.vat);
                        $('#error_igta').text(response.errors.igta);
                        $('#error_status').text(response.errors.status);
                    } else if (response.status == 200) {
                        $('#AddmedicineList').modal('hide');
                        location.reload();
                        toastr.success(response.message);
                    }
                }
            });
        });

        // for editing data using ajax
        $(document).on('click', '.editBtn', function() {
            var medicinelist_id = $(this).val();
            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/Medicine/list/edit/" + medicinelist_id,
                success: function(response) {
                    $('#medicinelist_id').val(response.medicinelist.id);
                    $('#name').val(response.medicinelist.medicine_name);
                    $('#gene_name').val(response.medicinelist.generic_name);
                    $('#med_details').val(response.medicinelist.medicine_details);
                    $('#category').val(response.medicinelist.category);
                    $('#manufacture').val(response.medicinelist.manufacturer);
                    $('#shelf').val(response.medicinelist.shelf);
                    $('#manu_price').val(response.medicinelist.manufacturer_price);
                    $('#strength').val(response.medicinelist.strength);
                    $('#price').val(response.medicinelist.price);
                    $('#old_image').val(response.medicinelist.image);
                }
            })
        });

        // for update
        $(document).on('submit', '#Updatemediicne', function(e) {
            e.preventDefault();
            let formData = new FormData($('#Updatemediicne')[0]);

            $.ajax({
                type: "POST",
                url: "/Medicine/list/update",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 400) {
                        $('#error_name').text(response.errors.name);
                    } else if (response.status == 200) {
                        $('#editModal').modal('hide');
                        location.reload();
                        toastr.success(response.message);
                    }
                }
            });
        });
    </script>

@endsection
