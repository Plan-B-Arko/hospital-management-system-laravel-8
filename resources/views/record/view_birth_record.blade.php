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

        .modal-body .row .col-md-4 {
            margin-bottom: 1rem;
        }

        .ImgBox img {
            border-radius: 50%;
        }

        .circle {
            height: 80px;
            width: 80px;
            display: block;
            background-color: darkseagreen;
            border-radius: 80px;
            position: relative;
        }

        .word {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .modal-body select,
        .modal-body input {
            border: none;
            background: #f5f8fa !important;
            border-radius: 5%;
        }

        .addapoint {
            margin-left: 1rem;
        }

        .card-title i {
            color: rgb(70, 75, 104);
        }

    </style>

    <div class="container-full topBar">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">All Birth Record
                            <!-- Button trigger modal -->

                            <button type="button" class="btn btn-success addapoint" data-bs-toggle="modal"
                                data-bs-target="#AddBirthRecord">
                                New Birth Record
                            </button>

                        </h4>

                        <!-- Modal for add doctor -->
                        <div class="modal fade bd-example-modal-lg" id="AddBirthRecord" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Birth Record</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Child Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter child name" name="child_name">
                                                        @error('child_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Gender</label><br>
                                                        <select name="gender" class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select Gender
                                                            </option>
                                                            <option value="male">Male
                                                            </option>
                                                            <option value="female">Female
                                                            </option>
                                                            <option value="others">Others
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Weight</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter weigtht" name="weigtht">
                                                        @error('weight')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Child Photo</label>
                                                        <input type="file" class="form-control" name="child_photo">
                                                        @error('child_photo')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Birth Date</label>
                                                        <input type="datetime-local" class="form-control"
                                                            placeholder="Enter birth date" name="birth_date">
                                                        @error('birth_date')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="text" class="form-control" placeholder="Enter phone"
                                                            name="phone">
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>address</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter address" name="address">
                                                        @error('address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Mother Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter mother name" name="mother_name">
                                                        @error('mother_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Mother Photo</label>
                                                        <input type="file" class="form-control" name="mother_photo">
                                                        @error('mother_photo')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Father Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter father name" name="father_name">
                                                        @error('father_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Father Photo</label>
                                                        <input type="file" class="form-control" name="father_photo">
                                                        @error('father_photo')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Report</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter mother report" name="report">
                                                        @error('report')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Document Photo</label>
                                                        <input type="file" class="form-control" name="document_photo">
                                                        @error('document_photo')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-rounded btn-info" value="Add Birth Record">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for add Edit doctor -->
                        <div class="modal fade bd-example-modal-lg" id="EditBirthRecord" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Birth Record</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('update.birth_record') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" id="birth_record_id" name="birth_record">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Child Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter child name" name="child_name"
                                                            id="child_name_id">
                                                        @error('child_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Gender</label><br>
                                                        <select name="gender" class="form-control" required=""
                                                            id="gender_id">
                                                            <option value="" selected="" disabled="">Select Gender
                                                            </option>
                                                            <option value="male">Male
                                                            </option>
                                                            <option value="female">Female
                                                            </option>
                                                            <option value="others">Others
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Weight</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter weigtht" name="weight" id="weight_id">
                                                        @error('weight')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Child Photo</label>
                                                        <input type="file" class="form-control" name="child_photo"
                                                            id="child_photo_id">
                                                        @error('child_photo')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Birth Date</label>
                                                        <input type="datetime-local" class="form-control"
                                                            placeholder="Enter birth date" name="birth_date"
                                                            id="birth_date_id">
                                                        @error('birth_date')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="text" class="form-control" placeholder="Enter phone"
                                                            name="phone" id="phone_id">
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>address</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter address" name="address" id="address_id">
                                                        @error('address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Mother Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter mother name" name="mother_name"
                                                            id="mother_name_id">
                                                        @error('mother_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Mother Photo</label>
                                                        <input type="file" class="form-control" name="mother_photo"
                                                            id="mother_photo_id">
                                                        @error('mother_photo')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Father Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter father name" name="father_name"
                                                            id="father_name_id">
                                                        @error('father_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Father Photo</label>
                                                        <input type="file" class="form-control" name="father_photo"
                                                            id="father_photo_id">
                                                        @error('father_photo')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Report</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter mother report" name="report" id="report_id">
                                                        @error('report')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Document Photo</label>
                                                        <input type="file" class="form-control" name="document_photo"
                                                            id="document_photo_id">
                                                        @error('document_photo')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-rounded btn-info"
                                                value="Update Birth Record">
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
                                            <tr>
                                                <th>Child Name</th>
                                                <th>Gender</th>
                                                <th>Child Photo</th>
                                                <th>Birth Date</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Mother Name</th>
                                                <th>Father Name</th>
                                                <th>Report</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($birth_records as $birth_record)
                                                <td>{{ $birth_record->child_name }}</td>
                                                <td>{{ $birth_record->gender }}</td>
                                                <td><img src="{{ asset($birth_record->child_photo) }}"
                                                        class="rounded avatar-lg" alt=""></td>
                                                <td>{{ $birth_record->birth_date }}</td>
                                                <td>{{ $birth_record->phone }}</td>
                                                <td>{{ $birth_record->address }}</td>
                                                <td>{{ $birth_record->mother_name }}</td>
                                                <td>{{ $birth_record->father_name }}</td>
                                                <td>{{ $birth_record->report }}</td>
                                                <td>
                                                    <button type="button" value="{{ $birth_record->id }}"
                                                        class="btn btn-success editBtn btn-sm"><i
                                                            class="fa fa-pencil-alt"></i></button>
                                                    <a href="{{ route('delete.birth_record', $birth_record->id) }}"
                                                        class="btn btn-sm btn-danger" id="delete" title="delete data">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
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
                var birth_record_id = $(this).val();
                // alert(birth_record_id);
                $('#EditBirthRecord').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/Record/birth/edit/" + birth_record_id,
                    success: function(response) {
                        // console.log(response.birth_record);
                        $('#birth_record_id').val(response.birth_record.id);
                        $('#child_name_id').val(response.birth_record.child_name);
                        $('#gender_id').val(response.birth_record.gender);
                        $('#weight_id').val(response.birth_record.weight);
                        $('#birth_date_id').val(response.birth_record.birth_date);
                        $('#phone_id').val(response.birth_record.phone);
                        $('#address_id').val(response.birth_record.address);
                        $('#mother_name_id').val(response.birth_record.mother_name);
                        $('#father_name_id').val(response.birth_record.father_name);
                        $('#report_id').val(response.birth_record.report);
                    }
                })
            });
        });
    </script>
@endsection
