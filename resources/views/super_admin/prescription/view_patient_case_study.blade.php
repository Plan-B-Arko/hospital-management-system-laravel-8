@extends('layouts.admin_master')

@section('super-admin-content')

    <div class="container-full topBar">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">



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
                                                <th rowspan="1" colspan="1" style="width: 120px;">Patient ID</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;"> Food Allergies</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Tendency Bleed</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Heart Disease</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">High Blood Pressure</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Diabetic</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Surgery</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Accident</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Family Medical History
                                                </th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Current Medication</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Female Pregnancy</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Breast Feeding</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Health Insurance</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Low Income</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Weight</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Reference</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Status</th>

                                                <th rowspan="1" colspan="1" style="width: 89px;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($casestudys as $casestudy)
                                                <tr>
                                                    <td>{{ $casestudy->id }}</td>
                                                    <td>{{ $casestudy->patient_id }}</td>
                                                    <td>{{ $casestudy->food_allergies }}</td>
                                                    <td>{{ $casestudy->tendency_bleed }}</td>
                                                    <td>{{ $casestudy->heart_disease }}</td>
                                                    <td>{{ $casestudy->high_blood_pressure }}</td>
                                                    <td>{{ $casestudy->diabetic }}</td>
                                                    <td>{{ $casestudy->surgery }}</td>
                                                    <td>{{ $casestudy->accident }}</td>
                                                    <td>{{ $casestudy->family_medical_history }}</td>
                                                    <td>{{ $casestudy->current_medication }}</td>
                                                    <td>{{ $casestudy->family_pregnency }}</td>
                                                    <td>{{ $casestudy->breast_feeding }}</td>
                                                    <td>{{ $casestudy->health_insurance }}</td>
                                                    <td>{{ $casestudy->low_income }}</td>
                                                    <td>{{ $casestudy->weight }}</td>
                                                    <td>{{ $casestudy->reference }}</td>
                                                    <td>{{ $casestudy->status }}</td>
                                                    <td>
                                                        <a href="{{ route('edit.prescriptioncasestudy', $casestudy->id) }}"
                                                            class="btn btn-sm btn-danger ">
                                                            <i class="fa fa-pencil-alt"></i></a>

                                                        <a href="{{ route('delete.prescriptioncasestudy', $casestudy->id) }}"
                                                            class="btn btn-sm btn-danger" id="delete" title="delete data"><i
                                                                class="fa fa-trash"></i></a>
                                                        {{-- <button type="button" value="{{ $newbed->id }}"
                                                            class="btn btn-success editBtn btn-sm"><i
                                                                class="fa fa-pencil-alt"></i></button> --}}
                                                        {{-- <a href="{{ route('newbed.delete', $newbed->id) }}"
                                                            class="btn btn-sm btn-danger" id="delete" title="delete data">
                                                            <i class="fa fa-trash"></i> --}}
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


@endsection
