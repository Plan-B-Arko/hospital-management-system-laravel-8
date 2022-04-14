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

        #blah {
            width: 150px;
            height: 150px;
            border-radius: 50%;
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
            <div class="row my-5">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="card">
                        <div class="card-body">

                            <div class="row my-5 mx-5">
                                {{-- start --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>OUTLATE</label>
                                        <select name="outlet_id" class="form-control">
                                            <option value="" selected="" disabled="">Outlet Id
                                            </option>
                                            @foreach ($outlets as $outlet)
                                                <option value="{{ $outlet->id }}">{{ $outlet->outlet_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span id="error_outlate_id" class="errorColor"></span>
                                    </div>

                                </div>
                                {{-- end --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="Enter first name"
                                            name="first_name1">
                                        <span id="error_fname" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Enter last name"
                                            name="last_name1">
                                        <span id="error_lname" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Enter your email"
                                            name="email">
                                        <span id="error_email" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Enter your password"
                                            name="password">
                                        <span id="error_password" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" class="form-control" placeholder="Enter your designation"
                                            name="designation">
                                        <span id="error_designation" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doc Dept</label>
                                        <select name="doc_dept" class="form-control">
                                            <option value="" selected="" disabled="">Doctor department
                                            </option>
                                            @foreach ($doctorDepts as $doctorDept)
                                                <option value="{{ $doctorDept->id }}">{{ $doctorDept->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span id="error_doc_dept" class="errorColor"></span>
                                    </div>

                                </div>
                                <hr>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" placeholder="Enter phone number"
                                            name="phone">
                                        <span id="error_phone" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" class="form-control" placeholder="Enter mobile number"
                                            name="mobile">
                                        <span id="error_mobile" class="errorColor"></span>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label><br>
                                        <input class="form-check-input gender1" type="radio" name="sex" value="male">Male
                                        <input class="form-check-input gender1" type="radio" name="sex"
                                            value="female">Female<br>
                                        <span id="error_gender" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address1</label>
                                            <input type="text" class="form-control" placeholder="Enter your address"
                                                name="address1">
                                            <span id="error_address1" class="errorColor"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address2</label>
                                            <input type="text" class="form-control" placeholder="Enter your address"
                                                name="address12">
                                            <span id="error_address12" class="errorColor"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control" placeholder="Enter your address"
                                                name="city">
                                            <span id="error_city" class="errorColor"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Zip</label>
                                            <input type="text" class="form-control" placeholder="Enter your address"
                                                name="zip">
                                            <span id="error_zip" class="errorColor"></span>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>DOB</label>
                                        <input type="date" class="form-control" placeholder="Enter your birth date"
                                            name="dob">
                                        <span id="error_dob" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input type="text" class="form-control" placeholder="Enter your age" name="age">
                                        <span id="error_age" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Profile</label>
                                        <input type="text" class="form-control" placeholder="Enter your speciality"
                                            name="profile">
                                        <span id="error_profile" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Social Link</label>
                                        <input type="text" class="form-control" placeholder="Enter doctor social link"
                                            name="social_link">
                                        <span id="error_sociallink" class="errorColor"></span>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Blood Group</label>
                                        <select name="blood_group" class="form-control">
                                            <option value="" selected="" disabled="">Select Blood group
                                            </option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                        <span id="error_blood_group" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Image</label>
                                                <input type="file" class="form-control" placeholder="Enter your image"
                                                    name="image" id="imgInp">
                                            </div>
                                            <img class="col-6" id="blah"
                                                src="{{ asset('backend') }}/assets/images/avatar.png" alt="your image" />
                                        </div>
                                        <span id="error_image" class="errorColor"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Career Title</label>
                                        <input type="text" class="form-control" placeholder="Enter career title"
                                            name="career_title">
                                        <span id="error_career_title" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Short Biography</label>
                                        <textarea class="ckeditor form-control" name="short_biography"></textarea>
                                        <span id="error_short_biography" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Specialist</label>
                                        <input type="text" class="form-control" placeholder="Enter career title"
                                            name="specialist">
                                        <span id="error_specialist" class="errorColor"></span>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Long Biography</label>

                                        <textarea class="ckeditor form-control" name="long_biography"></textarea>
                                        <span id="error_long_biography" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <label>Education Degree</label>
                                        <div class="col-md-12">
                                            <div class="jq">
                                                <textarea class="ckeditor form-control" name="education_degree"></textarea>
                                                <span id="error_education_degree" class="errorColor"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input status1" type="radio" name="status"
                                                id="inlineRadio1" value="Active">
                                            <label class="form-check-label" for="inlineRadio1">Active</label>

                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input status1" type="radio" name="status"
                                                id="inlineRadio2" value="InActive">
                                            <label class="form-check-label" for="inlineRadio2">InActive</label>
                                        </div>
                                        <span id="error_status" class="errorColor"></span>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input status1" type="radio" name="status"
                                                id="inlineRadio1" value="Active">
                                            <label class="form-check-label" for="inlineRadio1">Active</label>

                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input status1" type="radio" name="status"
                                                id="inlineRadio2" value="InActive">
                                            <label class="form-check-label" for="inlineRadio2">InActive</label>
                                        </div>
                                        <span id="error_status" class="errorColor"></span>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    {{-- for language --}}
                    <div class="card cardcenter">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="table-responsive">
                                        @csrf

                                        <table class="table " id="user_table">
                                            <thead>
                                                <tr>

                                                    <th width="35%">Language</th>
                                                    <th width="35%">Rating</th>
                                                    <th width="30%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    {{-- <td colspan="2" align="right">&nbsp;</td> --}}
                                                    <td>
                                                        @csrf
                                                        {{-- <input type="submit" name="save" id="save" class="btn btn-primary"
                                                            value="Save" /> --}}
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="wrapper">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-1"></div> --}}
            </div>
        </div>
    </form>

@endsection
@section('scripts')

    {{-- for ckeditor --}}
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        $('textarea').ckeditor(); // if class is prefered.
    </script>

    <script>

    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // for adding data using ajax
        // for adding patient information
        $("#AddEmployeeFORM").on('submit', function(event) {
            event.preventDefault();
            // let patient_id = $("#patient_id").val();
            let first_name = $("#first_name").val();
            let last_name = $("#last_name").val();
            let email = $("#email").val();
            let password = $("#password").val();
            let address1 = $("#address1").val();
            let mobile = $("#mobile").val();
            let sex = $("#sex").val();
            let formData = new FormData($('#AddEmployeeFORM')[0]);
            axios.post('/doctor/store', formData)
                .then(response => {
                    toastr.success(response.message);
                    // location.reload();
                    document.location.href = '/doctor/all'
                }).catch(error => {
                    console.log(error.response.data.errors);
                    console.log(error.response);
                    if (error.response.status == 422) {
                        $('#error_fname').text(error.response.data.errors.first_name1[0]);
                        $('#error_lname').text(error.response.data.errors.last_name1[0]);
                        $('#error_email').text(error.response.data.errors.email[0]);
                        $('#error_password').text(error.response.data.errors.password[0]);
                        // $('#error_designation').text(error.response.data.errors.designation[0]);
                        // $('#error_doc_dept').text(error.response.data.errors.doc_dept[0]);
                        // $('#error_phone').text(error.response.data.errors.phone[0]);
                        $('#error_mobile').text(error.response.data.errors.mobile[0]);
                        $('#error_gender').text(error.response.data.errors.sex[0]);
                        $('#error_address1').text(error.response.data.errors.address1[0]);
                        // $('#error_address12').text(error.response.data.errors.address12[0]);
                        // $('#error_city').text(error.response.data.errors.city[0]);
                        // $('#error_zip').text(error.response.data.errors.zip[0]);
                        // $('#error_dob').text(error.response.data.errors.dob[0]);
                        // $('#error_age').text(error.response.data.errors.age[0]);
                        // $('#error_profile').text(error.response.data.errors.profile[0]);
                        // $('#error_sociallink').text(error.response.data.errors.social_link[0]);
                        // $('#error_blood_group').text(error.response.data.errors.blood_group[0]);
                        // $('#error_image').text(error.response.data.errors.image[0]);
                        // $('#error_career_title').text(error.response.data.errors.career_title[0]);
                        // $('#error_short_biography').text(error.response.data.errors.short_biography[0]);
                        // $('#error_specialist').text(error.response.data.errors.specialist[0]);
                        // $('#error_long_biography').text(error.response.data.errors.long_biography[0]);
                        // $('#error_education_degree').text(error.response.data.errors.education_degree[0]);
                        // $('#error_status').text(error.response.data.errors.status[0]);


                    }
                })

        })
    </script>
    <script>
        $(document).ready(function() {
            var count = 1;
            dynamic_field(count);

            function dynamic_field(number) {
                html = '<tr>';
                html += '<td><input type="text" name="first_name[]" id="first_name" class="form-control" /></td>';
                html += '<td><input type="text" name="last_name[]" id="last_name" class="form-control" /></td>';
                if (number > 1) {
                    html +=
                        '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                    $('tbody').append(html);
                } else {
                    html +=
                        '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                    $('tbody').html(html);
                }
            }

            $(document).on('click', '#add', function() {
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '.remove', function() {
                count--;
                $(this).closest("tr").remove();
            });
        });
    </script>
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {

                blah.src = URL.createObjectURL(file)
            }
        }
    </script>

@endsection
