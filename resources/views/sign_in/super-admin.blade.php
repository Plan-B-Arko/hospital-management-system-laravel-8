<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend') }}/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('backend') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ asset('backend') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
    <style>
        .change {
            /* display:flex;
            justify-content: center; */
            align-items: center;
            margin-left: 20px;
            /* padding-left: 20px; */
        }

        .btn_change {
            /* display: flex;
            justify-content: center; */
            align-items: center;
            padding-left: 650px;
        }

    </style>

</head>


<body>

    <div class="home-btn d-none d-sm-block">
        <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-8 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">Welcome Back Super Admin!</h5>
                                <a href="index.html" class="logo logo-admin">
                                    <img src="{{ asset('backend') }}/assets/images/logo-sm.png" height="24"
                                        alt="logo">
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form method="POST" action="{{ route('super_admin.login')}}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Enter your email">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>

                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Enter your password">
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input type="checkbox" id="remember_me" name="remember">
                                                <label for="remember_me">{{ __('Remember me') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">
                                                {{ __('Log in') }}</button>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 row">
                                        <div class="col-12 mt-4">
                                            <a href="{{ route('password.request') }}"><i class="mdi mdi-lock"></i>
                                                Forgot your password?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <div class="btn_change">
            &nbsp;&nbsp;&nbsp;&nbsp;<button type="button"
                class="btn btn-primary btn-rounded waves-effect btn-lg waves-light">SUPER ADMIN</button>
            <button type="button"
                class="btn btn-secondary btn-rounded waves-effect btn-lg waves-light change">DOCTOR</button>
            <button type="button"
                class="btn btn-success btn-rounded waves-effect btn-lg waves-light change">RECEPTIONIST</button>
            <button type="button"
                class="btn btn-danger btn-rounded waves-effect  btn-lg waves-light change">ACCOUNTANT</button>
            <br><br>
            <button type="button"
                class="btn btn-warning btn-rounded waves-effect  btn-lg waves-light change">PATIENT</button>
            <button type="button"
                class="btn btn-info btn-rounded waves-effect  btn-lg waves-light change">PHARMACIST</button>
            <button type="button" class="btn btn-light btn-rounded waves-effect  btn-lg waves-light change">LAB
                TECHNICIAN</button>
            <button type="button"
                class="btn btn-dark btn-rounded waves-effect  btn-lg waves-light change">NURSE</button>
            <br>
        </div>
    </div>
    {{-- <div class="conatiner">
        <div class="row">
            <div class="col-md-12"> --}}

    {{-- </div>
</div>
</div> --}}



    <!-- JAVASCRIPT -->

    <script src="{{ asset('backend') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/node-waves/waves.min.js"></script>

    <script src="{{ asset('backend') }}/assets/js/app.js"></script>

</body>

</html>
