@extends('layouts.admin_master')

@section('super-admin-content')

    <style>
        .topBar {
            margin-top: 4rem;
        }

        .topBar {
            padding: 2rem;
        }

        .card-title {
            display: flex;
            justify-content: space-between;
        }

        .modal-body .row .col-md-6,
        .modal-body .row .col-md-12 {
            margin-bottom: 1rem;
        }

        .errorColor {
            color: red;
        }

        .dl-horizontal dt {
            float: left;
            width: 160px;
            clear: left;
            text-align: right;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        dt {
            font-weight: 700;
            color: coral;
        }
        dd {
            margin-bottom: 0.1rem;
        }
        dd, dt {
            line-height: 1.42857143;
        }
        .dl-horizontal dd {
            margin-left: 180px;
        }

    </style>

<div class="container-full topBar">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title text-center">All Inbox Messages
                        <div class="text-end">
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#AddMessageModal">New Message</button>
                           <a href="{{ route('message.sent.view') }}"><button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="">Sent</button></a>
                        </div>
                    </h4>

                     <!-- Modal for add Message -->
                     <div class="modal fade bd-example-modal-lg" id="AddMessageModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                     <div class="modal-dialog modal-lg">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">New Message</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal"
                                     aria-label="Close"></button>
                             </div>
                             <form id="AddMessageFORM" method="POST" enctype="multipart/form-data">
                                 @csrf
                                 <div class="modal-body">
                                     <ul class="alert alert-warning d-none" id="save_errorList"></ul>
                                     <div class="row">
                                         <div class="col-md-12">
                                             <div class="form-group">
                                                 <label>Send To <span class="text-danger">*</span></label>
                                                 <select name="sendto" class="form-control" >
                                                     <option value="" selected="" disabled="">Select a Name
                                                     </option>
                                                     <option value="">A</option>
                                                     <option value="">B</option>
                                                     <option value="">C</option>
                                                     <option value="">D</option>
                                                     <option value="">E</option>
                                                     <option value="">F</option>
                                                     <option value="">G</option>
                                                     <option value="">H</option>
                                                 </select>
                                                 <span id="error_sendto" class="errorColor"></span>
                                             </div>
                                         </div>
                                         <div class="col-md-12">
                                             <div class="form-group">
                                                 <label>Subject <span class="text-danger">*</span></label>
                                                 <input type="text" class="form-control"
                                                     placeholder="Enter your subject" name="subject">
                                                     <span id="error_subject" class="errorColor"></span>
                                             </div>
                                         </div>
                                         <div class="col-md-12">
                                             <div class="form-group">
                                                 <label>Message <span class="text-danger">*</span></label>
                                                 <textarea id="mytextarea" name="message" placeholder="Write your message here...."></textarea>
                                                 <span id="error_message" class="errorColor"></span>
                                             </div>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="modal-footer">
                                     <button type="reset" class="btn btn-secondary">Reset</button>
                                     <input type="submit" class="btn btn-rounded btn-info" value="Add Message">
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>

                    {{-- Modal for view message --}}
                    <div class="modal fade bd-example-modal-lg" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">View Message </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form id="ViewEmployeeFORM" method="GET" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" id="sentmessage_id" name="sentmessage_id">
                                    <input type="hidden" id="old_image" name="old_image">
                                    <div class="modal-body">

                                        <div class="row">
                                            <p style="font-size: 18px; font-weight: bold; color:mediumvioletred">Message Details:</p>

                                            <dl class="dl-horizontal">
                                                <dt>Sender Name :</dt>
                                                <dd></dd>

                                                <dt>Send To :</dt>
                                                <dd name></dd>

                                                <dt>Date :</dt>
                                                <dd></dd>

                                                <dt>Subject :</dt>
                                                <dd> </dd>

                                                <dt>Message :</dt>
                                                <dd></dd>
                                            </dl>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline text-center align-middle"
                                    style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                    aria-describedby="datatable-buttons_info">

                                        <thead>
                                            <tr role="row">
                                                <th rowspan="1" colspan="1" style="width: 50px;">SL.NO</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Sender Name</th>
                                                <th rowspan="1" colspan="1" style="width: 141px;">Subject</th>
                                                <th rowspan="1" colspan="1" style="width: 53p;">Message</th>
                                                <th rowspan="1" colspan="1" style="width: 160px;">Date</th>
                                                <th rowspan="1" colspan="1" style="width: 89px;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                $sn = 1;
                                            @endphp
                                            @foreach ( $messages as $message)
                                            <tr>
                                                <td class="dtr-control sorting_1" tabindex="0">{{ $sn++ }}</td>
                                                <td class="dtr-control sorting_1" tabindex="0">{{ $message->sender_name }}</td>
                                                <td class="dtr-control sorting_1" tabindex="0">{{ $message->subject }}</td>
                                                <td class="dtr-control sorting_1" tabindex="0">{{ $message->message }}</td>
                                                <td class="dtr-control sorting_1" tabindex="0">{{ $message->date }}</td>
                                                <td>
                                                    <button type="button" value="{{ $message->id }}"
                                                        class="btn btn-success viewBtn btn-sm">
                                                        <i class="fa fa-eye"></i></button>

                                                    <a href="{{ route('message.delete', $message->id) }}"
                                                        class="btn btn-danger btn-sm" id="delete"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
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
</div>
@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // for adding message using ajax

        $(document).on('submit', '#AddMessageFORM', function(e) {
            e.preventDefault();
            let formData = new FormData($('#AddMessageFORM')[0]);

            $.ajax({
                type: "POST",
                url: "/Messages/store",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 400) {
                        // $('#error_sendto').text(response.errors.sendto);
                        $('#error_subject').text(response.errors.subject);
                        $('#error_message').text(response.errors.message);
                    } else if (response.status == 200) {
                        $('#AddmedicineList').modal('hide');
                        location.reload();
                        toastr.success(response.message);
                    }
                }
            });
        });

        // for viewing data using ajax
        $(document).on('click', '.viewBtn', function() {
            var message_id = $(this).val();
            //console.log(message_id);
            $('#viewModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/Messages/sent/show/" + message_id,
                success: function(response) {
                    console.log(response.message);
                    const {message} = response;
                    $('#sender_name').text(message.sender_name);
                    $('#sender_to').text(message.send_to);
                    $('#subject').text(message.subject);
                    $('#date').text(message.date);
                    $('#message').text(message.message);

                }
            })
        });
    </script>
@endsection



