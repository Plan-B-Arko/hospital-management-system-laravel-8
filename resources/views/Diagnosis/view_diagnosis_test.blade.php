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

    </style>

    <div class="container-full topBar">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">All Diagnosis Test
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#AddDiagnosisTest">
                                Add Diagnosis Test
                            </button>
                        </h4>

                        <!-- Modal for add Diagnosis -->
                        <div class="modal fade bd-example-modal-lg" id="AddDiagnosisTest" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Diagnosis Test</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form >
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Patient</label>
                                                        <select  class="form-control patient_id" required="">
                                                            <option value="" selected="" disabled="">Select Patient Name
                                                            </option>
                                                            @foreach ($patients as $patient)
                                                                <option value="{{ $patient->id }}">{{ $patient->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Doctor</label>
                                                        <select name="doctor_id" class="form-control doctor_id" required="">
                                                            <option value="" selected="" disabled="">Select Doctor Name
                                                            </option>
                                                            @foreach ($doctors as $doctor)
                                                                <option value="{{ $doctor->id }}">{{ $doctor->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Diagnosis Category</label>
                                                        <select name="diagnosis_id" class="form-control diagnosis_id" required="">
                                                            <option value="" selected="" disabled="">Select Diagnosis
                                                                Category
                                                            </option>
                                                            @foreach ($diagnosis as $diagnos)
                                                                <option value="{{ $diagnos->id }}">
                                                                    {{ $diagnos->new_diagnosis_category }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Report Number</label>
                                                        <input type="text" class="form-control report_number"
                                                            placeholder="Enter your report number" name="report_number">
                                                        @error('report_number')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Age</label>
                                                        <input type="text" class="form-control age"
                                                            placeholder="Enter your age" name="age">
                                                        @error('age')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Height</label>
                                                        <input type="text" class="form-control height"
                                                            placeholder="Enter your height" name="height">
                                                        @error('height')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Weight</label>
                                                        <input type="text" class="form-control weight"
                                                            placeholder="Enter your weight" name="weight">
                                                        @error('weight')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Average Glucose</label>
                                                        <input type="text" class="form-control glucose"
                                                            placeholder="Enter your glucose" name="glucose">
                                                        @error('glucose')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Fasting Blood Sugar</label>
                                                        <input type="text" class="form-control blood_sugar"
                                                            placeholder="Enter your blood_sugar" name="blood_sugar">
                                                        @error('blood_sugar')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Urine</label>
                                                        <input type="text" class="form-control urine"
                                                            placeholder="Enter your urine" name="urine">
                                                        @error('urine')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Blood Pressure</label>
                                                        <input type="text" class="form-control blood_pressure"
                                                            placeholder="Enter your blood_pressure" name="blood_pressure">
                                                        @error('blood_pressure')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Diabetis</label>
                                                        <input type="text" class="form-control diabetis" 
                                                            placeholder="Enter your diabetis" name="diabetis">
                                                        @error('diabetis')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Cholestrol</label>
                                                        <input type="text" class="form-control cholestrol"
                                                            placeholder="Enter your cholestrol" name="cholestrol">
                                                        @error('cholestrol')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-rounded btn-info" value="Add Test">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for add Edit Diagnosis -->
                        <div class="modal fade bd-example-modal-lg" id="EditDiagnosis" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Diagnosis</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('update.diagnosisTest') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" id="diagnosis_id" name="diagnosis_id">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Patient</label>
                                                        <select name="patient_id" class="form-control" required=""
                                                            id="patient_id">
                                                            <option value="" selected="" disabled="">Select Patient Name
                                                            </option>
                                                            @foreach ($patients as $patient)
                                                                <option value="{{ $patient->id }}">
                                                                    {{ $patient->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Doctor</label>
                                                        <select  id="doctor_id" class="form-control"
                                                            required="">
                                                            <option value="" selected="" disabled="">Select Doctor Name
                                                            </option>
                                                            @foreach ($doctors as $doctor)
                                                                <option value="{{ $doctor->id }}">{{ $doctor->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Diagnosis Category</label>
                                                        <select  id="diagnosis_test_id"
                                                            class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select Diagnosis
                                                                Category
                                                            </option>
                                                            @foreach ($diagnosis as $diagnos)
                                                                <option value="{{ $diagnos->id }}">
                                                                    {{ $diagnos->new_diagnosis_category }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Report Number</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your report number"
                                                            id="report_number">
                                                        @error('report_number')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Age</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your age"  id="age">
                                                        @error('age')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Height</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your height" id="height">
                                                        @error('height')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Weight</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your weight" id="weight">
                                                        @error('weight')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Average Glucose</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your glucose"  id="glucose">
                                                        @error('glucose')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Urine</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your urine"  id="urine">
                                                        @error('urine')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Blood Pressure</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your blood_pressure" 
                                                            id="blood_pressure">
                                                        @error('blood_pressure')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Diabetis</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your diabetis"  id="diabetis">
                                                        @error('diabetis')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Cholestrol</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your cholestrol" 
                                                            id="cholestrol">
                                                        @error('cholestrol')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-rounded btn-info" value="Update Diagnosis">
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
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">REPORT NUMBER</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 141px;"
                                                    aria-label="Position: activate to sort column ascending">PATIENT</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 117px;"
                                                    aria-label="Office: activate to sort column ascending">DOCTOR</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 53px;"
                                                    aria-label="Age: activate to sort column ascending">DIAGNOSIS CATEGORY
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 105px;"
                                                    aria-label="Start date: activate to sort column ascending">CREATED AT
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Actions</th>
                                            </tr>
                                        </thead>


                                        <tbody class="text-center">
                                            @foreach ($diagnosisTests as $diagnosisTest)
                                                <tr>
                                                    <td>{{ $diagnosisTest->report_number }}</td>
                                                    <td>{{ $diagnosisTest['patient']['name'] }}</td>
                                                    <td>{{ $diagnosisTest['doctor']['name'] }}</td>
                                                    <td>{{ $diagnosisTest['diagnosis']['new_diagnosis_category'] }}</td>
                                                    <td>{{ $diagnosisTest->created_at }}</td>
                                                    <td>
                                                        <button type="button" value={{ $diagnosisTest->id }}
                                                            class="btn btn-success editBtn btn-sm"><i
                                                                class="fa fa-pencil-alt"></i></button>
                                                        <a href="{{ route('delete.diagnosisTest', $diagnosisTest->id) }}"
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
                </div>
            </div> <!-- end col -->
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            //for add
              // for adding data using ajax
              $(document).on('click', '.add_diagnosis_category', function(e) {
                e.preventDefault();
                $(this).text('Sending..');
                var data = {
                    'new_diagnosis_category': $('.new_diagnosis_category').val(),
                    'description': $('.description').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/Diagnosis/store",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#error_diagnosis_category').text(response.errors.new_diagnosis_category);
                            $('#error_description').text(response.errors.description);

                            $('.add_diagnosis_category').text('Save');
                        } else {
                            $('#addModal').find('input').val('');
                            $('.add_diagnosis_category').text('Save');
                            $('#addModal').modal('hide');
                            toastr.success(response.message);
                            // fetchstudent();
                            location.reload();
                        }
                    }
                });
            });
            //for add
            $(document).on('click', '.editBtn', function() {
                var diagnosis_id = $(this).val();
                // alert(diagnosis_id);
                $('#EditDiagnosis').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/Diagnsosis/edit-Diagnosis-test/" + diagnosis_id,
                    success: function(response) {
                        // console.log(response.diagnosisTests);
                        $('#diagnosis_id').val(response.diagnosisTests.id);
                        $('#patient_id').val(response.diagnosisTests.patient_id);
                        $('#doctor_id').val(response.diagnosisTests.doctor_id);
                        $('#diagnosis_test_id').val(response.diagnosisTests
                            .diagnosis_category_id);
                        $('#report_number').val(response.diagnosisTests.report_number);
                        $('#age').val(response.diagnosisTests.age);
                        $('#height').val(response.diagnosisTests.height);
                        $('#weight').val(response.diagnosisTests.weight);
                        $('#glucose').val(response.diagnosisTests.average_glucose);
                        $('#urine').val(response.diagnosisTests.urine_sugar);
                        $('#blood_pressure').val(response.diagnosisTests.blood_pressure);
                        $('#diabetis').val(response.diagnosisTests.diabetes);
                        $('#cholestrol').val(response.diagnosisTests.cholesterol);
                    }
                })
            });
        });
    </script>
@endsection
