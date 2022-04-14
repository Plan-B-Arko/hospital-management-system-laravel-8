
 @extends('layouts.admin_master')

@section('css')

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

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
        .but {
        border: none;
        color: white;
        padding: 5px 9px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
        }
        .button1 {
        background-color: white;
        color: black;
        border: 2px solid #c4c3c0;
        padding: 6px 8px;
        border-radius: 12%;

        }

        .button1:hover {
        background-color: #c4c3c0;
        color: white;
        }

        .modal{
            z-index:1050 !important;
        }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection

@section('super-admin-content')
<div class="container-full topBar">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title text-center">All Schedule
                        <button type="button" class="btn btn-success btn-sm float-end" data-bs-toggle="modal" data-bs-target="#AddEmployeeModal">ADD SCHEDULE</button>
                    </h4>

                    <!-- Modal for add patient -->
                    <div class="modal fade bd-example-modal-lg" id="AddEmployeeModal" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Time Schedule</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Slot Name<span class="errorColor"> *</span></label>
                                                                <select  style='width: 200px;' class="slot_id selUser slot_id">
                                                                    <option value="" selected="" disabled="">Select Slot Name
                                                                    </option>
                                                                    @foreach ($slotsnames as $slotsname)
                                                                        <option value="{{ $slotsname->id }}">{{ $slotsname->slot_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                 <span id="error_slot_name" class="errorColor"></span>
                                                    </div>
                                                </div>
                                             <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Doctor Name<span class="errorColor"> *</span></label>
                                                                <select  style='width: 200px;' class="slot_id selUser doctor_id">
                                                                <option value="" selected="" disabled="">Select Doctor Name
                                                                </option>
                                                                    @foreach ($docnames as $docname)
                                                                        <option value="{{ $docname->id }}">{{ $docname->first_name1 }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <span id="error_doctor_name" class="errorColor"></span>
                                                    </div>
                                                </div>

                                             <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Available Days<span class="errorColor"> *</span></label>
                                                                <select  style='width: 200px;' class="slot_id selUser available_days">
                                                                    <option value="" selected="" disabled="">Select Available Days
                                                                    </option>
                                                                    <option>Sunday</option>
                                                                    <option>Monday</option>
                                                                    <option>Tuesday</option>
                                                                    <option>Wednesday</option>
                                                                    <option>Thursday</option>
                                                                    <option>Friday</option>
                                                                    <option>Saturday</option>

                                                            </select>
                                                            <span id="error_available_days" class="errorColor"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label>Available Time<span class="errorColor"> *</span></label>
                                                            <input type="time" id="appt" name="appt" class="form-control available_time_start" placeholder="Start Time">
                                                            <span id="error_available_starttime" class="errorColor"></span>
                                                            </div>
                                                            </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <br>
                                                                <input type="time" id="appt" name="appt" class="form-control available_time_end" placeholder="End Time">
                                                                <span id="error_available_endtime" class="errorColor"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                     <div class="form-group">
                                                     <label>Per Patient Time<span class="errorColor"> *</span></label>
                                                    <input type="time" id="appt" name="appt" class="form-control per_patient_time">
                                                     <span id="error_available_perpatienttime" class="errorColor"></span>
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Serial Visibility<span class="errorColor"> *</span></label>
                                                                <select  style='width: 200px;' class="slot_id selUser serial_visiability">
                                                                    <option>Sequential</option>
                                                                    <option>Timestamp</option>
                                                                </select>
                                                        <span id="error_serialvisibility" class="errorColor"></span>
                                                     </div>
                                                </div>
                                               <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Status</label><br>
                                                        <input class="form-check-input status" type="radio" name="gender"
                                                                value="Active">Active
                                                                <input class="form-check-input status" type="radio" name="gender"
                                                                 value="InActive">InActive<br>
                                                        <span id="error_status" class="errorColor"></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                             <button  type="reset" class="but button1">Reset</button>
                                            <button type="button" class="btn btn-info add_appointment">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                   {{-- view --}}

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
                                                    aria-label="Name: activate to sort column descending">Slot Name </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Doctor Name</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Available Days</th>
                                                      <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Available Time Start</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Available Time End</th>
                                                      <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Per Patient Time</th>
                                                      <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Serial Visibility</th>
                                                      <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Status</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($schedulists as $diagnosiscat)
                                                <tr>
                                                    <td class="dtr-control sorting_1" tabindex="0">{{ $diagnosiscat['schedulename']['slot_name'] }}</td>
                                                      <td>{{ $diagnosiscat['doctorname']['first_name1'] }}</td>
                                                     <td>{{ $diagnosiscat->available_days }}</td>
                                                      <td>{{ $diagnosiscat->available_time_start }}</td>
                                                      <td>{{ $diagnosiscat->available_time_end }}</td>
                                                       <td>{{ $diagnosiscat->per_patient_time }}</td>
                                                        <td>{{ $diagnosiscat->serial_visiability }}</td>
                                                    <td>{{ $diagnosiscat->status }}</td>
                                                    <td>
                                                        <button type="button" value="{{ $diagnosiscat->id }}"
                                                            class="btn btn-success editBtn btn-sm">
                                                            <i class="fa fa-pencil-alt"></i></button>
                                                        <a href="{{ route('delete.timeslotlist', $diagnosiscat->id) }}"
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
                        {{-- for edit start --}}
                    <!-- Edit Modal -->

                    <div class="modal fade" id="editModal"  aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Time Schedule</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="">
                                        @csrf
                                        <input type="hidden" id="diagnosiscat_id" >

                                        <div class="modal-body">
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Slot Name<span class="errorColor"> *</span></label>
                                                                <select  style='width: 200px;'  id="slot_id" id="selUserEdit1">
                                                                    <option value="" selected="" disabled="">Select Slot Name
                                                                    </option>
                                                                    @foreach ($slotsnames as $slotsname)
                                                                        <option value="{{ $slotsname->id }}">{{ $slotsname->slot_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                 <span id="error_slot_slotidedit" class="errorColor"></span>
                                                    </div>
                                                </div>
                                             <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Doctor Name<span class="errorColor"> *</span></label>
                                                                <select  style='width: 200px;' id="doctor_id" id="selUserEdit2">
                                                                    <option value="" selected="" disabled="">Select Doctor Name
                                                                    </option>
                                                                    @foreach ($docnames as $docname)
                                                                        <option value="{{ $docname->id }}">{{ $docname->first_name1 }}
                                                                        </option>
                                                                    @endforeach
                                                                    </select>
                                                                    <span id="error_doctor_nameedit" class="errorColor"></span>
                                                    </div>
                                                </div>

                                             <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Available Days<span class="errorColor"> *</span></label>
                                                                <select  style='width: 200px;' id="available_days" id="selUserEdit3">
                                                                    <option value="" selected="" disabled="">Select Available Days
                                                                    </option>
                                                                    <option>Sunday</option>
                                                                    <option>Monday</option>
                                                                    <option>Tuesday</option>
                                                                    <option>Wednesday</option>
                                                                    <option>Thursday</option>
                                                                    <option>Friday</option>
                                                                    <option>Saturday</option>

                                                            </select>
                                                            <span id="error_available_daysedit" class="errorColor"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                     <label>Available Time<span class="errorColor"> *</span></label>
                                                    <input type="time" id="appt" name="appt" class="form-control available_time" placeholder="Start Time">
                                                    <span id="error_available_starttime" class="errorColor"></span>
                                                            </div>
                                                            </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <br>
                                                    <input type="time" id="appt" name="appt" class="form-control available_times" placeholder="End Time">
                                                     <span id="error_available_endtime" class="errorColor"></span>
                                                            </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                     <div class="form-group">
                                                     <label>Per Patient Time<span class="errorColor"> *</span></label>
                                                    <input type="time" class="form-control " id="per_patient_time">
                                                     <span id="error_available_perpatienttimeedit" class="errorColor"></span>
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Serial Visibility<span class="errorColor"> *</span></label>
                                                                <select  style='width: 200px;' id="serial_visiability" id="selUserEdit4">
                                                                    <option>Sequential</option>
                                                                    <option>Timestamp</option>
                                                            </select>
                                                             <span id="error_serialvisibilityedit" class="errorColor"></span>
                                                     </div>
                                                </div>
                                               <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Status</label><br>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input status1" type="radio" name="gender1"
                                                                id="inlineRadio1" value="Active">
                                                            <label class="form-check-label" for="inlineRadio1">Active</label>

                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input status1" type="radio" name="gender1"
                                                                id="inlineRadio2" value="InActive">
                                                            <label class="form-check-label"
                                                                for="inlineRadio2">InActive</label>

                                                        </div>
                                                        <span id="error_statusedit" class="errorColor"></span>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button  type="reset" class="but button1 ">Reset</button>
                                            <button type="submit" class="btn btn-rounded btn-info update_schedule_slot">update</button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>

                           {{-- for edit end --}}


                   </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
                        {{-- modal end --}}

@endsection
@section('scripts')

<script>

    $(document).ready(function() {
            $('.selUser').select2({
                dropdownParent: $('#AddEmployeeModal')
            });
            // for edit
            $('#selUserEdit1').select2({
                dropdownParent: $('#editModal')
            });

            // for adding data using ajax
            $(document).on('click', '.add_appointment', function(e) {
                e.preventDefault();
                $(this).text('Sending..');
                var data = {
                    'slot_id': $('.slot_id').val(),
                    'doctor_id': $('.doctor_id').val(),
                    'available_days': $('.available_days').val(),
                    'available_time_start': $('.available_time_start').val(),
                    'available_time_end': $('.available_time_end').val(),
                    'per_patient_time': $('.per_patient_time').val(),
                     'serial_visiability': $('.serial_visiability').val(),
                     'status': $('.status:checked').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/schedulelist/store",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#error_slot_name').text(response.errors.slot_id);
                            $('#error_doctor_name').text(response.errors.doctor_id);
                            $('#error_available_days').text(response.errors.available_days);
                            $('#error_available_starttime').text(response.errors.available_starttime);
                            $('#error_available_endtime').text(response.errors.available_endtime);
                            $('#error_available_perpatienttime').text(response.errors.per_patient_time);
                            $('#error_serialvisibility').text(response.errors.available_days);
                            $('#error_status').text(response.errors.status);
                            $('.add_appointment').text('Save');
                        } else {
                            $('#AddEmployeeModal').find('input').val('');
                            $('.add_appointment').text('Save');
                            $('#AddEmployeeModal').modal('hide');
                            toastr.success(response.message);
                            location.reload();
                        }
                    }
                });
            });

             // // for editing data using ajax
            $(document).on('click', '.editBtn', function() {
                var diagnosiscat_id= $(this).val();
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/schedulelist/edit-schedulelist/" + diagnosiscat_id,
                    success: function(response) {
                          console.log(response.diagnosiscat);
                        $('#diagnosiscat_id').val(response.diagnosiscat.id);
                        $('#slot_id').val(response.diagnosiscat.slot_id);
                        $('#doctor_id').val(response.diagnosiscat.doctor_id);
                        $('#available_days').val(response.diagnosiscat.available_days);
                        $('.available_time').val(response.diagnosiscat.available_time_start);
                        $('.available_times').val(response.diagnosiscat.available_time_end);
                        $('#per_patient_time').val(response.diagnosiscat.per_patient_time);
                        $('#serial_visiability').val(response.diagnosiscat.serial_visiability);
                        if (response.diagnosiscat.status == 'Active') {
                            $('#editModal').find(':radio[name=gender1][value="Active"]').prop(
                                'checked', true);
                        } else {
                            $('#editModal').find(':radio[name=gender1][value="InActive"]').prop(
                                'checked', true);
                        }
                    }
                })
            });

              // for updating data using ajax
            $(document).on('click', '.update_schedule_slot', function (e) {
               e.preventDefault();

                $(this).text('Updating..');
                var id = $('#diagnosiscat_id').val();

                var data = {
                    'slot_id': $('#slot_id').val(),
                    'doctor_id': $('#doctor_id').val(),
                    'available_days': $('#available_days').val(),
                    'available_time_start': $('.available_time').val(),
                    'available_time_end': $('.available_times').val(),
                    'per_patient_time': $('#per_patient_time').val(),
                    'serial_visiability': $('#serial_visiability').val(),
                    'status': $('.status1:checked').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/schedulelist/update/" + id,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#error_slot_slotidedit').text(response.errors.slot_id);
                            $('#error_doctor_nameedit').text(response.errors.doctor_id);
                            $('#error_available_daysedit').text(response.errors.available_days);
                            $('#error_available_starttimeedit').text(response.errors.available_starttime);
                            $('#error_available_endtimeedit').text(response.errors.available_endtime);
                            $('#error_available_perpatienttimeedit').text(response.errors.per_patient_time);
                            $('#error_serialvisibilityedit').text(response.errors.available_days);
                            $('#error_statusedit').text(response.errors.status);
                            $('.update_schedule_slot').text('Update');
                        } else {
                            $('#editModal').find('input').val('');
                            $('.update_schedule_slot').text('Update');
                            $('#editModal').modal('hide');
                            toastr.success(response.message);
                            location.reload();
                        }
                    }
                });

            });

 });

</script>

@endsection
