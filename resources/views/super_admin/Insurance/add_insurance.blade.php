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
    <form id="AddEmployeeFORM">
        <div class="container-full topBar">

            <div class="row">

                <div class="col-12 w-70 px-5">
                    <div class="card cardcheck ">
                        <div class="card-body">
                            <div class="row px-5 py-5">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <label>Patient id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="patient_id"
                                                    placeholder="Enter first name" class="patient_id" id="patient_name"
                                                    placeholder="Enter Patient id">
                                                <span id="error_patient_id" class="errorColor"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <label>Patient id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="patient_id"
                                                    placeholder="Enter first name" class="patient_id" id="patient_name"
                                                    placeholder="Enter Patient id">
                                                <span id="error_patient_id" class="errorColor"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <label>Patient id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="patient_id"
                                                    placeholder="Enter first name" class="patient_id" id="patient_name"
                                                    placeholder="Enter Patient id">
                                                <span id="error_patient_id" class="errorColor"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <label>Patient id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="patient_id"
                                                    placeholder="Enter first name" class="patient_id" id="patient_name"
                                                    placeholder="Enter Patient id">
                                                <span id="error_patient_id" class="errorColor"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <label>Patient id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="patient_id"
                                                    placeholder="Enter first name" class="patient_id" id="patient_name"
                                                    placeholder="Enter Patient id">
                                                <span id="error_patient_id" class="errorColor"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <label>Patient id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="patient_id"
                                                    placeholder="Enter first name" class="patient_id" id="patient_name"
                                                    placeholder="Enter Patient id">
                                                <span id="error_patient_id" class="errorColor"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <label>Patient id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="patient_id"
                                                    placeholder="Enter first name" class="patient_id" id="patient_name"
                                                    placeholder="Enter Patient id">
                                                <span id="error_patient_id" class="errorColor"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <label>Patient id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="patient_id"
                                                    placeholder="Enter first name" class="patient_id" id="patient_name"
                                                    placeholder="Enter Patient id">
                                                <span id="error_patient_id" class="errorColor"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <label>Patient id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="patient_id"
                                                    placeholder="Enter first name" class="patient_id" id="patient_name"
                                                    placeholder="Enter Patient id">
                                                <span id="error_patient_id" class="errorColor"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div>
                                        <div class="row mx-1 py-2" style="background-color: #a5c9c6;">
                                            <div class="col-md-3" style="width: 20%;">
                                                <label>Disease Name</label>

                                            </div>
                                            <div class="col-md-3" style="width: 20%;">
                                                <label>Disease Charge</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="medicine_containers">
                                        <div class="single_content">
                                            <div class="row my-3 ">
                                                <div class="col-md-3" style="width: 20%;">
                                                    <input type="text" name="disease_name[]" placeholder="Medicine Name"
                                                        class="form-control">
                                                    <span
                                                        class="text-danger medicine_name_errors medicine_name_error_0"></span>
                                                </div>

                                                <div class="col-md-3" style="width: 20%;">
                                                    <input type="text" name="disease_charge[]" placeholder="Medicine Type"
                                                        class="form-control">
                                                    <span
                                                        class="text-danger medicine_type_errors medicine_type_error_0"></span>
                                                </div>
                                                <div class="col-md-2" style="width: 10%;">
                                                    <button type="button"
                                                        class="btn btn-success btn-sm add_medicine_button">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        {{-- </div> --}}
        </div>

    </form>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // for adding data using ajax
        // for adding patient information
        $("#AddEmployeeFORM").on('submit', function(event) {
            event.preventDefault();
            let patient_id = $("#patient_id").val();
            let others = $("#others").val();

            let formData = new FormData($('#AddEmployeeFORM')[0]);
            axios.post('/Prescription/casestudy/store', formData)
                .then(response => {
                    toastr.success(response.message);
                    document.location.href = '/Prescription/casestudy/view'
                }).catch(error => {
                    console.log(error.response.data.errors);
                    console.log(error.response);
                    if (error.response.status == 422) {
                        $('#error_patient_id').text(error.response.data.errors.patient_id[0]);

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
                                <input type="text" name="disease_name[]" placeholder="Medicine Name" class="form-control">
                                <span class="text-danger medicine_name_errors medicine_name_error_${index}"></span>
                            </div>
                            <div class="col-md-3" style="width: 20%;">
                                <input type="text"  name="disease_charge[]" placeholder="Medicine Type" class="form-control">
                                <span class="text-danger medicine_type_errors medicine_type_error_${index}"></span>
                            </div>
                            <div class="col-md-2" style="width: 10%;">
                                <button type="button" class="btn btn-danger btn-sm remove_medicine_item">remove</button>
                            </div>
                        </div>`;
            singleItem.innerHTML = html;
            return singleItem;
        }
    </script>

@endsection
