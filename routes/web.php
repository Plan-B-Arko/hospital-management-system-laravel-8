<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Nurse\NurseController;
use App\Http\Controllers\Admin\AdminProfileController;

use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Admin\AccountantController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\DoctorDeptController;
use App\Http\Controllers\Laboratorist\LaboratoristController;
use App\Http\Controllers\Admin\ReceptionistController;
use App\Http\Controllers\Pharmacist\PharmacistController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\Blood_Bank\BloodDonorController;
use App\Http\Controllers\Blood_Bank\BloodDonationController;
use App\Http\Controllers\Blood_Bank\BloodIssueController;
use App\Http\Controllers\Blood_Bank\BloodGroupController;
use App\Http\Controllers\Bed\NewBedController;
use App\Http\Controllers\Bed\BedAssignController;
use App\Http\Controllers\Appointment\AppointmentController;
use App\Http\Controllers\Appointment\AssignAppointmentController;
use App\Http\Controllers\Diagnosis\NewDiagnosisController;
use App\Http\Controllers\Diagnosis\DiagnosisController;
use App\Http\Controllers\Medicine\MedicineController;
use App\Http\Controllers\Medicine\MedicineListController;
use App\Http\Controllers\Record\RecordController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Schedule\ScheduleController;
use App\Http\Controllers\Schedule\SchedulelistController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Prescription\PatientcasestudyController;
use App\Http\Controllers\Prescription\PrescriptionController;
use App\Http\Controllers\Insurance\InsuranceController;
use App\Models\Employee;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('super-admin')->name('super_admin.')->group(function () {
    Route::get('/login', function () {
        return view('sign_in.super-admin');
    })->middleware('guest:admin', 'guest:doctor', 'guest:super_admin', 'guest:employee')->name('login');

    $limiter = config('fortify.limiters.login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:super_admin',
            $limiter ? 'throttle:' . $limiter : null,
        ]));

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    route::get('dashboard', [IndexController::class, 'DashboardView'])->middleware('auth:super_admin')->name('dashboard');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', function () {
        return view('sign_in.admin');
    })->middleware('guest:admin', 'guest:doctor', 'guest:super_admin', 'guest:employee')->name('login');

    $limiter = config('fortify.limiters.login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:admin',
            $limiter ? 'throttle:' . $limiter : null,
        ]));
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    route::get('dashboard', [AdminController::class, 'DashboardView'])->middleware('auth:admin')->name('dashboard');
});

Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('/login', function () {
        return view('sign_in.employee');
    })->middleware('guest:admin', 'guest:doctor', 'guest:super_admin', 'guest:employee')->name('login');

    $limiter = config('fortify.limiters.login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:employee',
            $limiter ? 'throttle:' . $limiter : null,
        ]));

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    route::get('dashboard', function () {
        return view('Dashboards.employee');
    })->middleware('auth:employee')->name('dashboard');
});

Route::prefix('doctor')->name('doctor.')->group(function () {
    Route::get('/login', function () {
        return view('sign_in.doctor');
    })->middleware('guest:admin', 'guest:doctor', 'guest:super_admin', 'guest:employee')->name('login');

    $limiter = config('fortify.limiters.login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:doctor',
            $limiter ? 'throttle:' . $limiter : null,
        ]));

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    route::get('dashboard', [DoctorController::class, 'DashboardView'])->middleware('auth:doctor')->name('dashboard');
});

// admin profile view
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');

// frontend dashboard
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Schedule
Route::prefix('schedule')->group(function () {
    Route::get('/view', [ScheduleController::class, 'ViewTimeSlot'])->name('all.timeslot');
    Route::post('/store', [ScheduleController::class, 'StoreTimeSlot'])->name('store.timeslot');
    Route::get('delete/{id}', [ScheduleController::class, 'DeleteTimeSlot'])->name('delete.timeslot');
    Route::get('edit-schedule/{id}', [ScheduleController::class, 'EditTimeSlot'])->name('edit.timeslot');
    Route::put('/update/{id}', [ScheduleController::class, 'UpdateTimeSlot'])->name('update.timeslot');
});

//Schedule
Route::prefix('schedulelist')->group(function () {
    Route::get('/view', [SchedulelistController::class, 'ViewTimeSlotlist'])->name('all.timeslotlist');
    Route::post('/store', [SchedulelistController::class, 'StoreTimeSlotlist'])->name('store.timeslotlist');
    Route::get('delete/{id}', [SchedulelistController::class, 'DeleteTimeSlotlist'])->name('delete.timeslotlist');
    Route::get('edit-schedulelist/{id}', [SchedulelistController::class, 'EditTimeSlotlist'])->name('edit.timeslotlist');
    Route::put('/update/{id}', [SchedulelistController::class, 'UpdateTimeSlotlist'])->name('update.timeslotlist');
});

// Nurse Start
Route::prefix('nurse')->group(function () {
    Route::get('/view', [NurseController::class, 'ViewNurse'])->name('view.nurse');
    Route::post('/add', [NurseController::class, 'AddNurse'])->name('add.nurse');
    Route::post('/update', [NurseController::class, 'UpdateNurse'])->name('update.nurse');
    Route::get('/delete/{id}', [NurseController::class, 'DeleteNurse'])->name('delete.nurse');
    Route::get('edit-nurse/{id}', [NurseController::class, 'EditNurse'])->name('edit.nurse');
    Route::get('/list/view', [NurseController::class, 'ListNurseView'])->name('list.nurses');
});
// Nurse End

//All pharmacist
Route::prefix('pharmacist')->group(function () {
    Route::get('/view', [PharmacistController::class, 'ViewPharmacist'])->name('view.pharmacist');
    Route::post('/add', [PharmacistController::class, 'AddPharmacist'])->name('add.pharmacist');
    Route::post('/update', [PharmacistController::class, 'UpdatePharmacist'])->name('update.pharmacist');
    Route::get('/delete/{id}', [PharmacistController::class, 'DeletePharmacist'])->name('delete.pharmacist');
    Route::get('edit-pharmacist/{id}', [PharmacistController::class, 'EditPharmacist'])->name('edit.pharmacist');
    Route::get('/list/view', [PharmacistController::class, 'ListPharmacistView'])->name('list.pharmacists');
});
//pharmacist end

// Patients routes goes here
Route::prefix('patient')->group(function () {
    Route::get('/view', [PatientController::class, 'index'])->name('all.patient');
    Route::post('/store', [PatientController::class, 'StorePatient'])->name('store.patient');
    Route::get('delete/{id}', [PatientController::class, 'DeletePatient'])->name('delete.patient');
    Route::get('edit-patient/{id}', [PatientController::class, 'EditPatient'])->name('edit.patient');
    Route::post('/update', [PatientController::class, 'UpdatePatient'])->name('update.patient');
    Route::get('/list/view', [PatientController::class, 'AllPatientView'])->name('list.patients');
    Route::get('/find/{name}', [PatientController::class, 'findPatientName'])->name('find.patients');
});

// Doctors routes goes here
Route::prefix('doctor')->group(function () {
    Route::get('/all', [DoctorController::class, 'index'])->name('all.doctor');
    Route::get('/create', [DoctorController::class, 'CreateDoctor'])->name('add.doctor');
    Route::post('/store', [DoctorController::class, 'StoreDoctor'])->name('store.doctor');
    Route::get('edit-doctor/{id}', [DoctorController::class, 'EditDoctor'])->name('edit.doctor');
    Route::post('/update', [DoctorController::class, 'UpdateDoctor'])->name('update.doctor');
    Route::get('/delete/{id}', [DoctorController::class, 'DeleteDoctor'])->name('delete.doctor');
    Route::get('/list/view', [DoctorController::class, 'AllDoctorView'])->name('list.doctors');
    Route::get('/single/view/{id}', [DoctorController::class, 'SingleDoctorView'])->name('single.doctor');
    Route::post('dynamic-field/insert', [DoctorController::class, 'insertt'])->name('dynamic-field.insert');
    // for doctor dashboard

});

// doctor department route goes here
Route::prefix('doctor/dept')->group(function () {
    Route::get('/all', [DoctorDeptController::class, 'index'])->name('all.department');
    Route::post('/store', [DoctorDeptController::class, 'StoreDoctorDept']);
    Route::get('/edit/{id}', [DoctorDeptController::class, 'EditDoctorDept']);
    Route::post('/update', [DoctorDeptController::class, 'UpdateDoctorDept']);
    Route::get('/delete/{id}', [DoctorDeptController::class, 'DeleteDoctorDept'])->name('delete.doctorDept');
});

// Accountant Start
Route::prefix('accountant')->group(function () {
    Route::get('/view', [AccountantController::class, 'AccountantView'])->name('all.accountant');
    Route::post('/add', [AccountantController::class, 'AccountantStore'])->name('accountant.add');
    Route::get('edit-accountant/{id}', [AccountantController::class, 'AccountEdit']);
    Route::post('/update', [AccountantController::class, 'AccountUpdate'])->name('account.update');
    Route::get('/delete/{id}', [AccountantController::class, 'AccountDelete'])->name('accountant.delete');
    Route::get('changeStatus', [AccountantController::class, 'changeStatus']);
    Route::get('/list/view', [AccountantController::class, 'ListAccountView'])->name('list.accountant');
    // Route::get('/deactive/{id}', [AccountantController::class, 'AccountantDeactive'])->name('accountant.deactive');
    // Route::get('/active/{id}', [AccountantController::class, 'AccountantActive'])->name('accountant.active');
}); // Admin Brand All Route Group End

// Labroatorist Start
Route::prefix('laboratorist')->group(function () {
    Route::get('/view', [LaboratoristController::class, 'LaboratoristView'])->name('all.laboratorist');
    Route::post('/add', [LaboratoristController::class, 'LaboratoristStore'])->name('laboratorist.add');
    Route::get('edit-laboratorist/{id}', [LaboratoristController::class, 'LaboratoristEdit']);
    Route::post('/update', [LaboratoristController::class, 'LaboratoristUpdate'])->name('laboratorist.update');
    Route::get('/delete/{id}', [LaboratoristController::class, 'LaboratoristDelete'])->name('laboratorist.delete');
    Route::get('/list/view', [LaboratoristController::class, 'ListlaboratoristView'])->name('list.laboratorist');
});

//    Receptionist Start
Route::prefix('receptionist')->group(function () {
    Route::get('/view', [ReceptionistController::class, 'ReceptionistView'])->name('all.receptionist');
    Route::post('/add', [ReceptionistController::class, 'ReceptionistStore'])->name('receptionist.add');
    Route::get('edit-receptionist/{id}', [ReceptionistController::class, 'ReceptionistEdit']);
    Route::post('/update', [ReceptionistController::class, 'ReceptionistUpdate'])->name('receptionist.update');
    Route::get('/delete/{id}', [ReceptionistController::class, 'ReceptionistDelete'])->name('receptionist.delete');
    Route::get('/list/view', [ReceptionistController::class, 'ListReceptionistView'])->name('list.receptionists');
});

// Blood Issue
Route::prefix('blood')->group(function () {
    Route::get('/issue/view', [BloodIssueController::class, 'BloodIssueView'])->name('blood.issue');
    Route::get('/donor/group/{donor_id}', [BloodIssueController::class, 'BloodDonorGroup']);
    Route::post('/issue/store', [BloodIssueController::class, 'BloodIssueStore'])->name('blood_issue.store');
    Route::get('/issue/delete/{id}', [BloodIssueController::class, 'BloodIssueDelete'])->name('delete.blood.issue');
    Route::get('/issue/edit/{bloodissue_id}', [BloodIssueController::class, 'BloodIssueEdit']);
    Route::get('/donor/group/edit/{blood_id}', [BloodIssueController::class, 'BloodDonorGroupEdit']);
    Route::put('/issue/update/{id}', [BloodIssueController::class, 'BloodDonorGroupUpdate'])->name('bloodissue.update');
});

// Blood Donor Start
Route::prefix('bloodDonor')->group(function () {
    Route::get('/view', [BloodDonorController::class, 'BloodDonorView'])->name('all.blooddonor');
    Route::post('/add', [BloodDonorController::class, 'BloodDonorStore'])->name('blooddonor.add');
    Route::get('edit-blooddonor/{id}', [BloodDonorController::class, 'BloodDonorEdit']);
    Route::put('/update/{id}', [BloodDonorController::class, 'BloodDonorUpdate'])->name('blooddonor.update');
    Route::get('/delete/{id}', [BloodDonorController::class, 'BloodDonorDelete'])->name('blooddonor.delete');
});
//Blood Donor End

// Blood Donation Start
Route::prefix('bloodDonation')->group(function () {
    Route::get('/view', [BloodDonationController::class, 'BloodDonationView'])->name('all.blooddonation');
    Route::post('/add', [BloodDonationController::class, 'BloodDonationStore'])->name('blooddonation.add');
    Route::get('edit-blooddonation/{id}', [BloodDonationController::class, 'BloodDonationEdit']);
    Route::put('/update/{id}', [BloodDonationController::class, 'BloodDonationUpdate'])->name('blooddonation.update');
    Route::get('/delete/{id}', [BloodDonationController::class, 'BloodDonationDelete'])->name('blooddonation.delete');
});
//Blood Donation End

// Blood group Start
Route::prefix('bloodgroup')->group(function () {
    Route::get('/view', [BloodGroupController::class, 'BloodGroupView'])->name('all.bloodgroup');
    Route::post('/add', [BloodGroupController::class, 'BloodGroupStore']);
    Route::get('/edit-bloodgroup/{id}', [BloodGroupController::class, 'BloodGroupedit']);
    Route::put('/update/{id}', [BloodGroupController::class, 'BloodGroupUpdate']);
    Route::get('/delete/{id}', [BloodGroupController::class, 'BloodGroupDelete'])->name('bloodgroup.delete');
});

Route::prefix('NewBedType')->group(function () {
    Route::get('/view', [NewBedController::class, 'NewBedTypeView'])->name('all.newbedtype');
    Route::post('/add', [NewBedController::class, 'NewBedTypeStore'])->name('newbedtype.add');
    Route::get('/edit-newbedtype/{id}', [NewBedController::class, 'NewBedTypeEdit']);
    Route::put('/update/{id}', [NewBedController::class, 'NewBedTypeUpdate'])->name('newbedtype.update');
    Route::get('/delete/{id}', [NewBedController::class, 'NewBedTypeDelete'])->name('newbedtype.delete');
});
//New Bed Type End

// New Bed Start
Route::prefix('NewBed')->group(function () {
    Route::get('/view', [NewBedController::class, 'NewBedView'])->name('all.newbed');
    Route::post('/add', [NewBedController::class, 'NewBedStore'])->name('newbed.add');
    Route::get('/edit-newbed/{id}', [NewBedController::class, 'NewBedEdit']);
    Route::put('/update/{id}', [NewBedController::class, 'NewBedUpdate'])->name('newbed.update');
    Route::get('/delete/{id}', [NewBedController::class, 'NewBedDelete'])->name('newbed.delete');
});

// New Bed Start
Route::prefix('BedAssign')->group(function () {
    Route::get('/view', [BedAssignController::class, 'BedAssignView'])->name('all.assignbed');
    Route::post('/add', [BedAssignController::class, 'BedAssignStore']);
    Route::get('/status', [BedAssignController::class, 'BedAssignStatus'])->name('bed.status');
    Route::get('/edit/{id}', [BedAssignController::class, 'BedAssignEdit']);
    Route::put('/update/{id}', [BedAssignController::class, 'BedAssignUpdate']);
    Route::get('/delete/{id}', [BedAssignController::class, 'BedAssignDelete'])->name('allotment.delete');
});

// Appointment start
Route::prefix('Appointment')->group(function () {
    //only for ajax request
    Route::get('/doctor/{doctor_id}', [AppointmentController::class, 'getAppointmentsViaDoctor']);
    Route::get('/view', [AppointmentController::class, 'AppointmentView'])->name('add.appointment');
    Route::post('/store', [AppointmentController::class, 'AppointmentStore'])->name('appointment.store');
    Route::get('/view/all', [AppointmentController::class, 'AppointmentViewAll'])->name('all.appointment');
    // Route::get('/edit/{id}', [AppointmentController::class, 'AppointmentEdit'])->name('edit.appointment');
    Route::get('/delete/{id}', [AppointmentController::class, 'AppointmentDelete'])->name('delete.apointment');
    // Route::put('/update/{id}', [AppointmentController::class, 'AppointmentUpdate'])->name('update.appointment');
    // Route::get('/calender', [AppointmentController::class, 'index']);
    Route::get('/find/{name}', [AppointmentController::class, 'PatientName']);
    Route::get('/schedule/list/{doctor_name}', [AppointmentController::class, 'SlotName']);
    Route::get('/by/date/{date}/id/{id}', [AppointmentController::class, 'SerialDate']);
    Route::get('/department/doctor/{id}', [AppointmentController::class, 'DeptDoctor']);


    Route::get('/assign/by/all', [AssignAppointmentController::class, 'AssignByAll'])->name('all.assign.appointment');
    Route::post('/search/assign/all', [AssignAppointmentController::class, 'SearchAssignByAll'])->name('search.assign.appointment');
    Route::get('/assign/to/doctor', [AssignAppointmentController::class, 'AssignToDoctor'])->name('assignTo.appointment');
    Route::post('/assign/to/doctor/ajax/{id}', [AssignAppointmentController::class, 'AssignToDoctorFilter']);
});

// For Diagonosis
Route::prefix('Diagnosis')->group(function () {
    Route::get('/view', [NewDiagnosisController::class, 'DiagnosisCategoryView'])->name('all.diagnosisCategory');
    Route::post('/store', [NewDiagnosisController::class, 'DiagnosisCategoryStore'])->name('diagnosisCategory.add');
    Route::get('/edit/{id}', [NewDiagnosisController::class, 'DiagnosisCategoryEdit']);
    Route::put('/update/{id}', [NewDiagnosisController::class, 'DiagnosisCategoryUpdate'])->name('update.diagnosisCategory');
    Route::get('/delete/{id}', [NewDiagnosisController::class, 'DiagnosisCategoryDelete'])->name('delete.diagnosisCategory');
});

// Diagnosis test start
Route::prefix('Diagnsosis')->group(function () {
    Route::get('/view', [DiagnosisController::class, 'DignsosisTestView'])->name('all.diagnosis_test');
    Route::post('/store', [DiagnosisController::class, 'DignsosisTestStore'])->name('store.diagnosis_test');
    Route::get('/delete/{id}', [DiagnosisController::class, 'DignsosisTestDelete'])->name('delete.diagnosisTest');
    Route::get('/edit-Diagnosis-test/{id}', [DiagnosisController::class, 'DiagnosisCategoryEdit']);
    Route::post('/update/test', [DiagnosisController::class, 'DiagnosisCategoryUpdate'])->name('update.diagnosisTest');
});

Route::prefix('Medicine')->group(function () {
    // Medicine type start
    Route::get('/type/view', [MedicineController::class, 'MedicineTypeView'])->name('all.medicine');
    Route::post('/type/store', [MedicineController::class, 'MedicineTypeStore'])->name('store.medicine');
    Route::get('/type/edit/{id}', [MedicineController::class, 'MedicineTypeEdit']);
    Route::put('/type/update/{id}', [MedicineController::class, 'MedicineTypeUpdate'])->name('update.medicine');
    Route::get('/type/delete/{id}', [MedicineController::class, 'MedicineTypeDelete'])->name('delete.medicine');
    //Medicine type end

    //  Medicine category start
    Route::get('/category/view', [MedicineController::class, 'MedicineCategoryView'])->name('all.medicinecategory');
    Route::post('/category/store', [MedicineController::class, 'MedicineCategoryStore'])->name('store.medicinecategory');
    Route::get('/category/edit/{id}', [MedicineController::class, 'MedicineCategoryEdit']);
    Route::put('/category/update/{id}', [MedicineController::class, 'MedicineCategoryUpdate'])->name('update.medicinecategory');
    Route::get('/category/delete/{id}', [MedicineController::class, 'MedicineCategoryDelete'])->name('delete.medicinecategory');
    //  Medicine category end

    //  Medicine box size start
    Route::get('/box-size/view', [MedicineController::class, 'MedicineBoxSizeView'])->name('all.medicine_boxsize');
    Route::post('/box-size/store', [MedicineController::class, 'MedicineBoxSizeStore'])->name('store.medicine_boxsize');
    Route::get('/box-size/edit/{id}', [MedicineController::class, 'MedicineBoxSizeEdit']);
    Route::put('/box-size/update/{id}', [MedicineController::class, 'MedicineBoxSizeUpdate'])->name('update.medicine_boxsize');
    Route::get('/box-size/delete/{id}', [MedicineController::class, 'MedicineBoxSizeDelete'])->name('delete.medicine_boxsize');
    //  Medicine box size end

    //  Medicine Unit start
    Route::get('/unit/view', [MedicineController::class, 'MedicineUnitView'])->name('all.medicine_unit');
    Route::post('/unit/store', [MedicineController::class, 'MedicineUnitStore'])->name('store.medicine_unit');
    Route::get('/unit/edit/{id}', [MedicineController::class, 'MedicineUnitEdit']);
    Route::put('/unit/update/{id}', [MedicineController::class, 'MedicineUnitUpdate'])->name('update.medicine_unit');
    Route::get('/unit/delete/{id}', [MedicineController::class, 'MedicineUnitDelete'])->name('delete.medicine_unit');
    //  Medicine Unit end

    //  Medicine Manufacture start
    Route::get('/manufacture/view', [MedicineController::class, 'MedicineManufactureView'])->name('all.medicinemanufacture');
    Route::post('/manufacture/store', [MedicineController::class, 'MedicineManufactureStore'])->name('store.medicinemanufacture');
    Route::get('/manufacture/edit/{id}', [MedicineController::class, 'MedicineManufactureEdit']);
    Route::put('/manufacture/update/{id}', [MedicineController::class, 'MedicineManufactureUpdate'])->name('update.medicinemanufacture');
    Route::get('/manufacture/delete/{id}', [MedicineController::class, 'MedicineManufactureDelete'])->name('delete.medicinemanufacture');
    //  Medicine manufacture end

    //  Medicine List start
    Route::get('/list/view', [MedicineListController::class, 'MedicineListView'])->name('all.medicinelist');
    Route::post('/list/store', [MedicineListController::class, 'MedicineListStore'])->name('store.medicinelist');
    Route::get('/list/edit/{id}', [MedicineListController::class, 'MedicineListEdit']);
    Route::post('/list/update', [MedicineListController::class, 'MedicineListUpdate'])->name('update.medicinelist');
    Route::get('/list/delete/{id}', [MedicineListController::class, 'MedicineListDelete'])->name('delete.medicinelist');
    //  Medicine List end
});


// Birth & Death Record Start
Route::prefix('Record')->group(function () {
    // birth record
    Route::get('/birth/view', [RecordController::class, 'BirthView'])->name('all.birth_record');
    Route::post('/birth/store', [RecordController::class, 'BirthStore'])->name('store.birth_record');
    Route::get('/birth/delete/{id}', [RecordController::class, 'BirthDelete'])->name('delete.birth_record');
    Route::get('/birth/edit/{id}', [RecordController::class, 'BirthEdit']);
    Route::post('/birth/update', [RecordController::class, 'BirthUpdate'])->name('update.birth_record');

    // birth record
    Route::get('/death/view', [RecordController::class, 'DeathView'])->name('all.death_record');
    Route::post('/death/store', [RecordController::class, 'DeathStore'])->name('store.death_record');
    Route::get('/death/delete/{id}', [RecordController::class, 'DeathDelete'])->name('delete.death_record');
    Route::get('/death/edit/{id}', [RecordController::class, 'DeathEdit']);
    Route::post('/death/update', [RecordController::class, 'DeathUpdate'])->name('update.death_record');
});


// Prescription start
Route::prefix('Prescription')->group(function () {
    //Patient Case Study Start
    Route::get('/casestudy/view', [PatientcasestudyController::class, 'PrescriptionCaseStudyView'])->name('view.prescriptioncasestudy');
    Route::get('/casestudy/add', [PatientcasestudyController::class, 'PrescriptionCaseStudyAdd'])->name('add.prescriptioncasestudy');
    Route::post('/casestudy/store', [PatientcasestudyController::class, 'PrescriptionCaseStudyStore'])->name('store.prescriptioncasestudy');
    Route::get('/casestudy/delete/{id}', [PatientcasestudyController::class, 'PrescriptionCaseStudyDelete'])->name('delete.prescriptioncasestudy');
    Route::get('/casestudy/edit-patientCaseStudy/{id}', [PatientcasestudyController::class, 'PrescriptionCaseStudyEdit'])->name('edit.prescriptioncasestudy');
    //   Route::post('dynamic-field/insert',[PatientcasestudyController::class,'Ajaxinsert'])->name('dynamic-field.insert');
    Route::post('/casestudy/update', [PatientcasestudyController::class, 'PrescriptionCaseStudyUpdate'])->name('update.prescriptioncasestudy');
    Route::get('/findout/{patientname}', [PatientcasestudyController::class, 'Patientname']);
    // For Prescription
    Route::get('/view', [PrescriptionController::class, 'PrescriptionView'])->name('view.prescription');
    Route::get('/add', [PrescriptionController::class, 'PrescriptionAdd'])->name('add.prescription');
    Route::post('/store', [PrescriptionController::class, 'PrescriptionStore'])->name('store.prescription');
    Route::get('/edit/{id}', [PrescriptionController::class, 'patientPrescriptionForEdit'])->name('edit.prescription');
    Route::get('/delete/{id}', [PrescriptionController::class, 'PrescriptionDelete'])->name('delete.prescription');
    Route::get('/patient/{id}', [PrescriptionController::class, 'DeatilsPrescription']);
    Route::post('/update/{id}', [PrescriptionController::class, 'PrescriptionUpdate'])->name('update.prescription');
    // Patient Case Study End



    //############################# Outles Route Start ################################

    //for ajax request for updating prescription
    Route::get('/prescriptionMedicine/{prescription_id}', [PrescriptionController::class, 'getPrescriptionMedicineForEdit']);
    Route::get('/diagonosis/{prescription_id}', [PrescriptionController::class, 'getDiagonosisForEdit']);
});


// prescription end

//outlet routes start here
Route::prefix('outlet')->group(function () {
    Route::get('/view', [OutletController::class, 'ViewOutlet'])->name('view.outlet');
    Route::get('/add', [OutletController::class, 'AddOutlet'])->name('add.outlet');
    Route::post('/store', [OutletController::class, 'outletStore'])->name('store.outlet');
    Route::get('/delete/{id}', [OutletController::class, 'deleteOutlet'])->name('delete.outlet');
    Route::get('/edit/{id}', [OutletController::class, 'editOutlet'])->name('edit.outlet');
    Route::post('/update', [OutletController::class, 'outletUpdate'])->name('update.outlet');



    // Route::post('/update', [PharmacistController::class, 'UpdatePharmacist'])->name('update.pharmacist');
    // Route::get('/delete/{id}', [PharmacistController::class, 'DeletePharmacist'])->name('delete.pharmacist');
    // Route::get('edit-pharmacist/{id}', [PharmacistController::class, 'EditPharmacist'])->name('edit.pharmacist');
    // Route::get('/list/view', [PharmacistController::class, 'ListPharmacistView'])->name('list.pharmacists');


    // admins of different outlet
    Route::get('/admin/view', [OutletController::class, 'AdminView'])->name('manage.admins');
    Route::post('/admin/store', [OutletController::class, 'AdminStore'])->name('store.admins');
});

// employee routes
Route::prefix('employe')->group(function () {
    Route::get('/add', [EmployeeController::class, 'AddEmployee'])->name('add.employe');
    Route::post('/store', [EmployeeController::class, 'EmployeeStore'])->name('store.employe');
});

// Messages Route Start
Route::prefix('Messages')->group(function () {
    Route::get('/inbox/view', [MessageController::class, 'InboxMessageView'])->name('message.inbox.view');
    Route::get('/sent/view/', [MessageController::class, 'SendMessageView'])->name('message.sent.view');//for ajax request
    Route::get('/sent/show/{id}', [MessageController::class, 'ShowSingleSentMessage']);//for ajax request
    Route::post('/store', [MessageController::class, 'SendMessageStore'])->name('message.store');
    Route::get('/delete/{id}', [MessageController::class, 'SendMessageDelete'])->name('message.delete');
});
// Messages Route End

// roles routes
Route::prefix('role')->group(function () {
    Route::get('/add', [RoleController::class, 'AddRole'])->name('add.roles');
    Route::post('/store', [RoleController::class, 'StoreRole']);
});

// permissions route
Route::prefix('permission')->group(function () {
    Route::get('/add', [PermissionController::class, 'AddPermission'])->name('add.permissions');
    Route::post('/store', [PermissionController::class, 'StorePermission']);
});

// insurance
Route::prefix('insurance')->group(function () {
    Route::get('/view', [InsuranceController::class, 'ViewInsurance'])->name('view.insurance');
    Route::get('/add', [InsuranceController::class, 'AddInsurance'])->name('add.insurance');
    Route::post('/store', [InsuranceController::class, 'StoreInsurance'])->name('store.insurance');
    // Route::get('/delete/{id}', [OutletController::class, 'deleteOutlet'])->name('delete.outlet');
    // Route::get('/edit/{id}', [OutletController::class, 'editOutlet'])->name('edit.outlet');
    // Route::post('/update', [OutletController::class, 'outletUpdate'])->name('update.outlet');

});
