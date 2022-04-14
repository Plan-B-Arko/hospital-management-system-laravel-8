@extends('layouts.admin_master')
@section('css')

@endsection

@section('super-admin-content')

<div class="container-full topBar">
    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable-buttons"
                    class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline text-center align-middle"
                    style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                    aria-describedby="datatable-buttons_info">

                    <thead>
                        <tr role="row">
                            <th rowspan="1" colspan="1" style="width: 50px;">SN</th>
                            <th rowspan="1" colspan="1" style="width: 120px;">Appointment Id</th>
                            <th rowspan="1" colspan="1" style="width: 141px;">Patient Id</th>
                            <th rowspan="1" colspan="1" style="width: 117px;">Department</th>
                            <th rowspan="1" colspan="1" style="width: 53px">Doctor Name</th>
                            <th rowspan="1" colspan="1" style="width: 105px;">Serial No.
                            </th>
                            <th rowspan="1" colspan="1" style="width: 89px;">Problem</th>
                            <th rowspan="1" colspan="1" style="width: 50px;">Appointment Date</th>
                            <th rowspan="1" colspan="1" style="width: 89px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sn=1;
                        @endphp
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $sn++ }}</td>
                                <td>{{ $appointment->appointment_id }}</td>
                                <td>{{ $appointment->patient->patient_id }}</td>
                                <td>{{ $appointment->doctorDept->name }}</td>
                                <td>{{ $appointment->doctor->first_name1 }}</td>
                                <td>{{ $appointment->serial_no }}</td>
                                <td>{{ $appointment->problem }}</td>
                                <td>{{ $appointment->appointment_date }}</td>
                                <td>
                                    <a href="{{ route("delete.apointment",$appointment->id) }}"
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

@endsection




