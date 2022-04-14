@extends('layouts.admin_master')

@section('css')
    <style>
        .bt {
            margin-top: 20px;
            padding: 8px 70px;
            font-size: 17px;
            font-weight: bold;
        }
    </style>
@endsection


@section('super-admin-content')

        <div class="container-full topBar">
            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Edit Outlets</h6>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('update.outlet')}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                <input type="hidden" name="old_img"   value="{{ $edit->image}}">
                                <input type="hidden" name="updateId" value="{{ $edit->id}}">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Outlet Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="{{$edit->outlet_name}}"
                                            name="outlet_name">
                                        <span id="error_fname" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" value="{{$edit->email}}"
                                            name="email">
                                        <span id="error_email" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="phone"value="{{$edit->Phone}}"
                                        <span id="error_email" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address<span class="text-danger">*</span></label>
                                        <textarea class="form-control" placeholder="Write address here..." id="floatingTextarea" name="address">{{$edit->address}}</textarea>
                                        <span id="error_fname" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Active Status<span class="text-danger">*</span></label>
                                        <select name="status" class="form-select" aria-label="Default select example">
                                          @if($edit->status==1)
                                            <option value="1" selected>Active</option>
                                             @else
                                             <option value="1" selected>Active</option>
                                             @endif
                                             @if($edit->status==0)
                                            <option value="0"selected>Inactive</option>
                                            @else
                                            <option value="0"selected>Inactive</option>
                                            @endif
                                        </select>
                                        <span id="error_doc_dept" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Outlet Icon<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" placeholder="Enter your outlet name"
                                            name="icon">
                                        <span id="error_fname" class="errorColor"></span>
                                    </div>



                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary bt">Update</button>
                        </form>
                    </div>
                </div>
                {{-- <div class="col-1"></div> --}}
            </div>
        </div>
        {{-- </div> --}}
        </div>

@endsection
