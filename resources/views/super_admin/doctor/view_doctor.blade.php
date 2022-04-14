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

        .modal-body .row .col-md-6,
        .modal-body .row .col-md-12 {
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



                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-buttons"
                                        class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline text-center align-middle"
                                        style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                        aria-describedby="datatable-buttons_info">

                                        <thead>
                                            <tr role="row">
                                                <th rowspan="1" colspan="1" style="width: 50px;">Image</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;"> First Name</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;"> Last Name</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Email</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Designation</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Doctor Department</th>

                                                <th rowspan="1" colspan="1" style="width: 120px;">Mobile</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Gender</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Address 1</th>
                                                <th rowspan="1" colspan="1" style="width: 89px;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($doctors as $doctor)
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset($doctor->image) }}" class="rounded avatar-lg"
                                                            alt="" style="width: 80px;">
                                                    </td>
                                                    <td>{{ $doctor->first_name1 }}</td>
                                                    <td>{{ $doctor->last_name1 }}</td>
                                                    <td>{{ $doctor->email }}</td>
                                                    <td>{{ $doctor->designation }}</td>
                                                    <td>{{ $doctor->doc_dept }}</td>

                                                    <td>{{ $doctor->mobile }}</td>
                                                    <td>{{ $doctor->sex }}</td>
                                                    <td>{{ $doctor->profile }}</td>
                                                    <td>

                                                        <a href="{{ route('edit.doctor', $doctor->id) }}"
                                                            class="btn btn-success">Edit</a>

                                                        <a href="{{ route('delete.doctor', $doctor->id) }}"
                                                            class="btn btn-danger" id="#">Delete</a>
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

@endsection

@section('scripts')


@endsection
