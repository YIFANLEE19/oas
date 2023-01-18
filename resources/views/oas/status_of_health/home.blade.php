@extends('oas.layouts.app')

@section('content')

    {{-- modal --}}
    <style>
        .modal-backdrop {
            background-color: rgb(50, 47, 47);
        }
    </style>

    @if ($application_status_id == config('constants.APPLICATION_STATUS_CODE.NEW_USER'))
        <script>$(function(){$('#statusCode0Modal').modal('show');});</script>
    @elseif($application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_PERSONAL_PARTICULARS'))
        <script>$(function(){$('#statusCode1Modal').modal('show');});</script>
    @elseif($application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_PARENT_GUARDIAN_PARTICULARS'))
        <script>$(function(){$('#statusCode2Modal').modal('show');});</script>
    @elseif($application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_EMERGENCY_CONTACT'))
        <script>$(function(){$('#statusCode3Modal').modal('show');});</script>
    @elseif($application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_PROFILE_PICTURE'))
        <script>$(function(){$('#statusCode4Modal').modal('show');});</script>
    @elseif($application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_PROGRAM_SELECTION'))
        <script>$(function(){$('#statusCode5Modal').modal('show');});</script>
    @elseif($application_status_id >= config('constants.APPLICATION_STATUS_CODE.COMPLETE_STATUS_OF_HEALTH'))
        <script>$(function(){$('#statusCode7Modal').modal('show');});</script>
    @endif
    {{-- status 0 = personal particulars X --}}
    <div class="modal fade" id="statusCode0Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode0ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h1 class="modal-title fs-5" id="statusCode0ModalLabel">{{ __('modal.kindly_reminder') }}</h1></div>
                <div class="modal-body">
                    <p>{{ __('modal.pp_description1') }}</p>
                    <p>{{ __('modal.pp_description2') }}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('button.back_to_home_page') }}</a>
                    <a href="{{ route('personalParticulars.home') }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
                </div>
            </div>
        </div>
    </div>
    {{-- status 1 = personal particulars / AND parent guardian particulars X --}}
    <div class="modal fade" id="statusCode1Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode1ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h1 class="modal-title fs-5" id="statusCode1ModalLabel">{{ __('modal.kindly_reminder') }}</h1></div>
                <div class="modal-body">
                    <p>{{ __('modal.pg_description1') }}</p>
                    <p>{{ __('modal.pg_description2') }}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('button.back_to_home_page') }}</a>
                    <a href="{{ route('parentGuardianParticulars.home') }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
                </div>
            </div>
        </div>
    </div>
    {{-- status 2 = personal particulars / AND parent guardian particulars / AND emergency contact X --}}
    <div class="modal fade" id="statusCode2Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode2ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h1 class="modal-title fs-5" id="statusCode2ModalLabel">{{ __('modal.kindly_reminder') }}</h1></div>
                <div class="modal-body">
                    <p>{{ __('modal.ec_description1') }}</p>
                    <p>{{ __('modal.ec_description2') }}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('button.back_to_home_page') }}</a>
                    <a href="{{ route('emergencyContact.home') }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
                </div>
            </div>
        </div>
    </div>
    {{-- status 3 = personal particulars / AND parent guardian particulars / AND emergency contact / AND profile picture X --}}
    <div class="modal fade" id="statusCode3Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode3ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h1 class="modal-title fs-5" id="statusCode3ModalLabel">{{ __('modal.kindly_reminder') }}</h1></div>
                <div class="modal-body">
                    <p>{{ __('modal.pic_description1') }}</p>
                    <p>{{ __('modal.pic_description2') }}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('button.back_to_home_page') }}</a>
                    <a href="{{ route('profilePicture.home') }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}
    {{-- status 4 = personal particulars / AND parent guardian particulars / AND emergency contact / AND profile picture X --}}
    <div class="modal fade" id="statusCode4Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode3ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h1 class="modal-title fs-5" id="statusCode4ModalLabel">{{ __('modal.kindly_reminder') }}</h1></div>
                <div class="modal-body">
                    <p>{{ __('modal.ps_description1') }}</p>
                    <p>{{ __('modal.ps_description2') }}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('button.back_to_home_page') }}</a>
                    <a href="#" type="button" class="btn btn-primary">{{ __('button.continue') }} -- no function</a>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}
    {{-- status 5 = personal particulars / AND parent guardian particulars / AND emergency contact / AND profile picture X --}}
    <div class="modal fade" id="statusCode5Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode3ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h1 class="modal-title fs-5" id="statusCode5ModalLabel">{{ __('modal.kindly_reminder') }}</h1></div>
                <div class="modal-body">
                    <p>{{ __('modal.ar_description1') }}</p>
                    <p>{{ __('modal.ar_description2') }}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('button.back_to_home_page') }}</a>
                    <a href="{{ route('academicDetail.home') }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}
    {{-- status 7 = personal particulars / AND parent guardian particulars / AND emergency contact / AND profile picture / AND program selection / AND academic Record /--}}
    <div class="modal fade" id="statusCode7Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode4ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h1 class="modal-title fs-5" id="statusCode7ModalLabel">{{ __('modal.thank_you') }}</h1></div>
                <div class="modal-body">
                    <p>{{ __('modal.complete_soh_modal_description1') }}</p>
                    <p>{{ __('modal.complete_soh_modal_description2') }}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('button.back_to_home_page') }}</a>
                    <a href="{{ route('agreements.home') }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}

{{-- header --}}
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="border-bottom">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('button.home') }}</a></li>
                      <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('statusOfHealth.title') }}</li>
                    </ol>
                </nav>
                <h1 class="fw-bold">{{ __('statusOfHealth.title') }}</h1>
                <p><span class="fw-bold">Step 3 of 7</span> Completed</p>
                <div class="progress mb-2" style="height: 10px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 42%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary opacity-25" role="progressbar" style="width: 58%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end header --}}

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('statusOfHealth.header') }}</div>
                <div class="card-body">
                    <p>{{ __('statusOfHealth.description') }}</p>
                    <div class="row mb-3">
                        <div class="col-md-12 table-responsive">
                            <table class="table">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th scope="col">{{ __('statusOfHealth.table_title1') }}</th>
                                            <th scope="col">{{ __('statusOfHealth.table_title2') }}</th>
                                            <th scope="col">{{ __('statusOfHealth.table_title3') }}</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                        <!-- form -->
                                        <form action="{{route('statusOfHealth.create')}}" method="POST" enctype="multipart/form-data" >
                                        @csrf
                                        

                                        <tr>
                                            <td><input type="hidden" name="disease_id[1]" value="1">{{ $diseases[0]->name }}</td>
                                            <td>
                                                <select name="h_status[1]" id="h_status" class="form-select" onchange="changeMethod1(this)">
                                                    <option value="No">{{ __('statusOfHealth.choose1') }}</option>
                                                    <option value="Yes">{{ __('statusOfHealth.choose2') }}</option>
                                                </select>
                                            </td>
                                            <td>         
                                                <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="h_remark[1]" id="remark1" value="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="hidden" name="disease_id[2]" value="2">{{ $diseases[1]->name }}</td>
                                            <td>
                                                <select name="h_status[2]" id="h_status" class="form-select" onchange="changeMethod2(this)">
                                                    <option value="No">{{ __('statusOfHealth.choose1') }}</option>
                                                    <option value="Yes">{{ __('statusOfHealth.choose2') }}</option>
                                                </select>
                                            </td>
                                            <td>         
                                                <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="h_remark[2]" id="remark2" value="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="hidden" name="disease_id[3]" value="3">{{ $diseases[2]->name }}</td>
                                            <td>
                                                <select name="h_status[3]" id="h_status" class="form-select" onchange="changeMethod3(this)">
                                                    <option value="No">{{ __('statusOfHealth.choose1') }}</option>
                                                    <option value="Yes">{{ __('statusOfHealth.choose2') }}</option>
                                                </select>
                                            </td>
                                            <td>         
                                                <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="h_remark[3]" id="remark3" value="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="hidden" name="disease_id[4]" value="4">{{ $diseases[3]->name }}</td>
                                            <td>
                                                <select name="h_status[4]" id="h_status" class="form-select" onchange="changeMethod4(this)">
                                                    <option value="No">{{ __('statusOfHealth.choose1') }}</option>
                                                    <option value="Yes">{{ __('statusOfHealth.choose2') }}</option>
                                                </select>
                                            </td>
                                            <td>         
                                                <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="h_remark[4]" id="remark4" value="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="hidden" name="disease_id[5]" value="5">{{ $diseases[4]->name }}</td>
                                            <td>
                                                <select name="h_status[5]" id="h_status" class="form-select" onchange="changeMethod5(this)">
                                                    <option value="No">{{ __('statusOfHealth.choose1') }}</option>
                                                    <option value="Yes">{{ __('statusOfHealth.choose2') }}</option>
                                                </select>
                                            </td>
                                            <td>         
                                                <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="h_remark[5]" id="remark5" value="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="hidden" name="disease_id[6]" value="6">{{ $diseases[5]->name }}</td>
                                            <td>
                                                <select name="h_status[6]" id="h_status" class="form-select" onchange="changeMethod6(this)">
                                                    <option value="No">{{ __('statusOfHealth.choose1') }}</option>
                                                    <option value="Yes">{{ __('statusOfHealth.choose2') }}</option>
                                                </select>
                                            </td>
                                            <td>         
                                                <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="h_remark[6]" id="remark6" value="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="hidden" name="disease_id[7]" value="7">{{ $diseases[6]->name }}</td>
                                            <td>
                                                <select name="h_status[7]" id="h_status" class="form-select" onchange="changeMethod7(this)">
                                                    <option value="No">{{ __('statusOfHealth.choose1') }}</option>
                                                    <option value="Yes">{{ __('statusOfHealth.choose2') }}</option>
                                                </select>
                                            </td>
                                            <td>         
                                                <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="h_remark[7]" id="remark7" value="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="hidden" name="disease_id[8]" value="8">{{ $diseases[7]->name }}</td>
                                            <td>
                                                <select name="h_status[8]" id="h_status" class="form-select" onchange="changeMethod8(this)">
                                                    <option value="No">{{ __('statusOfHealth.choose1') }}</option>
                                                    <option value="Yes">{{ __('statusOfHealth.choose2') }}</option>
                                                </select>
                                            </td>
                                            <td>         
                                                <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="h_remark[8]" id="remark8" value="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="hidden" name="disease_id[9]" value="9">{{ $diseases[8]->name }}</td>
                                            <td>
                                                <select name="h_status[9]" id="h_status" class="form-select" onchange="changeMethod9(this)">
                                                    <option value="No">{{ __('statusOfHealth.choose1') }}</option>
                                                    <option value="Yes">{{ __('statusOfHealth.choose2') }}</option>
                                                </select>
                                            </td>
                                            <td>         
                                                <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="h_remark[9]" id="remark9" value="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="hidden" name="disease_id[10]" value="10">{{ $diseases[9]->name }}</td>
                                            <td>
                                                <select name="h_status[10]" id="h_status" class="form-select" onchange="changeMethod10(this)">
                                                    <option value="No">{{ __('statusOfHealth.choose1') }}</option>
                                                    <option value="Yes">{{ __('statusOfHealth.choose2') }}</option>
                                                </select>
                                            </td>
                                            <td>         
                                                <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="h_remark[10]" id="remark10" value="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="hidden" name="disease_id[11]" value="11">{{ $diseases[10]->name }}</td>
                                            <td>
                                                <select name="h_status[11]" id="h_status" class="form-select" onchange="changeMethod11(this)">
                                                    <option value="No">{{ __('statusOfHealth.choose1') }}</option>
                                                    <option value="Yes">{{ __('statusOfHealth.choose2') }}</option>
                                                </select>
                                            </td>
                                            <td>         
                                                <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="h_remark[11]" id="remark11" value="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="hidden" name="disease_id[12]" value="12">{{ $diseases[11]->name }}</td>
                                            <td>
                                                <select name="h_status[12]" id="h_status" class="form-select" onchange="changeMethod12(this)">
                                                    <option value="No">{{ __('statusOfHealth.choose1') }}</option>
                                                    <option value="Yes">{{ __('statusOfHealth.choose2') }}</option>
                                                </select>
                                            </td>
                                            <td>         
                                                <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="h_remark[12]" id="remark12" value="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="hidden" name="disease_id[13]" value="13">{{ $diseases[12]->name }}</td>
                                            <td>
                                                <select name="h_status[13]" id="h_status" class="form-select" onchange="changeMethod13(this)">
                                                    <option value="No">{{ __('statusOfHealth.choose1') }}</option>
                                                    <option value="Yes">{{ __('statusOfHealth.choose2') }}</option>
                                                </select>
                                            </td>
                                            <td>         
                                                <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="h_remark[13]" id="remark13" value="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="hidden" name="disease_id[14]" value="14">{{ $diseases[13]->name }}</td>
                                            <td>
                                                <select name="h_status[14]" id="h_status" class="form-select" onchange="changeMethod14(this)">
                                                    <option value="No">{{ __('statusOfHealth.choose1') }}</option>
                                                    <option value="Yes">{{ __('statusOfHealth.choose2') }}</option>
                                                </select>
                                            </td>
                                            <td>         
                                                <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="h_remark[14]" id="remark14" value="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="hidden" name="disease_id[15]" value="15">{{ $diseases[14]->name }}</td>
                                            <td>
                                                <select name="h_status[15]" id="h_status" class="form-select" onchange="changeMethod15(this)">
                                                    <option value="No">{{ __('statusOfHealth.choose1') }}</option>
                                                    <option value="Yes">{{ __('statusOfHealth.choose2') }}</option>
                                                </select>
                                            </td>
                                            <td>         
                                                <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="h_remark[15]" id="remark15" value="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="hidden" name="disease_id[16]" value="16">{{ $diseases[15]->name }}</td>
                                            <td>
                                                <select name="h_status[16]" id="h_status" class="form-select" onchange="changeMethod16(this)">
                                                    <option value="No">{{ __('statusOfHealth.choose1') }}</option>
                                                    <option value="Yes">{{ __('statusOfHealth.choose2') }}</option>
                                                </select>
                                            </td>
                                            <td>         
                                                <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="h_remark[16]" id="remark16" value="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="hidden" name="disease_id[17]" value="17">{{ $diseases[16]->name }}</td>
                                            <td>
                                                <select name="h_status[17]" id="h_status" class="form-select" onchange="changeMethod17(this)">
                                                    <option value="No">{{ __('statusOfHealth.choose1') }}</option>
                                                    <option value="Yes">{{ __('statusOfHealth.choose2') }}</option>
                                                </select>
                                            </td>
                                            <td>         
                                                <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="h_remark[17]" id="remark17" value="" class="form-control">
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end mb-3 mt-3">
                        <a href="{{ route('academicDetail.home') }}" class="btn btn-outline-secondary me-3">{{ __('statusOfHealth.back_button') }}</a>
                        <button type="submit" class="btn btn-primary">{{ __('statusOfHealth.next_button') }}</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function changeMethod1(select){
        if(select.value == 'Yes'){
            document.getElementById('remark1').setAttribute('required','');
        } else{
            document.getElementById('remark1').removeAttribute('required','');
        }
    }

    function changeMethod2(select){
        if(select.value == 'Yes'){
            document.getElementById('remark2').setAttribute('required','');
        } else{
            document.getElementById('remark2').removeAttribute('required','');
        }
    }

    function changeMethod3(select){
        if(select.value == 'Yes'){
            document.getElementById('remark3').setAttribute('required','');
        } else{
            document.getElementById('remark3').removeAttribute('required','');
        }
    }

    function changeMethod4(select){
        if(select.value == 'Yes'){
            document.getElementById('remark4').setAttribute('required','');
        } else{
            document.getElementById('remark4').removeAttribute('required','');
        }
    }

    function changeMethod5(select){
        if(select.value == 'Yes'){
            document.getElementById('remark5').setAttribute('required','');
        } else{
            document.getElementById('remark5').removeAttribute('required','');
        }
    }

    function changeMethod6(select){
        if(select.value == 'Yes'){
            document.getElementById('remark6').setAttribute('required','');
        } else{
            document.getElementById('remark6').removeAttribute('required','');
        }
    }

    function changeMethod7(select){
        if(select.value == 'Yes'){
            document.getElementById('remark7').setAttribute('required','');
        } else{
            document.getElementById('remark7').removeAttribute('required','');
        }
    }

    function changeMethod8(select){
        if(select.value == 'Yes'){
            document.getElementById('remark8').setAttribute('required','');
        } else{
            document.getElementById('remark8').removeAttribute('required','');
        }
    }

    function changeMethod9(select){
        if(select.value == 'Yes'){
            document.getElementById('remark9').setAttribute('required','');
        } else{
            document.getElementById('remark9').removeAttribute('required','');
        }
    }

    function changeMethod10(select){
        if(select.value == 'Yes'){
            document.getElementById('remark10').setAttribute('required','');
        } else{
            document.getElementById('remark10').removeAttribute('required','');
        }
    }

    function changeMethod11(select){
        if(select.value == 'Yes'){
            document.getElementById('remark11').setAttribute('required','');
        } else{
            document.getElementById('remark11').removeAttribute('required','');
        }
    }

    function changeMethod12(select){
        if(select.value == 'Yes'){
            document.getElementById('remark12').setAttribute('required','');
        } else{
            document.getElementById('remark12').removeAttribute('required','');
        }
    }
    function changeMethod13(select){
        if(select.value == 'Yes'){
            document.getElementById('remark13').setAttribute('required','');
        } else{
            document.getElementById('remark13').removeAttribute('required','');
        }
    }

    function changeMethod14(select){
        if(select.value == 'Yes'){
            document.getElementById('remark14').setAttribute('required','');
        } else{
            document.getElementById('remark14').removeAttribute('required','');
        }
    }

    function changeMethod15(select){
        if(select.value == 'Yes'){
            document.getElementById('remark15').setAttribute('required','');
        } else{
            document.getElementById('remark15').removeAttribute('required','');
        }
    }

    function changeMethod16(select){
        if(select.value == 'Yes'){
            document.getElementById('remark16').setAttribute('required','');
        } else{
            document.getElementById('remark16').removeAttribute('required','');
        }
    }

    function changeMethod17(select){
        if(select.value == 'Yes'){
            document.getElementById('remark17').setAttribute('required','');
        } else{
            document.getElementById('remark17').removeAttribute('required','');
        }
    }
    </script>
@endsection