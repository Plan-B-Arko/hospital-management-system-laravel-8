@extends('layouts.admin_master')
@section('css')
    <style>
        .filterBox{
            border:1px solid #ddd;
            color: black;
            background: white;
            padding: 15px;
        }
        .filterBox input{
             padding: 15px;
        }
    </style>
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
                    <div class="filterBox">
                        <form id="SearchAssign">
                            @csrf
                            <input type="date" name="starting_date" id="starting_date">
                            <input type="date" name="ending_date" id="ending_date">&emsp;
                        </form>
                    </div>
                    <br>
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
                        </tr>
                    </thead>
                    <tbody id="SearchValue">
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>

$(document).ready(function() {

        // for getting appointment between specific dates
        $('#starting_date').on('change', function(){
            $('#ending_date').on('change', function(){
                    var data = {
                        'starting_date': $('#starting_date').val(),
                        'ending_date': $('#ending_date').val(),
                    }
                        $.ajax({
                        type: "POST",
                        url: "/Appointment/search/assign/all",
                        headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                 },
                        dataType: "json",
                        data: data,
                        success: function(response) {
                            $('#SearchValue').empty();
                            if( response.length != 0 ){
                                    response.forEach(function(value) {
                                    var appSearch = `<tr>
                                                <td> ${value.id} </td>
                                                <td> ${value.appointment_id} </td>
                                                <td> ${value.patient_id} </td>
                                                <td> ${value.doctor_dept.name} </td>
                                                <td> ${value.doctor.first_name1} </td>
                                                <td> ${value.serial_no} </td>
                                                <td> ${value.problem} </td>
                                                <td> ${value.appointment_date} </td>
                                                <td>
                                            </td>
                                                </tr>`
                                    $('#SearchValue').append(appSearch);
                                });
                            }else{
                                var appSearch = `<tr>
                                                <td colspan="8"><span>no data found in these criteria</span></td>
                                                </tr>`
                                $('#SearchValue').append(appSearch);
                            }
                        }
                    });
            });
        });

    });
</script>
@endsection


