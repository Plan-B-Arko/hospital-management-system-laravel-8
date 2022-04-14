@extends('layouts.admin_master')

@section('super-admin-content')

    <style>
        .cal {
            margin: 6rem;
        }

    </style>


    <div class="cal">
        <div id="calendar"></div>
    </div>


    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                editable: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: '/Appointment/calender',
            });

        });
    </script>

@endsection
