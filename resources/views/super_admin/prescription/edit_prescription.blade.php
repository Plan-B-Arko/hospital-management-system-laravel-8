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
    <form id="EditPrescription">
        @csrf
        {{-- <input type="hidden" name="prescription_id" id="prescription_id"> --}}
        <div class="container-full topBar">

            <div class="row">

                <div class="col-12">
                    <div class="card cardcheck">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 rowmargin">
                                    <div class="row ">
                                        <input type="text" class="form-control patient_id" name="patient_id"
                                            value="{{ $prescription->patient_id }}" placeholder="Patient Id">
                                        <span id="error_patient_id" class="errorColor"></span>
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control patient_name" name="patient_name"
                                            placeholder="Patient Name" id="patient_name"
                                            value="{{ $prescription->patient_name }}">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control sex" name="sex" id="sex" placeholder="Sex"
                                            value="{{ $prescription->sex }}">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control dob" name="dob" id="dob"
                                            placeholder="Date Of Birth" value="{{ $prescription->dob }}">
                                    </div>

                                </div>
                                <div class="col-md-4 rowmargin">

                                    <div class="row ">
                                        <input type="text" class="form-control weight" name="weight" id="weight"
                                            placeholder="Weight" value="{{ $prescription->weight }}">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control blood_pressure" name="blood_pressure"
                                            id="sufferer_blood_pressuree" id="blood_pressure" placeholder="Blood Pressure"
                                            value="{{ $prescription->blood_pressure }}">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control reference" name="reference" id="reference"
                                            placeholder="Reference" value="{{ $prescription->reference }}">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Type</label><br>
                                            <input class="form-check-input gender1" type="radio" name="type" value="New"
                                                {{ $prescription->type == 'New' ? 'checked' : '' }}>New
                                            &nbsp;
                                            <input class="form-check-input gender1" type="radio" name="type" value="Old"
                                                {{ $prescription->type == 'Old' ? 'checked' : '' }}>Old
                                            <span id="error_gender" class="errorColor"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4 rowmargin">
                                    <div class="row ">
                                        <input type="text" class="form-control" name="appointment_id" value="ABC1234"
                                            name="appointment_id" id="appointment_id" placeholder="Appointment Id"
                                            value="{{ $prescription->appointment_id }}">
                                    </div>

                                    <div class="row">
                                        <input type="date" class="form-control" name="date" id="date" placeholder="Date"
                                            value="20/7/21" value="{{ $prescription->date }}">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control" name="hospital_name" id="hospital_name"
                                            value="Demo Hospital Limited" placeholder="Hospital Name"
                                            value="{{ $prescription->hospital_name }}">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control" name="address" placeholder="Address"
                                            id="address" value="{{ $prescription->address }}">
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <label></label>
                                    <textarea class=" form-control" name="cheif_complain" id="cheif_complain"
                                        placeholder="Cheif Complain"
                                        value="">{{ $prescription->cheif_complain }}</textarea>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label>Insurance</label>
                                        <select name="insurance" id="insurance" class="form-control">
                                            <option value="{{ $prescription->insurance }}" selected="" disabled="">Select
                                                Insurance
                                            </option>
                                            <option value="IFIC Insurance">IFIC Insurance</option>
                                            <option value="BUPA">BUPA</option>
                                            <option value="HEALTH">HEALTH</option>
                                            <option value="TEST12121">TEST12121</option>
                                            <option value="TABARAK">TABARAK</option>
                                        </select>

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
                                {{-- <div class="single_content">
                                    <div class="row my-3">
                                        <div class="col-md-3" style="width: 20%;">
                                            <input type="text" name="medicine_name[]"
                                                value="{{ $patient->medicine_name }}" placeholder=" Medicine Name"
                                                class="form-control">
                                            <span class="text-danger medicine_name_errors medicine_name_error_0"></span>
                                        </div>

                                        <div class="col-md-3" style="width: 20%;">
                                            <input type="text" name="medicine_type[]"
                                                value="{{ $patient->medicine_type }}" placeholder=" Medicine Type"
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
                                </div> --}}
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
                                {{-- <div class="single_diagnosis">
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
                                </div> --}}
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
                                value="{{ $prescription->visiting_fees }}" placeholder="Visiting Fees">
                            <span id="error_visiting_fees" class="errorColor"></span>
                        </div>

                        <div class="row rowmargin">
                            <input type="text" class="form-control" name="patient_notes" placeholder="patient_notes"
                                value="{{ $prescription->patient_notes }}" id="patient_notes">
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
    {{-- for medicine --}}
    {{-- for edit --}}


    {{-- //start of medicine container --}}
    <script>
        $(document).ready(function() {
            getPrescriptionMedicineForEdit()
        })

        function setMedicineButton() {
            const add_medicine_button = document.querySelector('.add_medicine_button');
            add_medicine_button.addEventListener('click', function(event) {
                const single_content = document.querySelectorAll('.single_content');
                const index = single_content.length;
                addItemInMedicineContainer(index);
            });
        }

        async function getPrescriptionMedicineForEdit() {
            let medicinePrescriptionsList = [];
            const {
                data: {
                    medicinePrescriptions
                }
            } = await axios.get(`/Prescription/prescriptionMedicine/{{ $prescription->id ?? 0 }}`);
            medicinePrescriptionsList = medicinePrescriptions
            addMedicinesToForm(medicinePrescriptionsList)
        }

        function addMedicineButtonForFirstTimeIfDataNotFound() {
            const medicine_containers = document.querySelector('#medicine_containers');
            const index = 0;
            const single_content = document.createElement('div');
            single_content.classList.add('single_content');
            let html = `<div class="row my-3">
                            <div class="col-md-3" style="width: 20%;" >
                                <input type="text" name="medicine_name[]"  placeholder="Medicine Name" class="form-control">
                                <span class="text-danger medicine_name_errors medicine_name_error_${index}"></span>
                            </div>
                            <div class="col-md-3" style="width: 20%;">
                                <input type="text"  name="medicine_type[]"  placeholder="Medicine Type" class="form-control">
                                <span class="text-danger medicine_type_errors medicine_type_error_${index}"></span>
                            </div>
                            <div class="col-md-2" style="width: 30%;">

                                <textarea class="ckeditor form-control" name="medicine_instruction[]"  placeholder="Instruction"></textarea>
                                <span class="text-danger instruction_name_errors instruction_error_${index}"></span>
                            </div>
                            <div class="col-md-2" style="width: 10%;">
                                <input type="number" name="days[]"  placeholder="Days" class="form-control">
                                <span class="text-danger mdays_errors MDays_error_${index}"></span>
                            </div>
                            <div class="col-md-2" style="width: 10%;">
                                 <button type="button" class="btn btn-sm add_medicine_button btn-success">Add</button>
                            </div>
                        </div>`;
            single_content.innerHTML = html;
            medicine_containers.appendChild(single_content)
            //set medicine buttons
            setMedicineButton();

        }

        function addMedicinesToForm(items) {
            console.log(items);
            if (items?.length == 0) {
                setMedicineButton();
            } else {
                items.forEach((item, index) => {
                    addItemInMedicineContainerForEdit(item, index)
                });
            }
            setMedicineButton();
        }

        function addItemInMedicineContainerForEdit(item, index) {
            // console.log(item);
            const medicine_containers = document.querySelector('#medicine_containers');
            const single_content = document.createElement('div');
            single_content.classList.add('single_content');
            // dsnjhdsf
            let html = `<div class="row">
                            <div class="col-md-3" style="width: 20%;" >
                                <input type="text" name="medicine_name[]" value="${item.medicine_name}" placeholder="Medicine Name" class="form-control">
                                <span class="text-danger medicine_name_errors medicine_name_error_${index}"></span>
                            </div>
                            <div class="col-md-3" style="width: 20%;">
                                <input type="text"  name="medicine_type[]" value="${item.medicine_type}" placeholder="Medicine Type" class="form-control">
                                <span class="text-danger medicine_type_errors medicine_type_error_${index}"></span>
                            </div>
                            <div class="col-md-2" style="width: 30%;">

                                <textarea class="ckeditor form-control" name="medicine_instruction[]"  placeholder="Medicine Instruction">${item.medicine_instruction}</textarea>
                                <span class="text-danger instruction_name_errors instruction_error_${index}"></span>
                            </div>
                            <div class="col-md-2" style="width: 10%;">
                                <input type="number" name="days[]" value="${item.days}" placeholder="Days" class="form-control">
                                <span class="text-danger mdays_errors MDays_error_${index}"></span>
                            </div>
                            <div class="col-md-2" style="width: 10%;">
                    <button type="button" class="btn btn-sm ${index === 0 ? 'add_medicine_button btn-success ':'removeItemEdit  btn-danger'} ">${index === 0 ? 'Add':'remove' }</button>
                            </div>
                        </div>`;
            // sjfdds
            single_content.innerHTML = html;
            medicine_containers.appendChild(single_content);
        }

        function addItemInMedicineContainer(index) {
            const medicine_containers = document.querySelector('#medicine_containers')
            const single_content = document.createElement('div');
            single_content.classList.add('single_content');
            // dsnjhdsf
            let html = `<div class="row">
                            <div class="col-md-3" style="width: 20%;" >
                                <input type="text" name="medicine_name[]"  placeholder="Medicine Name" class="form-control">
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
                                <input type="number" name="days[]"  placeholder="Days" class="form-control">
                                <span class="text-danger mdays_errors MDays_error_${index}"></span>
                            </div>
                            <div class="col-md-2" style="width: 10%;">
                    <button type="button" class="btn btn-sm ${index === 0 ? 'addeditexpense btn-success ':'removeItemEdit  btn-danger'} ">${index === 0 ? 'Add':'remove' }</button>
                            </div>
                        </div>`;
            // sjfdds
            single_content.innerHTML = html;
            medicine_containers.appendChild(single_content);
        }
        // lastedit
        $(document).on('click', '.removeItemEdit', function(event) {
            const medicine_containers = document.querySelector('#medicine_containers')
            console.log('this is running')
            let parentElement = event.target.parentElement.parentElement.parentElement;
            console.log(parentElement);
            if (parentElement && parentElement.classList.contains('single_content')) {
                medicine_containers.removeChild(parentElement);
            }
        })
        // lastedit
        // end of medicinecontainer
    </script>
    {{-- end of medicine container --}}

    {{-- for diagnosis --}}

    <script>
        // start of diagonosis container
        $(document).ready(function() {
            getPrescriptionDiagonosisForEdit()
        })

        async function getPrescriptionDiagonosisForEdit() {
            let diagonosisPrescriptionsList = [];
            const {
                data: {
                    diagonosisPrescriptions
                }
            } = await axios.get(`/Prescription/diagonosis/{{ $prescription->id ?? 0 }}`);
            addDiagonosisForm(diagonosisPrescriptions)

        }

        function addDiagonosisForm(items) {
            if (items.length === 0) {
                addDiagonosisButtonForFirstTimeIfDataNotFound();
            } else {
                items.forEach((item, index) => {
                    addItemInDiagonosisContainerForEdit(item, index)
                });
            }
            setDiagonosisButton();
        }


        function addDiagonosisButtonForFirstTimeIfDataNotFound() {
            const diagnosis_containers = document.querySelector('#diagnosis_containers');
            const index = 0;
            const single_diagnosis = document.createElement('div');
            single_diagnosis.classList.add('single_diagnosis');
            let html = `<div class="row my-3">
                            <div class="col-md-3" style="width: 20%;" >
                                <input type="text" name="diagnosis[]"  placeholder="Diagnosis Name" class="form-control">
                                <span class="text-danger diagnosis_errors diagnosis_error_${index}"></span>
                            </div>
                            <div class="col-md-2" style="width: 30%;">

                                <textarea class="ckeditor form-control" name="instruction[]"  placeholder="Instruction"></textarea>
                                <span class="text-danger instruction_name_errors instruction_error_${index}"></span>
                            </div>
                            <div class="col-md-2" style="width: 10%;">
                                 <button type="button" class="btn btn-sm add_diagonosis_button btn-success">Add</button>
                            </div>
                        </div>`;


            single_diagnosis.innerHTML = html;
            diagnosis_containers.appendChild(single_diagnosis)
            //set medicine button
        }

        function setDiagonosisButton() {
            const add_diagonosis_button = document.querySelector('.add_diagonosis_button');
            if (add_diagonosis_button) {
                add_diagonosis_button.addEventListener('click', function(event) {
                    const single_diagnosis = document.querySelectorAll('.single_diagnosis');
                    const index = single_diagnosis.length;
                    addItemInDiagonosisContainer(index);
                });
            }

        }

        function addItemInDiagonosisContainerForEdit(item, index) {
            console.log(item);
            const diagnosis_containers = document.querySelector('#diagnosis_containers')
            const single_diagnosis = document.createElement('div');
            single_diagnosis.classList.add('single_diagnosis');
            // dsnjhdsf
            let html = ` <div class="row my-3">
                            <div class="col-md-3" style="width: 20%;" >
                                <input type="text" name="diagnosis[]" value="${item.diagnosis}"  placeholder="Medicine Name" class="form-control">
                                <span class="text-danger diagnosis_errors diagnosis_error_${index}"></span>
                            </div>
                            <div class="col-md-3" style="width: 20%;">
                             <textarea class="ckeditor form-control" name="instruction[]"  placeholder="Medicine Instruction">${item.instruction}</textarea>
                                <span class="text-danger instruction_name_errors instruction_error_${index}"></span>
                            </div>
                            <div class="col-md-2" style="width: 10%;">
                                  <button type="button" class="btn btn-sm ${index === 0 ? 'add_diagonosis_button btn-success ':'removeDiagonosis  btn-danger'} ">${index === 0 ? 'Add':'remove' }</button>
                            </div>
                        </div>`;

            // sjfdds
            single_diagnosis.innerHTML = html;
            diagnosis_containers.appendChild(single_diagnosis);
        }

        function addItemInDiagonosisContainer(index) {
            const diagnosis_containers = document.querySelector('#diagnosis_containers')
            const single_diagnosis = document.createElement('div');
            single_diagnosis.classList.add('single_diagnosis');
            // dsnjhdsf
            let html = `<div class="row my-3">
                            <div class="col-md-3" style="width: 20%;" >
                                <input type="text" name="diagnosis[]"  placeholder="Diagnosis" class="form-control">
                                <span class="text-danger medicine_name_errors medicine_name_error_${index}"></span>
                            </div>
                            <div class="col-md-3" style="width: 30%;">
                                <textarea class="ckeditor form-control" name="instruction[]" placeholder="Instruction"></textarea>
                                <span class="text-danger instruction_name_errors instruction_error_${index}"></span>
                            </div>
                            <div class="col-md-2" style="width: 10%;">
                                <button type="button" class="btn btn-sm ${index === 0 ? 'add_diagonosis_button btn-success ':'removeDiagonosis btn-danger'} ">${index === 0 ? 'Add':'remove' }</button>
                            </div>
                        </div>`;
            // sjfdds
            single_diagnosis.innerHTML = html;
            diagnosis_containers.appendChild(single_diagnosis);
        }

        // lastedit
        $(document).on('click', '.removeDiagonosis', function(event) {
            const diagnosis_containers = document.querySelector('#diagnosis_containers')
            let parentElement = event.target.parentElement.parentElement.parentElement;
            console.log(parentElement)
            if (parentElement && parentElement.classList.contains('single_diagnosis')) {
                diagnosis_containers.removeChild(parentElement);
            }
        })
        // lastedit
    </script>

    {{-- for update --}}
    {{-- <script>
        // for adding data using ajax
        // for updating patient information
        $(document).on('submit', '#EditPrescription', function(e) {
            e.preventDefault();
            let formData = new FormData($('#EditPrescription')[0]);
            $.ajax({
                type: "POST",
                url: "/Prescription/update",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 400) {
                        $('#error_patient_id').text(response.errors.patient_id);
                        // $('#error_lname').text(response.errors.last_name1);
                        // $('#error_emailedit').text(response.errors.email);
                        // $('#error_mobileedit').text(response.errors.mobile);
                        // $('#error_address1edit').text(response.errors.address1);
                        // $('#error_statusedit').text(response.errors.sex);
                    } else if (response.status == 200) {
                        // document.location.href = '/doctor/all'
                        toastr.success(response.message);
                    }
                }
            });
        });
    </script> --}}


    <script>
        window.addEventListener('DOMContentLoaded', function(event) {
            let EditPrescription = document.querySelector('#EditPrescription');
            console.log(EditPrescription);
            EditPrescription.addEventListener('submit', function(event) {
                event.preventDefault();
                let formData = new FormData(event.target);
                axios.post('/Prescription/update/{{ $prescription->id }}', formData)
                    .then(response => {
                        console.log(response);
                        toastr.success(response.data.message);
                    })
                    .catch(error => {
                        console.log(error);
                    })
            })
        })
    </script>
    {{-- <script>
        / update
        $(document).on('submit', '#UpdateExpenseFORM', function(e) {
            e.preventDefault();
            var expense_id = $('#edit_expense_id').val();
            let EditFormData = new FormData($('#UpdateExpenseFORM')[0]);
            // Axios Update
            axios.post('/expense/update/' + expense_id, EditFormData)
                .then(response => {
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true
                    }
                    toastr.success(response.data.message);
                    destroyDataTable();
                    ('#expense_table_body').html("")
                    ExpenseView();
                    $('#EditExpenseModal').modal('hide');
                })
                .catch(error => {
                    console.log(error);
                    if (error?.response?.status === 422) {
                        let errors = error.response.data.errors;
                        setErrorinExpenseAddForm(errors)
                    }
                })
        }); //update end
    </script> --}}

@endsection
