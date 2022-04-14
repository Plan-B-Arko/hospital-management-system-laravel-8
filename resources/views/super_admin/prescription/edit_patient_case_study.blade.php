@extends('layouts.admin_master')

@section('css')
    <style>
        .topBar {
            margin-top: 4rem;
        }

        .topBar {
            padding: 2rem;
        }

        .card {
            border: none;
            box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px !important;
            border: none !important;

        }

        .card .row .col-md-6,
        .card .row .col-md-12 {
            margin-bottom: 1rem;
        }

        .errorColor {
            color: red;
        }

        body {
            overflow-x: hidden;
        }

        .cardcheck {
            margin-top: 50px;
        }

        .wrapper {
            text-align: center;
        }

        .cardcenter {
            margin: 0 18%;
            margin-bottom: 5rem;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@endsection

@section('super-admin-content')
    <form id="UpdateEmployeeFORM">
        {{-- <input type="hidden" id="case_study_id" name="case_study_id"> --}}
        <input type="hidden" name="id" value="{{ $casestudy->id }}">
        <div class="container-full topBar">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="card cardcheck">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Patient id</label>
                                        <input type="text" class="form-control" placeholder="Enter first name"
                                            class="patient_id" placeholder="Enter Patient id"
                                            value="{{ $casestudy->patient_id }}" name="patient_id">
                                        <span id="error_patient_id" class="errorColor"></span>
                                        {{-- @error('brand_name')

                                        <strong style="color: red">{{ $message }}</strong>

                                    @enderror --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Food Allergies</label>
                                        <input type="text" class="form-control" name="food_allergies"
                                            placeholder="Enter Food Allergiis" value="{{ $casestudy->food_allergies }}"
                                            name="food_allergies">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tendency Bleed</label>
                                        <input type="text" class="form-control" name="tendency_bleed"
                                            placeholder="Enter Tendency Bleed" value="{{ $casestudy->tendency_bleed }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Heart Disease</label>
                                        <input type="text" class="form-control" name="heart_disease"
                                            placeholder="Enter Heart Disease" value="{{ $casestudy->heart_disease }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>High Blood Pressure</label>
                                        <input type="text" class="form-control" name="high_blood_pressure"
                                            placeholder="Enter High Blood Pressure"
                                            value="{{ $casestudy->high_blood_pressure }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Diabetic</label>
                                        <input type="text" class="form-control" name="diabetic"
                                            placeholder="Enter Diabetic" value="{{ $casestudy->diabetic }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Surgery</label>
                                        <input type="text" class="form-control" name="surgery" placeholder="Enter Surgery"
                                            value="{{ $casestudy->surgery }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Accident</label>
                                        <input type="text" class="form-control" name="accident"
                                            placeholder="Enter Accident" value="{{ $casestudy->accident }}">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-6">
                    <div class="card cardcheck">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Family Medical History</label>
                                        <input type="text" class="form-control" name="family_medical_history"
                                            placeholder="Enter Family Medical History"
                                            value="{{ $casestudy->family_medical_history }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Current Medication</label>
                                        <input type="text" class="form-control" name="current_medication"
                                            placeholder="Enter Current Medication"
                                            value="{{ $casestudy->current_medication }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Family pregnency</label>
                                        <input type="text" class="form-control" name="family_pregnency"
                                            placeholder="Enter Family pregnency"
                                            value="{{ $casestudy->family_pregnency }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Breast Feeding</label>
                                        <input type="text" class="form-control" name="breast_feeding"
                                            placeholder="Enter Breast Feeding" value="{{ $casestudy->tendency_bleed }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Health Insurance</label>
                                        <input type="text" class="form-control" name="health_insurance'"
                                            placeholder="Enter Health Insurance"
                                            value="{{ $casestudy->tendency_bleed }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Low Income</label>
                                        <input type="text" class="form-control" name="low_income"
                                            placeholder="Enter Low Income" value="{{ $casestudy->tendency_bleed }}">
                                        <span id="error_status" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reference</label>
                                        <input type="text" class="form-control" name="reference"
                                            placeholder="Enter Reference" value="{{ $casestudy->tendency_bleed }}">
                                        <span id="error_status" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label><span class="errorColor"> *</span><br>
                                        <input class="form-check-input " type="radio" class="status" value="Active"
                                            name="status" {{ $casestudy->status == 'Active' ? 'checked' : '' }}>Active
                                        <input class="form-check-input " type="radio" class="status"
                                            value="Inactive" name="status"
                                            {{ $casestudy->status == 'Inactive' ? 'checked' : '' }}>Inactive<br>
                                        <span id="error_status" class="errorColor"></span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="wrapper">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>

    </form>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.editBtn', function() {
                var case_study_id = $(this).val();
                // alert(patient_id);
                // $('#editModal').modal('show');
                //   dd(patient_id);
                $.ajax({
                    type: "GET",
                    url: "/Prescription/edit-patientCaseStudy/" + case_study_id,
                    success: function(response) {

                        $('#case_study_id').val(response.casestudy.id);
                        $('#patient_id').val(response.casestudy.patient_id);
                        $('#food_allergies').val(response.casestudy.food_allergies);
                        $('#tendency_bleed').val(response.casestudy.tendency_bleed);
                        $('#heart_disease').val(response.casestudy.heart_disease);
                        $('#high_blood_pressure').val(response.casestudy.high_blood_pressure);
                        $('#diabetic').val(response.casestudy.diabetic);
                        $('#surgery').val(response.casestudy.surgery);
                        $('#accident').val(response.casestudy.accident);
                        $('#family_medical_history').val(response.casestudy
                            .family_medical_history);
                        $('#current_medication').val(response.casestudy.current_medication);
                        $('#family_pregnency').val(response.casestudy.family_pregnency);
                        $('#breast_feeding').val(response.casestudy.breast_feeding);
                        $('#health_insurance').val(response.casestudy.health_insurance);
                        $('#low_income').val(response.casestudy.low_income);
                        $('#reference').val(response.casestudy.reference);
                        $('#status').val(response.casestudy.status);

                        // if (response.casestudy.status == 'Active') {
                        //     $('#editModal').find(':radio[name=gender1][value="male"]').prop(
                        //         'checked', true);
                        // } else {
                        //     $('#editModal').find(':radio[name=gender1][value="female"]').prop(
                        //         'checked', true);
                        // }
                    }
                })
            });


            $(document).on('submit', '#UpdateEmployeeFORM', function(e) {
                e.preventDefault();
                let formData = new FormData($('#UpdateEmployeeFORM')[0]);

                $.ajax({
                    type: "POST",
                    url: "/Prescription/casestudy/update",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 400) {
                            $('#error_patient_id').text(response.errors.patient_id);
                        } else if (response.status == 200) {

                            document.location.href = '/Prescription/casestudy/view'

                            toastr.success(response.message);
                        }
                    }
                });

            });
        });
    </script>

    <script>
        // for adding data using ajax
        // for adding patient information
        $("#AddEmployeeFORM").on('submit', function(event) {
            event.preventDefault();
            let patient_id = $("#patient_id").val();
            let others = $("#others").val();

            let formData = new FormData($('#AddEmployeeFORM')[0]);
            axios.post('/Prescription/store', formData)
                .then(response => {
                    toastr.success(response.message);
                    location.reload();
                }).catch(error => {
                    console.log(error.response.data.errors);
                    console.log(error.response);
                    if (error.response.status == 422) {
                        $('#error_patient_id').text(error.response.data.errors.patient_id[0]);

                    }
                })

        })
    </script>
@endsection
