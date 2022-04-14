@extends('layouts.admin_master')

@section('css')
    <style>
        .topBar {
            margin-top: 6rem;
            margin-bottom: 4rem;
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
            margin-top: 20px;
            border-radius: 10px;
            margin-bottom: 0px;
        }

        .wrapper {
            text-align: center;
        }

        .cardcenter {
            margin: 0 18%;
            margin-bottom: 5rem;
        }
        .button {
            padding: 0px 20px 20px 20px;
        }
        .button a {
            margin-top: 10px;
        }
        .cb{
            margin-top: 15px;
        }
        .box{
            padding-right: 12px !important;
            padding-left: 12px !important;
        }

        h4 a .add_bt{
            color: #fff !important;
            background-color: #198754 !important;
            border-color: #198754 !important;
            padding: 8px 40px;
            font-size: 16px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@endsection

@section('super-admin-content')

        <div class="container-full topBar">
            <!-- start page title -->
            <h4 class="card-title text-center"><b>All Outlets</b>
                <a href="{{ route('add.outlet') }}"><button class="btn btn-lite add_bt" type="button" data-bs-toggle="modal" data-bs-target="#addOutlet">+ Add Outlets</button></a>
            </h4>
            <!-- end page title -->

            <div class="row">
                @foreach($outlet as $value)
                <div class="col-sm-12 mb-3 col-md-3 box">
                    <div class="card cardcheck">
                        <div class="card-body text-center cb">
                            <img style="width: 100px; height:100px;"class="card-img-top" src="{{asset($value->image)}}" alt="">

                            <h3 class="title">Outlet Name :{{$value->outlet_name}}</h3>
                            <p class="outlet_code">Outlet Code : {{$value->outlet_code}}</p>

                            <h4 class="outlet_address">Address :{{$value->address}}</h4>
                            <h4 class="outlet_phone">Phone : {{$value->Phone}}</h4>
                            <h4 class="outlet_email">Email :{{$value->email}}</h4>
                        </div>
                        <center>
                            <div class="btn_box button">
                                <a href="#" class="btn btn-info" role="button">Enter</a>
                                <a href="{{route('edit.outlet',$value->id)}}" class="btn btn-primary" role="button" >Edit</a>
                                <a href="{{route('delete.outlet',$value->id)}}" class="btn btn-danger" role="button" aria-pressed="true">Delete</a>
                            </div>
                        </center>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

@endsection

