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

        .rowmargin .row {
            margin: 1rem 1rem 0 0;
        }

        .mb {
            margin-bottom: 50px;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@endsection

@section('super-admin-content')
    <form id="AddEmployeeFORM">
        @csrf
        <div class="container-full topBar">

            <div class="row">

                <div class="col-12">
                    <div class="card cardcheck">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 rowmargin">
                                    <div class="row ">
                                        <input type="text" class="form-control patient_id" name="patient_id" id="patient_id"
                                            placeholder="Patient Id">
                                        <span id="error_patient_id" class="errorColor"></span>
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control patient_name" name="patient_name"
                                            placeholder="Patient Name" id="patient_name">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control sex" name="sex" id="sex" placeholder="Sex">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control dob" name="dob" id="dob"
                                            placeholder="Date Of Birth">
                                    </div>

                                </div>
                                <div class="col-md-4 rowmargin">

                                    <div class="row ">
                                        <input type="text" class="form-control weight" name="weight" id="weight"
                                            placeholder="Weight">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control blood_pressure" name="blood_pressure"
                                            id="sufferer_blood_pressuree" id="blood_pressure" placeholder="Blood Pressure">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control reference" name="reference" id="reference"
                                            placeholder="Reference">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Type</label><br>
                                            <input class="form-check-input gender1" type="radio" name="type" value="New"
                                                checked>New
                                            &nbsp;
                                            <input class="form-check-input gender1" type="radio" name="type" value="Old">Old
                                            <span id="error_gender" class="errorColor"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4 rowmargin">
                                    <div class="row ">
                                        <input type="text" class="form-control" name="appointment_id" value="ABC1234"
                                            name="appointment_id" placeholder="Appointment Id">
                                    </div>

                                    <div class="row">
                                        <input type="date" class="form-control" name="date" placeholder="Date"
                                            value="2/7/2021">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control" name="hospital_name"
                                            value="Demo Hospital Limited" placeholder="Hospital Name">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control" name="address" placeholder="Address"
                                            value="House#25, 4th Floor, Mannan Plaza, Khilkhet, Dhaka-1229, Bangladesh.">
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <label></label>
                                    <textarea class="ckeditor form-control" name="cheif_complain"
                                        placeholder="Cheif Complain"></textarea>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label>Insurance</label>
                                        <select name="insurance" class="form-control">
                                            <option value="" selected="" disabled="">Select Insurance
                                            </option>
                                            <option value="IFIC Insurance">IFIC Insurance</option>
                                            <option value="BUPA">BUPA</option>
                                            <option value="HEALTH">HEALTH</option>
                                            <option value="TEST12121">TEST12121</option>
                                            <option value="TABARAK">TABARAK</option>
                                        </select>
                                        <span id="error_blood_group" class="errorColor"></span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <div class="card cardcenter">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            {{-- medicine part start --}}
                            <div>
                                <div class="row mx-1 py-2" style="background-color: #a5c9c6;">
                                    <div class="col-md-3" style="width: 20%;">
                                        <label>Medicine Name</label>

                                    </div>
                                    <div class="col-md-3" style="width: 20%;">
                                        <label>Medicine Type</label>
                                    </div>
                                    <div class="col-md-2" style="width: 30%;">
                                        <label>Instruction</label>
                                    </div>
                                    <div class="col-md-2" style="width: 20%;">
                                        <label> Days</label>
                                    </div>
                                    <div class="col-md-2" style="width: 10%;">
                                        <label> Action</label>
                                    </div>
                                </div>
                            </div>

                            <div id="medicine_containers">
                                <div class="single_content">
                                    <div class="row my-3 ">
                                        <div class="col-md-3" style="width: 20%;">
                                            <input type="text" name="medicine_name[]" placeholder="Medicine Name"
                                                class="form-control">
                                            <span class="text-danger medicine_name_errors medicine_name_error_0"></span>
                                        </div>

                                        <div class="col-md-3" style="width: 20%;">
                                            <input type="text" name="medicine_type[]" placeholder="Medicine Type"
                                                class="form-control">
                                            <span class="text-danger medicine_type_errors medicine_type_error_0"></span>
                                        </div>
                                        <div class="col-md-2" style="width: 30%;">
                                            <textarea class="ckeditor form-control" name="medicine_instruction[]"
                                                placeholder="Instruction"></textarea>
                                            <span class="text-danger instruction_name_errors instruction_error_0"></span>
                                        </div>
                                        <div class="col-md-2" style="width: 10%;">
                                            <input type="number" name="days[]" placeholder="Days" class="form-control">
                                            <span class="text-danger mdays_errors MDays_error_0"></span>
                                        </div>
                                        <div class="col-md-2" style="width: 10%;">
                                            <button type="button"
                                                class="btn btn-success btn-sm add_medicine_button">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- medicine part end --}}
                            {{-- diagnosis part start --}}
                            <hr>
                            <div>
                                <div class="row mx-1 py-2" style="background-color: #d6cec3;">
                                    <div class="col-md-3" style="width: 20%;">
                                        <label>Diagnosis</label>

                                    </div>
                                    <div class="col-md-3" style="width: 50%;">
                                        <label>Instruction</label>
                                    </div>
                                    <div class="col-md-2" style="width: 30%;">
                                        <label>Add/REmove</label>
                                    </div>
                                </div>
                            </div>

                            <div id="diagnosis_containers">
                                <div class="single_diagnosis">
                                    <div class="row my-3">
                                        <div class="col-md-3" style="width: 20%;">
                                            <input type="text" name="diagnosis[]" placeholder="Diagnosis"
                                                class="form-control">
                                            <span class="text-danger medicine_name_errors medicine_name_error_0"></span>
                                        </div>
                                        <div class="col-md-3" style="width: 50%;">
                                            <textarea class="ckeditor form-control" name="instruction[]"
                                                placeholder="Instruction"></textarea>
                                            <span class="text-danger medicine_type_errors medicine_type_error_0"></span>
                                        </div>
                                        <div class="col-md-2" style="width: 30%;">
                                            <button type="button"
                                                class="btn btn-success btn-sm add_diagnosis_button">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- diagnosis part end --}}

                    </div>
                </div>
            </div>
        </div>

        {{-- last data start --}}
        <div class="card cardcenter">
            <div class="card-body">
                <div class="row rowmargin mb">
                    <div class="col-md-4" style="width: 10%;">
                        <div class="row ">
                            <label>Visiting Fees</label>
                        </div>
                        <br>
                        <div class="row ">
                            <label>Patient Notes</label>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="row ">
                            <input type="text" class="form-control" name="visiting_fees" id="visiting_fees"
                                placeholder="Visiting Fees">
                            <span id="error_visiting_fees" class="errorColor"></span>
                        </div>

                        <div class="row rowmargin">
                            <input type="text" class="form-control" name="patient_notes" placeholder="patient_notes"
                                id="patient_notes">
                        </div>
                    </div>
                </div>
                <div class="wrapper mb">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
        {{-- last data end --}}
        </div>
        {{-- </div> --}}
        </div>

    </form>
@endsection
@section('scripts')
    <script>
        // details show when patient id given
        $('.patient_id').on('keyup', function() {
            var patient_id = $(this).val();
            if (patient_id) {
                $.ajax({
                    url: "/Prescription/patient/" + patient_id,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $('.patient_name').html('');
                        $('.patient_name').val(response.patients[0].name);
                        $('.sex').val(response.patients[0].sex);
                        $('.dob').val(response.patients[0].dob);
                        $('.weight').val(response.casestudy[0].weight);
                        $('.blood_pressure').val(response.casestudy[0].high_blood_pressure);
                        $('.reference').val(response.casestudy[0].reference);
                    },
                });
            } else {
                alert('danger');
            }
        });
    </script>
    {{-- for adding prescription --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // for adding data using ajax
        $("#AddEmployeeFORM").on('submit', function(event) {
            event.preventDefault();
            let patient_id = $("#patient_id").val();
            let formData = new FormData($('#AddEmployeeFORM')[0]);
            axios.post('/Prescription/store', formData)
                .then(response => {
                    toastr.success(response.message);
                    location.reload();
                    document.location.href = '/Prescription/view'
                }).catch(error => {
                    console.log(error.response.data.errors);
                    console.log(error.response);
                    if (error.response.status == 422) {
                        $('#error_patient_id').text(error.response.data.errors.patient_id[0]);
                        $('#error_visiting_fees').text(error.response.data.errors.visiting_fees[0]);

                    }
                })

        })
    </script>
    {{-- for medicine --}}
    <script>
        let medicine_containers = document.querySelector('#medicine_containers');
        let addNewItem = document.querySelector('.add_medicine_button');
        addNewItem.addEventListener('click', function(event) {
            const singleitems = document.querySelectorAll('.single_content');
            const index = singleitems.length;
            const html = addMedicineItems(index);
            medicine_containers.appendChild(html);
        });

        $(document).on('click', '.remove_medicine_item', function(event) {
            console.log('this is running')
            let parentElement = event.target.parentElement.parentElement.parentElement;
            console.log(parentElement)
            if (parentElement && parentElement.classList.contains('single_content')) {
                medicine_containers.removeChild(parentElement);
            }
        })

        function addMedicineItems(index) {
            const singleItem = document.createElement('div');
            singleItem.classList.add('single_content');
            singleItem.classList.add('my-3')
            let html = `<div class="row">
                            <div class="col-md-3" style="width: 20%;" >
                                <input type="text" name="medicine_name[]" placeholder="Medicine Name" class="form-control">
                                <span class="text-danger medicine_name_errors medicine_name_error_${index}"></span>
                            </div>
                            <div class="col-md-3" style="width: 20%;">
                                <input type="text"  name="medicine_type[]" placeholder="Medicine Type" class="form-control">
                                <span class="text-danger medicine_type_errors medicine_type_error_${index}"></span>
                            </div>
                            <div class="col-md-2" style="width: 30%;">
                               
                                <textarea class="ckeditor form-control" name="medicine_instruction[]" placeholder="Instruction"></textarea>
                                <span class="text-danger instruction_name_errors instruction_error_${index}"></span>
                            </div>
                            <div class="col-md-2" style="width: 10%;">
                                <input type="number" name="days[]" placeholder="Days" class="form-control">
                                <span class="text-danger mdays_errors MDays_error_${index}"></span>
                            </div>
                            <div class="col-md-2" style="width: 10%;">
                                <button type="button" class="btn btn-danger btn-sm remove_medicine_item">remove</button>
                            </div>
                        </div>`;
            singleItem.innerHTML = html;
            return singleItem;
        }
    </script>
    {{-- for diagnosis --}}
    <script>
        let diagnosis_containers = document.querySelector('#diagnosis_containers');
        let addDiagonisItem = document.querySelector('.add_diagnosis_button');
        addDiagonisItem.addEventListener('click', function(event) {
            const singleitems = document.querySelectorAll('.single_diagnosis');
            const index = singleitems.length;
            const html = addDiagnosis(index);
            diagnosis_containers.appendChild(html);
        });

        $(document).on('click', '.remove_diagonosis_button', function(event) {
            console.log('this is running')
            let parentElement = event.target.parentElement.parentElement.parentElement;
            console.log(parentElement)
            if (parentElement && parentElement.classList.contains('single_diagnosis')) {
                diagnosis_containers.removeChild(parentElement);
            }
        })


        function addDiagnosis(index) {
            const singleItem = document.createElement('div');
            singleItem.classList.add('single_diagnosis');
            singleItem.classList.add('my-3')
            let html = `<div class="row my-3"  >
                            <div class="col-md-3" style="width: 20%;">
                                <input type="text" name="diagnosis[]" placeholder="Medicine Name"
                                    class="form-control">
                                <span class="text-danger medicine_name_errors medicine_name_error_0"></span>
                            </div>
                            <div class="col-md-3" style="width: 50%;" >
                                    <textarea class="ckeditor form-control" name="instruction[]"  placeholder="Instruction"></textarea>
                                <span class="text-danger medicine_type_errors medicine_type_error_0"></span>
                            </div>

                            <div class="col-md-2" style="width: 30%;" >
                                <button type="button"
                                    class="btn btn-danger btn-sm remove_diagonosis_button">remove</button>
                            </div>
                         </div>`;
            singleItem.innerHTML = html;
            return singleItem;
        }
    </script>

@endsection
