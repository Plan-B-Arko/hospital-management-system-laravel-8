{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Doctor</h1>
     {{-- <form method="POST" action="{{ route('doctor.logout') }}">
        @csrf

        <x-jet-dropdown-link href="{{ route('doctor.logout') }}"
                    onclick="event.preventDefault();
                        this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-jet-dropdown-link>
    </form> --}}
{{-- </body>
</html> --}}

@extends('layouts.admin_master')

@section('super-admin-content')
@section('css')
    <style>
        .iconCenter {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .mini-stat .card-body a {
            text-decoration: none;
            color: black;
        }

    </style>
@endsection
@section('logout')
    <form method="POST" action="{{ route('doctor.logout') }}">
        @csrf

        <x-jet-dropdown-link href="{{ route('doctor.logout') }}"
            onclick="event.preventDefault();
                                                                                                                                                    this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-jet-dropdown-link>
    </form>
@endsection

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Dashboard</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">
                            <h3>Welcome {{ auth()->user()->first_name1 }} {{ auth()->user()->last_name1 }}</h3>
                        </li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <div class="float-end d-none d-md-block">
                        <div class="dropdown">
                            <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-cog me-2"></i> Settings
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- dfgdf --}}
                <div class="container-full topBar">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="datatable-buttons_wrapper"
                                        class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="datatable-buttons"
                                                    class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline text-center align-middle"
                                                    style="border-collapse: collapse; border-spacing: 0px; width: 100%;"
                                                    role="grid" aria-describedby="datatable-buttons_info">

                                                    <thead>
                                                        <tr role="row">
                                                            <th rowspan="1" colspan="1" style="width: 50px;">Sl.No</th>
                                                            <th rowspan="1" colspan="1" style="width: 120px;">Title
                                                            </th>
                                                            <th rowspan="1" colspan="1" style="width: 120px;">
                                                                Description</th>
                                                            <th rowspan="1" colspan="1" style="width: 120px;">Start Date
                                                            </th>
                                                            <th rowspan="1" colspan="1" style="width: 120px;">End Date
                                                            </th>
                                                            <th rowspan="1" colspan="1" style="width: 120px;">Assign By
                                                            </th>
                                                            <th rowspan="1" colspan="1" style="width: 89px;">Actions
                                                            </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <td>1</td>
                                                        <td>Title</td>
                                                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Iure incidunt nobis, voluptas nihil commodi dolorem

                                                        </td>
                                                        <td>20/7/20</td>
                                                        <td>20/7/21</td>
                                                        <td>20/6/20</td>
                                                        <td> <a href="#" class="btn btn-sm btn-danger ">
                                                                <i class="fa fa-pencil-alt"></i></a>

                                                            <a href="#" class="btn btn-sm btn-danger editBtn"
                                                                id="delete" title="delete data"><i
                                                                    class="fa fa-trash"></i></a>
                                                        </td>
                                                        {{-- @foreach ($prescriptions as $prescription)
                                            <tr>
                                                <td>{{ $prescription->id }}</td>
                                                <td>{{ $prescription->patient_id }}</td>
                                                <td>{{ $prescription->type }}</td>
                                                <td>John Doye</td>
                                                <td>{{ $prescription->visiting_fees }}</td>
                                                <td>{{ $prescription->date }}</td>
                                                <td>

                                                    <a href="{{ route('edit.prescription', $prescription->id) }}"
                                                        class="btn btn-sm btn-danger ">
                                                        <i class="fa fa-pencil-alt"></i></a>

                                                    <a href="{{ route('delete.prescription', $prescription->id) }}"
                                                        class="btn btn-sm btn-dange editBtn" id="delete"
                                                        title="delete data"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                {{-- dfvbbf --}}
                {{-- 2nd part start --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="datatable-buttons"
                                                class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline text-center align-middle"
                                                style="border-collapse: collapse; border-spacing: 0px; width: 100%;"
                                                role="grid" aria-describedby="datatable-buttons_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th rowspan="1" colspan="1" style="width: 50px;">Sl.No</th>
                                                        <th rowspan="1" colspan="1" style="width: 120px;">Sender Name
                                                        </th>
                                                        <th rowspan="1" colspan="1" style="width: 120px;">
                                                            Subject</th>
                                                        <th rowspan="1" colspan="1" style="width: 120px;">Message
                                                        <th rowspan="1" colspan="1" style="width: 120px;">Date
                                                        </th>
                                                        <th rowspan="1" colspan="1" style="width: 120px;">Status
                                                        </th>
                                                        <th rowspan="1" colspan="1" style="width: 89px;">Actions
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Tomal
                                                </td>
                                                <td>
                                                    Anything
                                                </td>
                                                <td>
                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil,
                                                    sint.
                                                </td>
                                                <td>
                                                    20/7/21
                                                </td>
                                                <td>
                                                    Active
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-danger ">
                                                        <i class="fa fa-pencil-alt"></i></a>

                                                    <a href="#" class="btn btn-sm btn-danger editBtn" id="delete"
                                                        title="delete data"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 2nd part end --}}
            </div>
        </div>
        <!-- end page title -->


    </div>

</div> <!-- container-fluid -->

@endsection
