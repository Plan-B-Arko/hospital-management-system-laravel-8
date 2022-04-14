<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Main</li>

        <li>
            <a href="{{ url('/admin/dashboard') }}" class="waves-effect">
                <i class="fas fa-chart-pie"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @if (Auth::guard('super_admin')->check() || Auth::guard('admin')->check())
        @auth("super_admin")
        <li>
            <a href="{{ route('manage.admins') }}" class="waves-effect">
                <i class="ti-home"></i>
                <span>Manage Admins</span>
            </a>
        </li>
        <li>
            <a href="{{ route('view.outlet') }}" class="waves-effect">
                <i class="ti-email"></i>
                <span>Outlets</span>
            </a>
        </li>
        @endauth
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fa fa-users"></i>
                    <span>Human Resources</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li>
                        <a href="{{ route('add.employe') }}" class="waves-effect">
                            <i class="fas fa-users-cog"></i>
                            <span>Add Employee</span>
                        </a>
                    </li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li>
                        <a href="{{ route('all.laboratorist') }}" class="waves-effect">
                            <i class="fa fa-flask"></i>
                            <span>Laboratorist List</span>
                        </a>
                    </li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li>
                        <a href="{{ route('all.receptionist') }}" class="waves-effect">
                            <i class="fa fa-user-tie"></i>
                            <span>Receptionist List</span>
                        </a>
                    </li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li>
                        <a href="{{ route('view.pharmacist') }}" class="waves-effect">
                            <i class="fas fa-file-prescription"></i>
                            <span>Pharmacist List</span>
                        </a>
                    </li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li>
                        <a href="{{ route('view.nurse') }}" class="waves-effect">
                            <i class="fa fa-user-nurse"></i>
                            <span>Nurse List</span>
                        </a>
                    </li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li>
                        <a href="{{ route('all.accountant') }}" class="waves-effect">
                            <i class="fas fa-file-invoice"></i>
                            <span>Accountant List</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fa fa ti-calendar"></i>
                    <span>Schedule</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.timeslot') }}">
                            <i class="far fa-clock"></i>
                            <span>Time Slot List</span>
                        </a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.timeslotlist') }}">
                            <i class="fas fa-history"></i>
                            <span>Schedule list</span>
                        </a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fa ti-book"></i>
                    <span>Prescription</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('add.prescriptioncasestudy') }}">
                            <i class="fas fa-file-medical"></i>
                            <span>Add Case Study</span>
                        </a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('view.prescriptioncasestudy') }}">
                            <i class="fas fa-file-medical"></i>
                            <span>Case Study List</span>
                        </a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('add.prescription') }}">
                            <i class="fas fa-file-medical"></i>
                            <span>Add Prescription</span>
                        </a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('view.prescription') }}">
                            <i class="fas fa-file-medical"></i>
                            <span>Prescription List</span>
                        </a></li>
                </ul>
            </li>
            {{-- all the routes for appointment --}}
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="fas fa-shield-alt"></i>
                <span>Role & Permission</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('add.roles') }}">
                    <i class="fab fa-periscope"></i>
                    <span>Roles</span>
                </a></li>
            </ul>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('add.permissions') }}">
                   <i class="fab fa-periscope"></i>
                   <span>Permission</span>
                </a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="fa fa ti-calendar"></i>
                <span>Schedule</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('all.timeslot') }}">
                    <i class="far fa-clock"></i>
                    <span>Time Slot List</span>
                </a></li>
            </ul>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('all.timeslotlist') }}">
                    <i class="fas fa-history"></i>
                   <span>Schedule list</span>
                </a></li>
            </ul>
        </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fa fa ti-pencil-alt"></i>
                    <span>Manage Appointment</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('add.appointment') }}">
                            <i class="fas fa-calendar-check"></i>
                            <span>New Appointment</span>
                        </a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.appointment') }}">
                            <i class="far fa-calendar-check"></i>
                            <span>All Appointment</span>
                        </a>
                    </li>
                </ul>

                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.assign.appointment') }}">
                            <i class="fas fa-calendar-check"></i>
                            <span>Assign By All</span>
                        </a></li>
                </ul>

                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('assignTo.appointment') }}">
                            <i class="far fa-calendar-check"></i>
                            <span>Assign To Doctor</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('all.patient') }}" class="waves-effect">
                    <i class="fas fa-hospital-user"></i>
                    <span>Manage Patient</span>
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fa fa-user-md"></i>
                    <span> Manage Doctor</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.department') }}">Doctor Department</a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('add.doctor') }}">Add Doctor</a></li>
                </ul>

                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.doctor') }}">Doctor List</a></li>
                </ul>

            </li>
            {{-- For Blood Bank --}}
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-tint"></i>
                    <span>Blood Bank</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('blood.issue') }}">
                            <i class="fas fa-tint"></i>
                            <span>Blood Issue</span>
                        </a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.bloodgroup') }}">
                            <i class="fas fa-fill-drip"></i>
                            <span>Blood Group</span>
                        </a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.blooddonation') }}">
                            <i class="fas fa-hand-holding-water"></i>
                            <span>Blood Donation</span>
                        </a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.blooddonor') }}">
                            <i class="fas fa-hand-holding-water"></i>
                            <span>Blood Donor</span>
                        </a></li>
                </ul>
            </li>
            {{-- for patient Bed --}}
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fa fa-bed"></i>
                    <span>Manage Bed</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.assignbed') }}">
                            <i class="fas fa-procedures"></i>
                            <span>New Bed Assign</span>
                        </a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.newbed') }}">
                            <i class="fas fa-bed"></i>
                            <span>New Bed</span>
                        </a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.newbedtype') }}">
                            <i class="fas fa-bed"></i>
                            <span>New Bed Type</span>
                        </a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-diagnoses"></i>
                    <span>Manage Diagnosis</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.diagnosisCategory') }}">
                            <i class="fas fa-stethoscope"></i>
                            <span>Diagnosis Categeory</span>
                        </a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.diagnosis_test') }}">
                            <i class="fas fa-comment-medical"></i>
                            <span>Diagnosis Test</span>
                        </a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-capsules"></i>
                    <span>Manage Medicine</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.medicinemanufacture') }}">Medicine Manufacture</a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.medicinecategory') }}">Medicine Category</a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.medicine') }}">Medicine Type</a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.medicinelist') }}">Medicine List</a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.medicine_boxsize') }}">Medicine Box Size List</a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.medicine_unit') }}">Medicine Unit List</a></li>
                </ul>

            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-laptop-medical"></i>
                    <span>Manage Record</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.birth_record') }}">Birth Record</a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.death_record') }}">Death Record</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-laptop-medical"></i>
                    <span>Messages</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="">New Message</a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('message.inbox.view') }}">Inbox</a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('message.sent.view') }}">Sent</a></li>
                </ul>
            </li>



            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-laptop-medical"></i>
                    <span>Insurance</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('add.insurance') }}">Add Insurance</a></li>
                </ul>
                {{-- <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.death_record') }}">Death Record</a></li>
                </ul> --}}
            </li>

         @elseif (Auth::guard('doctor')->check())
         
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fa fa ti-calendar"></i>
                    <span>Schedule</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.timeslot') }}">
                            <i class="far fa-clock"></i>
                            <span>Time Slot List</span>
                        </a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.timeslotlist') }}">
                            <i class="fas fa-history"></i>
                            <span>Schedule list</span>
                        </a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fa fa ti-pencil-alt"></i>
                    <span>Manage Appointment</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('add.appointment') }}">
                            <i class="fas fa-calendar-check"></i>
                            <span>New Appointment</span>
                        </a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.appointment') }}">
                            <i class="far fa-calendar-check"></i>
                            <span>All Appointment</span>
                        </a>
                    </li>
                </ul>

                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.assign.appointment') }}">
                            <i class="fas fa-calendar-check"></i>
                            <span>Assign By All</span>
                        </a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('all.patient') }}" class="waves-effect">
                    <i class="fas fa-hospital-user"></i>
                    <span>Manage Patient</span>
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fa ti-book"></i>
                    <span>Prescription</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('add.prescriptioncasestudy') }}">
                            <i class="fas fa-file-medical"></i>
                            <span>Add Case Study</span>
                        </a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('view.prescriptioncasestudy') }}">
                            <i class="fas fa-file-medical"></i>
                            <span>Case Study List</span>
                        </a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('add.prescription') }}">
                            <i class="fas fa-file-medical"></i>
                            <span>Add Prescription</span>
                        </a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('view.prescription') }}">
                            <i class="fas fa-file-medical"></i>
                            <span>Prescription List</span>
                        </a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fa fa-bed"></i>
                    <span>Manage Bed</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.assignbed') }}">
                            <i class="fas fa-procedures"></i>
                            <span>New Bed Assign</span>
                        </a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.newbed') }}">
                            <i class="fas fa-bed"></i>
                            <span>New Bed</span>
                        </a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.newbedtype') }}">
                            <i class="fas fa-bed"></i>
                            <span>New Bed Type</span>
                        </a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-laptop-medical"></i>
                    <span>Manage Record</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.birth_record') }}">Birth Record</a></li>
                </ul>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.death_record') }}">Death Record</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fa fa-user-md"></i>
                    <span> Manage Doctor</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.doctor') }}">Doctor List</a></li>
                </ul>

            </li>

        @else
            employee
        @endif

    </ul>
</div>
