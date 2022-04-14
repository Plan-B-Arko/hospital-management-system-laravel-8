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
                                                <th rowspan="1" colspan="1" style="width: 50px;">Sl.No</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Patient Id</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;"> Type</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Doctor Name</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Visiting Fees</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Date</th>
                                                <th rowspan="1" colspan="1" style="width: 89px;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($prescriptions as $prescription)
                                                <tr>
                                                    <td>{{ $prescription->id }}</td>
                                                    <td>{{ $prescription->patient_id }}</td>
                                                    <td>{{ $prescription->type }}</td>
                                                    <td>John Doye</td>
                                                    <td>{{ $prescription->visiting_fees }}</td>
                                                    <td>{{ $prescription->date }}</td>
                                                    <td>

                                                        <a href="{{ route('edit.prescription', $prescription->id) }}"
                                                            class="btn btn-sm btn-danger ">
                                                            <i class="fa fa-pencil-alt"></i></a>

                                                        <a href="{{ route('delete.prescription', $prescription->id) }}"
                                                            class="btn btn-sm btn-dange editBtn" id="delete"
                                                            title="delete data"><i class="fa fa-trash"></i></a>
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
