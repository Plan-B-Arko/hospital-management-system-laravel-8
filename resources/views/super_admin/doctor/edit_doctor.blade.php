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

    <div class="container-full topBar">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <form id="UpdateEmployeeFORM" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $doctors->id }}">
                            <input type="hidden" name="old_image" value="{{ $doctors->image }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="Enter first name"
                                            name="first_name1" value="{{ $doctors->first_name1 }}">
                                        <span id="error_fname" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Enter last name"
                                            name="last_name1" value="{{ $doctors->last_name1 }}">
                                        <span id="error_lname" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Enter your email"
                                            name="email" value="{{ $doctors->email }}">
                                        <span id="error_emailedit" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Enter your password"
                                            name="password" value="{{ $doctors->password }}">
                                        <span id="error_passwordedit" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" class="form-control" placeholder="Enter your designation"
                                            name="designation" value="{{ $doctors->designation }}">
                                        <span id="error_profile" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doc Dept</label>
                                        <select name="doc_dept" required="" id="category_id" class="form-control"
                                            aria-invalid="false">
                                            <option value="" selected="" disabled="">Select Category </option>
                                            @foreach ($DoctorDepts as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $doctors->doc_dept ? 'selected' : '' }}>
                                                    {{ $category->name }}
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
                                            name="phone" value="{{ $doctors->phone }}">
                                        <span id="error_phone" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" class="form-control" placeholder="Enter mobile number"
                                            name="mobile" value="{{ $doctors->mobile }}">
                                        <span id="error_mobileedit" class="errorColor"></span>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label><span class="errorColor"> *</span><br>
                                        <input class="form-check-input " type="radio" class="status" value="male"
                                            name="sex" {{ $doctors->sex == 'male' ? 'checked' : '' }}>male
                                        <input class="form-check-input " type="radio" class="status" value="female"
                                            name="sex" {{ $doctors->sex == 'female' ? 'checked' : '' }}>female<br>
                                        <span id="error_statusedit" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address1</label>
                                            <input type="text" class="form-control" placeholder="Enter your address"
                                                name="address1" value="{{ $doctors->address1 }}">
                                            <span id="error_address1edit" class="errorColor"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address2</label>
                                            <input type="text" class="form-control" placeholder="Enter your address"
                                                name="address12" value="{{ $doctors->address12 }}">
                                            <span id="error_address" class="errorColor"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control" placeholder="Enter your address"
                                                name="city" value="{{ $doctors->city }}">
                                            <span id="error_address" class="errorColor"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Zip</label>
                                            <input type="text" class="form-control" placeholder="Enter your address"
                                                name="zip" value="{{ $doctors->zip }}">
                                            <span id="error_address" class="errorColor"></span>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>DOB</label>
                                        <input type="date" class="form-control" placeholder="Enter your birth date"
                                            name="dob" value="{{ $doctors->dob }}">
                                        <span id="error_dob" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input type="text" class="form-control" placeholder="Enter your age" name="age"
                                            value="{{ $doctors->age }}">
                                        <span id="error_age" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Profile</label>
                                        <input type="text" class="form-control" placeholder="Enter your speciality"
                                            name="profile" value="{{ $doctors->profile }}">
                                        <span id="error_speciality" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Social Link</label>
                                        <input type="text" class="form-control" placeholder="Enter doctor social link"
                                            name="social_link" value="{{ $doctors->social_link }}">
                                        <span id="error_sociallink" class="errorColor"></span>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Blood Group</label>
                                        <select name="blood_group" class="form-control"
                                            value="{{ $doctors->blood_group }}">

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
                                            name="career_title" value="{{ $doctors->career_title }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Short Biography</label>
                                        <textarea class="ckeditor form-control"
                                            name="short_biography">{{ $doctors->short_biography }}</textarea>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Specialist</label>

                                        <input type="text" class="form-control" placeholder="Enter career title"
                                            name="specialist" value="{{ $doctors->specialist }}">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Long Biography</label>
                                        <textarea class="ckeditor form-control"
                                            name="long_biography"> {{ $doctors->long_biography }}</textarea>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <label>Education Degree</label>
                                        <div class="col-md-12">
                                            <div class="jq">
                                                <textarea class="ckeditor form-control"
                                                    name="education_degree">{{ $doctors->education_degree }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label><span class="errorColor"> *</span><br>
                                        <input class="form-check-input " type="radio" class="status"
                                            value="Active" name="status"
                                            {{ $doctors->status == 'Active' ? 'checked' : '' }}>Active
                                        <input class="form-check-input " type="radio" class="status"
                                            value="Inactive" name="status"
                                            {{ $doctors->status == 'Inactive' ? 'checked' : '' }}>Inactive<br>
                                        <span id="error_status" class="errorColor"></span>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-rounded btn-info" value="Update Sub Category">
                        </form>
                    </div>

                </div>

            </div>
            {{-- <div class="col-1"></div> --}}
        </div>
    </div>


@endsection
@section('scripts')

    {{-- for ckeditor --}}
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        $('textarea').ckeditor(); // if class is prefered.
    </script>
    <script>
        // for adding data using ajax
        // for updating patient information
        $(document).on('submit', '#UpdateEmployeeFORM', function(e) {
            e.preventDefault();
            let formData = new FormData($('#UpdateEmployeeFORM')[0]);
            $.ajax({
                type: "POST",
                url: "/doctor/update",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 400) {
                        $('#error_fname').text(response.errors.first_name1);
                        $('#error_lname').text(response.errors.last_name1);
                        $('#error_emailedit').text(response.errors.email);
                        $('#error_mobileedit').text(response.errors.mobile);
                        $('#error_address1edit').text(response.errors.address1);
                        $('#error_statusedit').text(response.errors.sex);
                    } else if (response.status == 200) {
                        document.location.href = '/doctor/all'
                        toastr.success(response.message);
                    }
                }
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
