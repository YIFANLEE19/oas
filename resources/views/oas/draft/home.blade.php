@extends('oas.layouts.app')

@section('content')

{{-- modal --}}
<style>
    .modal-backdrop {
        background-color: rgb(50, 47, 47);
    }
</style>

@if ($application_status_id == config('constants.APPLICATION_STATUS_CODE.NEW_USER'))
<script>
    $(function() {
        $('#statusCode0Modal').modal('show');
    });
</script>
@elseif($application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_PERSONAL_PARTICULARS'))
<script>
    $(function() {
        $('#statusCode1Modal').modal('show');
    });
</script>
@elseif($application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_PARENT_GUARDIAN_PARTICULARS'))
<script>
    $(function() {
        $('#statusCode2Modal').modal('show');
    });
</script>
@elseif($application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_EMERGENCY_CONTACT'))
<script>
    $(function() {
        $('#statusCode3Modal').modal('show');
    });
</script>
@elseif($application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_PROFILE_PICTURE'))
<script>
    $(function() {
        $('#statusCode4Modal').modal('show');
    });
</script>
@elseif($application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_PROGRAM_SELECTION'))
<script>
    $(function() {
        $('#statusCode5Modal').modal('show');
    });
</script>
@elseif($application_status_id == config('constants.APPLICATION_STATUS_CODE.COMEPLTE_ACADEMIC_RECORD'))
<script>
    $(function() {
        $('#statusCode6Modal').modal('show');
    });
</script>
@elseif($application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_STATUS_OF_HEALTH'))
<script>
    $(function() {
        $('#statusCode7Modal').modal('show');
    });
</script>
@elseif($application_status_id >= config('constants.APPLICATION_STATUS_CODE.COMPLETE_DRAFT'))
<script>
    $(function() {
        $('#statusCode9Modal').modal('show');
    });
</script>
@endif
{{-- status 0 = personal particulars X --}}
<div class="modal fade" id="statusCode0Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode0ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="statusCode0ModalLabel">{{ __('modal.kindly_reminder') }}</h1>
            </div>
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
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="statusCode1ModalLabel">{{ __('modal.kindly_reminder') }}</h1>
            </div>
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
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="statusCode2ModalLabel">{{ __('modal.kindly_reminder') }}</h1>
            </div>
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
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="statusCode3ModalLabel">{{ __('modal.kindly_reminder') }}</h1>
            </div>
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
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="statusCode4ModalLabel">{{ __('modal.kindly_reminder') }}</h1>
            </div>
            <div class="modal-body">
                <p>{{ __('modal.ps_description2') }}</p>
                <p>{{ __('modal.ps_description2') }}</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('button.back_to_home_page') }}</a>
                <a href="{{ route('program_selection.program_selection') }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
            </div>
        </div>
    </div>
</div>
{{-- end modal --}}
{{-- status 5 = personal particulars / AND parent guardian particulars / AND emergency contact / AND profile picture X --}}
<div class="modal fade" id="statusCode5Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode3ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="statusCode5ModalLabel">{{ __('modal.kindly_reminder') }}</h1>
            </div>
            <div class="modal-body">
                <p>{{ __("modal.ar_description1") }}</p>
                <p>{{ __("modal.ar_description2") }}</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('button.back_to_home_page') }}</a>
                <a href="{{ route('academicDetail.home') }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
            </div>
        </div>
    </div>
</div>
{{-- end modal --}}
{{-- status 6 = personal particulars / AND parent guardian particulars / AND emergency contact / AND profile picture / AND program selection / AND academic Record /--}}
<div class="modal fade" id="statusCode6Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode4ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="statusCode5ModalLabel">{{ __('modal.kindly_reminder') }}</h1>
            </div>
            <div class="modal-body">
                <p>{{ __('modal.soh_description1') }}</p>
                <p>{{ __('modal.soh_description2') }}</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('button.back_to_home_page') }}</a>
                <a href="{{ route('statusOfHealth.home') }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
            </div>
        </div>
    </div>
</div>
{{-- end modal --}}
{{-- status 7 = personal particulars / AND parent guardian particulars / AND emergency contact / AND profile picture / AND program selection / AND academic Record /--}}
<div class="modal fade" id="statusCode7Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode4ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="statusCode5ModalLabel">{{ __('modal.kindly_reminder') }}</h1>
            </div>
            <div class="modal-body">
                <p>{{ __('modal.agree_description1') }}</p>
                <p>{{ __('modal.agree_description2') }}</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('button.back_to_home_page') }}</a>
                <a href="{{ route('agreements.home') }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
            </div>
        </div>
    </div>
</div>
{{-- end modal --}}
{{-- status 9 = personal particulars / AND parent guardian particulars / AND emergency contact / AND profile picture / AND program selection / AND academic Record /--}}
<div class="modal fade" id="statusCode9Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode4ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="statusCode9ModalLabel">{{ __('modal.congratulations') }}</h1>
            </div>
            <div class="modal-body">
                <p>{{ __('modal.complete_draft_modal_description1') }}</p>
                <p>{{ __('modal.complete_draft_modal_description2') }}</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('button.back_to_home_page') }}</a>
                <a href="{{ route('supporting_document.supporting_document') }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
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
                      <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('draft.title') }}</li>
                    </ol>
                </nav>
                <h1 class="fw-bold">{{ __('draft.title') }}</h1>
                <p><span class="fw-bold">Step 5 of 7</span> Completed</p>
                <div class="progress mb-2" style="height: 10px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 56%" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary opacity-25" role="progressbar" style="width: 44%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end header --}}

<div class="container mt-2">
    {{-- success message --}}
    @if(Session::has('successAcademic'))
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('successAcademic') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @elseif(Session::has('successSOH'))
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('successSOH') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @elseif(Session::has('error'))
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif
    {{-- end success message --}}
    <form action="{{ route('draft.submit') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('draft.header') }}</div>

                    {{--Course Selection--}}
                    <div class="card-body">
                        <div class="row px-3 mt-3 mb-3">
                            <div class="card-header bg-primary text-white px-2 py-2 d-flex justify-content-between align-items-center">
                                Course Selection
                                <a data-bs-toggle="modal" data-bs-target="#editprogramselectionmodal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                            </div>
                            <div class="col-sm-12 pt-2">
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">Intake Year:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $semesterYearMapping->year_offered }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">Intake Month:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $semester->semesters }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6 ">Course Selected:</p>
                                    @if($programmeLevel->id==3 || $programmeLevel->id==4 || $programmeLevel->id==5 || $programmeLevel->id==6 || $programmeLevel->id==7)
                                    <p class="lead col-sm-6 fw-bold">Undergraduate</p>
                                    @elseif($programmeLevel->id==1 || $programmeLevel->id==2)
                                    <p class="lead col-sm-6 fw-bold">Postgraduate</p>
                                    @endif
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">Programme 1:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $programme1->EnglishName }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">Programme 2:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $programme2->EnglishName }}</p>
                                </div>
                                @if($programmePicked3!=null)
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">Programme 3:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $programme3->EnglishName }}</p>
                                </div>
                                @endif
                            </div>
                        </div>

                        {{--Personal Particulars--}}
                        <div class="row px-3 mt-3 mb-3">
                            <div class="card-header bg-primary text-white px-2 py-2 d-flex justify-content-between align-items-center">
                                {{ __('userProfile.title1') }}
                                <a data-bs-toggle="modal" data-bs-target="#editPersonalParticularModal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                            </div>
                            <div class="col-sm-12 pt-2">
                                @if($getPersonalUserDetail->ch_name !=null)
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.ch_name') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $getPersonalUserDetail->ch_name }}</p>
                                </div>
                                @endif
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.en_name') }}:</p>
                                    <p class="lead col-sm-6 fw-bold text-capitalize">{{ $getPersonalUserDetail->en_name }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.ic') }}:</p>
                                    <p class="lead col-sm-6 fw-bold" id="read_personal_ic">{{ $getPersonalUserDetail->ic }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.race') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $getApplicantProfile->race['name'] }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.gender') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $getApplicantProfile->gender['name'] }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.nationality') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $getApplicantProfile->nationality['name'] }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.religion') }}: </p>
                                    <p class="lead col-sm-6 fw-bold">{{ $getApplicantProfile->religion['name'] }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.pob') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $getApplicantProfile->place_of_birth }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.bd') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $getApplicantProfile->birth_date }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.ms') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $getApplicantProfile->marital['name'] }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.tel_hp') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $getPersonalUserDetail->tel_hp }}</p>
                                </div>
                                @if($getPersonalUserDetail->tel_h !=null)
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.tel_h') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $getPersonalUserDetail->tel_h }}</p>
                                </div>
                                @endif
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.email') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $getPersonalUserDetail->email }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.c_address') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $p_c_address->street1 }},{{ $p_c_address->street2 }},{{ $p_c_address->zipcode }},{{ $p_c_address->city }},{{ $p_c_address->state }},{{ $p_c_address->country['name'] }}.</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.p_address') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $p_p_address->street1 }},{{ $p_p_address->street2 }},{{ $p_p_address->zipcode }},{{ $p_p_address->city }},{{ $p_p_address->state }},{{ $p_p_address->country['name'] }}.</p>
                                </div>
                            </div>
                        </div>

                        {{--Parent Guardian Particulars--}}
                        <div class="row px-3 mt-3 mb-3">
                            <div class="card-header bg-primary text-white px-2 py-2 d-flex justify-content-between align-items-center">
                                {{ __('userProfile.title2') }}
                                <a data-bs-toggle="modal" data-bs-target="#editParentGuardianModal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                            </div>
                            <div class="col-sm-12 pt-2">
                                @if($guardian_user_detail->ch_name !=null)
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.ch_name') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $guardian_user_detail->ch_name }}</p>
                                </div>
                                @endif
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.en_name') }}:</p>
                                    <p class="lead col-sm-6 fw-bold text-capitalize">{{ $guardian_user_detail->en_name }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.ic') }}:</p>
                                    <p class="lead col-sm-6 fw-bold" id="read_ic">{{ $guardian_user_detail->ic }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.income_range') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $getGuardianDetail->income['range'] }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.relationship') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $getGuardianDetail->guardianRelationship['name'] }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.occupation') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $getGuardianDetail->occupation }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.nationality') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $getGuardianDetail->nationality['name'] }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.tel_hp') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $guardian_user_detail->tel_hp }}</p>
                                </div>
                                @if($guardian_user_detail->email !=null)
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.email') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $guardian_user_detail->email }}</p>
                                </div>
                                @endif
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.p_address') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $g_p_address->street1 }},{{ $g_p_address->street2 }},{{ $g_p_address->zipcode }},{{ $g_p_address->city }},{{ $g_p_address->state }},{{ $g_p_address->country['name'] }}.</p>
                                </div>
                            </div>
                        </div>

                        {{--Emergency Contact (2 persons)--}}
                        <div class="row px-3 mt-3 mb-3">
                            <div class="card-header bg-primary text-white px-2 py-2 d-flex justify-content-between align-items-center">
                                {{ __('userProfile.title3') }}
                                <a data-bs-toggle="modal" data-bs-target="#editEmergencyModal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                            </div>
                            <div class="col-sm-12 pt-2">
                                <div class="d-flex flex-row">
                                    <p class="lead fw-bold">{{ __('inputFields.p1') }} &nbsp;</p>
                                </div>
                                @if ($e_user_detail1->cn_name != null)
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.ch_name') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $e_user_detail1->cn_name }}</p>
                                </div>
                                @endif
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.en_name') }}:</p>
                                    <p class="lead col-sm-6 fw-bold text-capitalize">{{ $e_user_detail1->en_name }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.relationship') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $emergency_contact1->guardianRelationship['name'] }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.tel_hp') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $e_user_detail1->tel_hp }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead fw-bold">{{ __('inputFields.p2') }}:</p>
                                </div>
                                @if ($e_user_detail2->cn_name != null)
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.ch_name') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $e_user_detail2->cn_name }}</p>
                                </div>
                                @endif
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.en_name') }}:</p>
                                    <p class="lead col-sm-6 fw-bold text-capitalize">{{ $e_user_detail2->en_name }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.relationship') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $emergency_contact2->guardianRelationship['name'] }}</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="lead col-sm-6">{{ __('inputFields.tel_hp') }}:</p>
                                    <p class="lead col-sm-6 fw-bold">{{ $e_user_detail2->tel_hp }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Profile Picture --}}
                        <div class="row px-3 mt-3 mb-3">
                            <div class="card-header bg-primary text-white px-2 py-2 d-flex justify-content-between align-items-center">
                                {{ __('userProfile.title4') }}
                                <a data-bs-toggle="modal" data-bs-target="#editProfilePictureModal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                            </div>
                            <div class="col-sm-12 pt-2">
                                <img src="/images/profile_picture/{{ $applicant_profile_picture->path }}" class="img-fluid" width="217px" height="280px">
                            </div>
                        </div>
                        {{--Academic Record--}}
                        <div class="row px-3 mt-3 mb-3">
                            <div class="card-header bg-primary text-white px-2 py-2 d-flex justify-content-between align-items-center">
                                {{ __('academicRecord.header') }}
                                <a data-bs-toggle="modal" data-bs-target="#editAcademicRecordModal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                            </div>
                            <div class="col-sm-12 pt-2">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th scope="col">{{ __('academicRecord.table_title1') }}</th>
                                                <th scope="col">{{ __('academicRecord.table_title2') }}</th>
                                                <th scope="col">{{ __('academicRecord.table_title3') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($academicRecord as $ar)
                                            <tr>
                                                <td>
                                                    <p name="school_level" id="school_level">{{ $ar->school_level['name'] }} <span></p>
                                                </td>
                                                <td>
                                                    <p>{{ $ar->school_name }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $ar->school_graduation }}</p>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- {{--Transcript--}}
                    <div class="row px-3 mt-3 mb-3">
                    <div class="card-header bg-primary text-white px-2 py-2">Transcript</div>
                        <div class="col-sm-12 pt-2">
                            <input type="file" class="form-control">
                        </div>
                    </div> -->

                        {{--Status of Health--}}
                        <div class="row px-3 mt-3 mb-3">
                            <div class="card-header bg-primary text-white px-2 py-2 d-flex justify-content-between align-items-center">
                                {{ __('statusOfHealth.header') }}
                                <a data-bs-toggle="modal" data-bs-target="#editSOHModal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                            </div>
                            <div class="col-sm-12 pt-2">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th scope="col">{{ __('draft.statusOfHealth_table_title1') }}</th>
                                                <th scope="col">{{ __('draft.statusOfHealth_table_title2') }}</th>
                                                <th scope="col">{{ __('draft.statusOfHealth_table_title3') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($statusOfHealth as $SOH)
                                            <tr>
                                                <td>
                                                    <p>{{ $SOH->disease['name'] }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $SOH->disease_status }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $SOH->disease_remark }}</p>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end mb-3 mt-3">
                            <a href="/agreements" class="btn btn-outline-secondary me-3">{{ __('draft.back_button') }}</a>
                            <button class="btn btn-primary ml-2">{{ __('draft.next_button') }}</button>
                        </div>
                    </div>
    </form>
</div>
</div>
</div>
</div>

<!-- Emergency modal -->
<div class="modal fade" id="editEmergencyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <form action="{{ route('emergencyContact.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="editModalLabel">{{ __('button.edit_emergency_contact') }}</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <input type="hidden" name="emergency_contact_id1" value="{{ $emergency_contact1->id }}">
                        <input type="hidden" name="emergency_contact_id2" value="{{ $emergency_contact2->id }}">
                        <input type="hidden" name="user_detail_id1" value="{{ $e_user_detail1->id }}">
                        <input type="hidden" name="user_detail_id2" value="{{ $e_user_detail2->id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <h4 class="alert-heading">{{ __('inputFields.kindly_remind') }}</h4>
                                    <p>{{ __('inputFields.ec_alert_msg1') }}</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                        {{-- person 1 --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.p1') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-2">
                                    <div class="col-md mb-3">
                                        <label for="en_name" class="form-label">{{ __('inputFields.en_name') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="en_name1" id="en_name1" class="form-control text-capitalize" value="{{ $e_user_detail1->en_name }}" onkeyup="if (/[^|A-Za-z0-9\s/.]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/.]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="ch_name" class="form-label">{{ __('inputFields.ch_name') }}</label>
                                        <input type="text" name="ch_name1" id="ch_name1" class="form-control" value="{{ $e_user_detail1->ch_name }}">
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-md mb-3">
                                        <label for="relationship" class="form-label">{{ __('inputFields.relationship') }}</label>
                                        <select name="guardian_relationship_id1" id="relationship1" class="form-select" required>
                                            <option value="{{ $emergency_contact1->guardian_relationship_id }}" selected>{{ $emergency_contact1->guardianRelationship['name'] }}</option>
                                            @foreach ($data['relationships'] as $relationship)
                                            <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="tel_hp" class="form-label">{{ __('inputFields.tel_hp') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="tel_hp1" id="tel_hp1" class="form-control" value="{{ $e_user_detail1->tel_hp }}" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end person 1 --}}
                        {{-- person 2 --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.p2') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-2">
                                    <div class="col-md mb-3">
                                        <label for="en_name" class="form-label">{{ __('inputFields.en_name') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="en_name2" id="en_name2" class="form-control text-capitalize" value="{{ $e_user_detail2->en_name }}" onkeyup="if (/[^|A-Za-z0-9\s/.]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/.]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="ch_name" class="form-label">{{ __('inputFields.ch_name') }}</label>
                                        <input type="text" name="ch_name2" id="ch_name2" class="form-control" value="{{ $e_user_detail2->ch_name }}">
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-md mb-3">
                                        <label for="relationship" class="form-label">{{ __('inputFields.relationship') }}</label>
                                        <select name="guardian_relationship_id2" id="relationship2" class="form-select" required>
                                            <option value="{{ $emergency_contact2->guardian_relationship_id }}" selected>{{ $emergency_contact2->guardianRelationship['name'] }}</option>
                                            @foreach ($data['relationships'] as $relationship)
                                            <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="tel_hp" class="form-label">{{ __('inputFields.tel_hp') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="tel_hp2" id="tel_hp2" class="form-control" value="{{ $e_user_detail2->tel_hp }}" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end person 2 --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('button.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('button.save_changes') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- end Emergency modal --}}


<!-- Parent Guardian Modal -->
<div class="modal fade" id="editParentGuardianModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <form action="{{ route('parentGuardianParticulars.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="editModalLabel">{{__('button.edit_parent_guardian_particulars')}}</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <input type="hidden" name="guardian_detail_id" value="{{ $getGuardianDetail->id }}">
                        <input type="hidden" name="user_detail_id" value="{{ $guardian_user_detail->id }}">
                        <input type="hidden" name="p_address_id" value="{{ $g_p_address->id }}">
                        {{-- name --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.pg_name') }}</h4>
                                <p class="text-secondary">{{ __('inputFields.hint_for_pg_name') }}</p>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-2">
                                    <div class="col-md mb-3">
                                        <label for="en_name" class="form-label">{{ __('inputFields.en_name') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="en_name" id="en_name" class="form-control text-capitalize" value="{{ $guardian_user_detail->en_name }}" onkeyup="if (/[^|A-Za-z0-9\s/.]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/.]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="ch_name" class="form-label">{{ __('inputFields.ch_name') }}</label>
                                        <input type="text" name="ch_name" id="ch_name" class="form-control" value="{{ $guardian_user_detail->ch_name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end name --}}
                        {{-- ic / passport --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.ic_or_passport') }}</h4>
                                <p class="text-secondary">{{ __('inputFields.hint_for_ic_or_passport') }}</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="changeInput" onclick="changeInputMethod()">
                                    <label class="form-check-label" for="changeInput">
                                        {{ __('inputFields.ic_or_passport_checkbox') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row" id="ic_section">
                                    <label for="ic" class="form-label">{{ __('inputFields.ic') }}<span class="text-danger">*</span></label>
                                    <div class="col-md d-flex flex-row align-items-center mb-3">
                                        <input type="text" name="ic1" id="ic1" class="form-control" placeholder="" maxlength="6" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                        <span class="ms-4">-</span>
                                    </div>
                                    <div class="col-md d-flex flex-row align-items-center mb-3">
                                        <input type="text" name="ic2" id="ic2" class="form-control" placeholder="" maxlength="2" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                        <span class="ms-4">-</span>
                                    </div>
                                    <div class="col-md mb-3">
                                        <input type="text" name="ic3" id="ic3" class="form-control" placeholder="" maxlength="4" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                </div>
                                <div class="row" id="passport_section" style="display: none;">
                                    <label for="ic" class="form-label">{{ __('inputFields.passport') }}<span class="text-danger">*</span></label>
                                    <div class="col-md mb-3">
                                        <input type="text" name="passport" id="passport" class="form-control" placeholder="" onkeyup="if (/[^|A-Za-z0-9-]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9-]+/g,'')">
                                    </div>
                                </div>
                            </div>
                            <script>
                                let text = document.getElementById('read_ic').innerHTML;
                                const myArray = text.split("-");
                                const changeInput = document.getElementById('changeInput');
                                const ic_section = document.getElementById('ic_section');
                                const passport_section = document.getElementById('passport_section');
                                const ic1 = document.getElementById('ic1');
                                const ic2 = document.getElementById('ic2');
                                const ic3 = document.getElementById('ic3');
                                const passport = document.getElementById('passport');

                                if (myArray.length != 3) {
                                    document.getElementById("passport").value = myArray[0];
                                    changeInput.checked = true;
                                    ic_section.style.display = 'none';
                                    passport_section.style.display = 'block';
                                } else {
                                    document.getElementById("ic1").value = myArray[0];
                                    document.getElementById("ic2").value = myArray[1];
                                    document.getElementById("ic3").value = myArray[2];

                                }

                                function changeInputMethod() {
                                    if (changeInput.checked) {
                                        ic_section.style.display = 'none';
                                        passport_section.style.display = 'block';
                                        passport.setAttribute('required', '');
                                        ic1.removeAttribute('required');
                                        ic2.removeAttribute('required');
                                        ic3.removeAttribute('required');
                                        ic1.value = '';
                                        ic2.value = '';
                                        ic3.value = '';

                                    } else {
                                        ic_section.style.removeProperty('display');
                                        passport_section.style.display = 'none';
                                        passport.removeAttribute('required');
                                        ic1.setAttribute('required', '');
                                        ic2.setAttribute('required', '');
                                        ic3.setAttribute('required', '');
                                        passport.value = '';
                                    }
                                }
                            </script>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end ic /passport --}}
                        {{-- relationship, nationality --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.relationship') }} & {{ __('inputFields.nationality') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="relationship" class="form-label">{{ __('inputFields.relationship') }}<span class="text-danger">*</span></label>
                                        <select name="guardian_relationship_id" id="relationship" class="form-select" required>
                                            <option value="{{ $getGuardianDetail->guardian_relationship_id }}" selected>{{ $getGuardianDetail->guardianRelationship['name'] }}</option>
                                            @foreach ($data['relationships'] as $relationship)
                                            <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="nationality" class="form-label">{{ __('inputFields.nationality') }}<span class="text-danger">*</span></label>
                                        <select name="nationality_id" id="nationality" class="form-select" required>
                                            <option value="{{ $getGuardianDetail->nationality_id }}" selected>{{ $getGuardianDetail->nationality['name'] }}</option>
                                            @foreach ($data['nationalities'] as $nationality)
                                            <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end relationship, nationality --}}
                        {{-- occupation, family income --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.occupation') }} & {{ __('inputFields.income') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="occupation" class="form-label">{{ __('inputFields.occupation') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="occupation" id="occupation" class="form-control" value="{{ $getGuardianDetail->occupation }}" onkeyup="if (/[^|A-Za-z0-9\s/.]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/.]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="income" class="form-label">{{ __('inputFields.income_range') }}<span class="text-danger">*</span></label>
                                        <select name="income_id" id="income" class="form-select" required>
                                            <option value="{{ $getGuardianDetail->income_id }}" selected>{{ $getGuardianDetail->income['range'] }}</option>
                                            @foreach ($data['incomes'] as $income)
                                            <option value="{{ $income->id }}">{{ $income->range }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end occupation, family income --}}
                        {{-- contact --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.contact') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md mb-3">
                                        <label for="tel_hp" class="form-label">{{ __('inputFields.tel_hp') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="tel_hp" id="tel_hp" class="form-control" value="{{ $guardian_user_detail->tel_hp }}" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="email" class="form-label">{{ __('inputFields.email') }}</label>
                                        <input type="text" name="email" id="email" class="form-control" value="{{ $guardian_user_detail->email }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end contact --}}
                        {{-- permanent address --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.p_address') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="p_street1" class="form-label">{{ __('inputFields.address1') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_street1" id="pg_p_street1" class="form-control" value="{{ $g_p_address->street1 }}" onkeyup="if (/[^|A-Za-z0-9/.\s,]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9/.\s,]+/g,'')" placeholder="{{ __('inputFields.address1_placeholder') }}" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="p_street2" class="form-label">{{ __('inputFields.address2') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_street2" id="pg_p_street2" class="form-control" value="{{ $g_p_address->street2 }}" onkeyup="if (/[^|A-Za-z0-9/.\s,]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9/.\s,]+/g,'')" placeholder="{{ __('inputFields.address2_placeholder') }}" required>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="pg_p_zipcode" class="form-label">{{ __('inputFields.zipcode') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_zipcode" id="pg_p_zipcode" class="form-control" value="{{ $g_p_address->zipcode}}" maxlength="5" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="p_city" class="form-label">{{ __('inputFields.city') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_city" id="pg_p_city" class="form-control" value="{{ $g_p_address->city }}" onkeyup="if (/[^|A-Za-z/.\s]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z/.\s]+/g,'')" required>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="p_state" class="form-label">{{ __('inputFields.state') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_state" id="pg_p_state" class="form-control" value="{{ $g_p_address->state }}" onkeyup="if (/[^|A-Za-z/.\s]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z/.\s]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="p_country" class="form-label">{{ __('inputFields.country') }}<span class="text-danger">*</span></label>
                                        <select name="p_country_id" id="pg_p_country" class="form-select" required>
                                            <option value="{{ $g_p_address->country_id }}" selected>{{ $g_p_address->country['name'] }}</option>
                                            @foreach ($data['countries'] as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end permanent address --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('button.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('button.save_changes') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- End Parent Guardian Modal --}}


<!-- personal particular modal -->
<div class="modal fade" id="editPersonalParticularModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <form action="{{ route('personalParticulars.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="editModalLabel">{{ __('button.edit_personal_particulars') }}</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <input type="hidden" name="user_detail_id" value="{{ $getPersonalUserDetail->id }}">
                        <input type="hidden" name="c_address_id" value="{{ $p_c_address->id }}">
                        <input type="hidden" name="p_address_id" value="{{ $p_p_address->id }}">
                        <input type="hidden" name="applicant_profile_id" value="{{ $getApplicantProfile->id }}">
                        {{-- name --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.name') }}</h4>
                                <p class="text-secondary">{{ __('inputFields.hint_for_name') }}</p>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-2">
                                    <div class="col-md mb-3">
                                        <label for="en_name" class="form-label">{{ __('inputFields.en_name') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="en_name" id="en_name" class="form-control text-capitalize" value="{{ $getPersonalUserDetail->en_name }}" onkeyup="if (/[^|A-Za-z0-9\s/.]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/.]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="ch_name" class="form-label">{{ __('inputFields.ch_name') }}</label>
                                        <input type="text" name="ch_name" id="ch_name" class="form-control" value="{{ $getPersonalUserDetail->ch_name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end name --}}
                        {{-- ic --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.ic') }}</h4>
                                <p class="text-secondary">{{ __('inputFields.hint_for_ic') }}</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="changeInput_personal" onclick="changeInputPersonalMethod()">
                                    <label class="form-check-label" for="changeInput_personal">
                                        Non-Malaysian
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row" id="ic_section_personal">
                                    <label for="ic_personal" class="form-label">{{ __('inputFields.ic') }}<span class="text-danger">*</span></label>
                                    <div class="col-md d-flex flex-row align-items-center mb-3">
                                        <input type="text" name="ic1" id="ic1_personal" class="form-control" placeholder="" maxlength="6" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                        <span class="ms-4">-</span>
                                    </div>
                                    <div class="col-md d-flex flex-row align-items-center mb-3">
                                        <input type="text" name="ic2" id="ic2_personal" class="form-control" placeholder="" maxlength="2" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                        <span class="ms-4">-</span>
                                    </div>
                                    <div class="col-md mb-3">
                                        <input type="text" name="ic3" id="ic3_personal" class="form-control" placeholder="" maxlength="4" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                </div>
                                <div class="row" id="passport_section_personal" style="display: none;">
                                    <label for="ic" class="form-label">{{ __('inputFields.without_ic') }}<span class="text-danger">*</span></label>
                                    <div class="col-md mb-3">
                                        <input type="text" name="passport" id="passport_personal" class="form-control" onkeyup="if (/[^|A-Za-z0-9-]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9-]+/g,'')">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                                
                            let text_personal = document.getElementById('read_personal_ic').innerHTML;
                            const myArray_personal = text_personal.split("-");
                            const changeInput_personal = document.getElementById('changeInput_personal');
                            const ic_section_personal = document.getElementById('ic_section_personal');
                            const passport_section_personal = document.getElementById('passport_section_personal');
                            const ic1_personal = document.getElementById('ic1_personal');
                            const ic2_personal = document.getElementById('ic2_personal');
                            const ic3_personal = document.getElementById('ic3_personal');
                            const passport_personal = document.getElementById('passport_personal');
                            const nationality_personal = document.getElementById('nationality_personal');

                            if(myArray_personal.length != 3){
                                document.getElementById("passport_personal").value = myArray_personal[0];
                                changeInput_personal.checked = true;
                                ic_section_personal.style.display = 'none';
                                passport_section_personal.style.display = 'block';
                            }else{
                                document.getElementById("ic1_personal").value = myArray_personal[0]; 
                                document.getElementById("ic2_personal").value = myArray_personal[1]; 
                                document.getElementById("ic3_personal").value = myArray_personal[2]; 

                            }

                            function changeInputPersonalMethod(){
                                if(changeInput_personal.checked){
                                    ic_section_personal.style.display = 'none';
                                    passport_section_personal.style.display = 'block';
                                    passport_personal.setAttribute('required','');
                                    ic1_personal.removeAttribute('required');
                                    ic2_personal.removeAttribute('required');
                                    ic3_personal.removeAttribute('required');
                                    ic1_personal.value = '';
                                    ic2_personal.value = '';
                                    ic3_personal.value = '';
                                    nationality_personal.value = 161;
                                }else{
                                    ic_section_personal.style.removeProperty('display');
                                    passport_section_personal.style.display = 'none';
                                    passport_personal.removeAttribute('required');
                                    ic1_personal.setAttribute('required','');
                                    ic2_personal.setAttribute('required','');
                                    ic3_personal.setAttribute('required','');
                                    passport_personal.value = '';
                                    nationality_personal.value = 131;
                                }
                            }
                        </script>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end ic --}}
                        {{-- race, religion, nationality --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.race') }}, {{ __('inputFields.religion') }} & {{ __('inputFields.nationality') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="race" class="form-label">{{ __('inputFields.race') }}<span class="text-danger">*</span></label>
                                        <select name="race_id" id="race" class="form-select" required>
                                            <option value="{{ $getApplicantProfile->race_id }}" selected>{{ $getApplicantProfile->race['name'] }}</option>
                                            @foreach ($data['races'] as $race)
                                            <option value="{{ $race->id }}">{{ $race->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="religion" class="form-label">{{ __('inputFields.religion') }}<span class="text-danger">*</span></label>
                                        <select name="religion_id" id="religion" class="form-select" required>
                                            <option value="{{ $getApplicantProfile->religion_id }}" selected>{{ $getApplicantProfile->religion['name'] }}</option>
                                            @foreach ($data['religions'] as $religion)
                                            <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="nationality_personal" class="form-label">{{ __('inputFields.nationality') }}<span class="text-danger">*</span></label>
                                        <select name="nationality_id" id="nationality_personal" class="form-select" required>
                                            <option value="{{ $getApplicantProfile->nationality_id }}" selected>{{ $getApplicantProfile->nationality['name'] }}</option>
                                            <option value="131">Malaysia</option>
                                            <option value="161">Non-Malaysia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end race, religion, nationality --}}
                        {{-- birth date, age, place of birth --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.bd') }}, {{ __('inputFields.age') }} & {{ __('inputFields.pob') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="birth_date" class="form-label">{{ __('inputFields.bd') }}<span class="text-danger">*</span></label>
                                        <input type="date" name="birth_date" id="birth_date" class="form-control" value="{{ $getApplicantProfile->birth_date }}" onchange="ageCalculator()">
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="age" class="form-label">{{ __('inputFields.age') }}</label>
                                        <input type="text" name="age" id="age" value="" class="form-control" placeholder="" disabled>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="place_of_birth" class="form-label">{{ __('inputFields.pob') }}<span class="text-danger">*</span></label>
                                        <select name="place_of_birth" id="place_of_birth" class="form-select" required>
                                            <option value="{{ $getApplicantProfile->place_of_birth }}" selected>{{ $getApplicantProfile->place_of_birth }}</option>
                                            <option value="Johor">Johor</option>
                                            <option value="Kedah">Kedah</option>
                                            <option value="Kelantan">Kelantan</option>
                                            <option value="Kuala Lumpur">Kuala Lumpur</option>
                                            <option value="Labuan">Labuan</option>
                                            <option value="Malacca">Malacca</option>
                                            <option value="Negeri Sembilan">Negeri Sembilan</option>
                                            <option value="Pahang">Pahang</option>
                                            <option value="Penang">Penang</option>
                                            <option value="Perak">Perak</option>
                                            <option value="Perlis">Perlis</option>
                                            <option value="Sabah">Sabah</option>
                                            <option value="Sarawak">Sarawak</option>
                                            <option value="Selangor">Selangor</option>
                                            <option value="Terengganu">Terengganu</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function ageCalculator() {
                                var user_input = document.getElementById('birth_date').value;
                                var date_of_birth = new Date(user_input);

                                if (user_input != null || user_input != '' || user_input != undefined) {
                                    var month_diff = Date.now() - date_of_birth.getTime();
                                    var age_df = new Date(month_diff);
                                    var year = age_df.getUTCFullYear();
                                    var age = Math.abs(year - 1970);
                                    return document.getElementById("age").value = age;
                                } else {
                                    return false;
                                }
                            }
                        </script>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end birth date, age, place of birth  --}}
                        {{-- gender, marital --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.gender') }} & {{ __('inputFields.ms') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-2">
                                    <div class="col-md">
                                        <label for="gender" class="form-label">{{ __('inputFields.gender') }}<span class="text-danger">*</span></label>
                                        <div class="d-flex flex-row mb-3 me-3">
                                            @foreach ($data['genders'] as $gender)
                                            @if ($gender->id == 1)
                                            <div class="form-check-label me-4" for="gender">
                                                <input type="radio" name="gender_id" id="gender1" class="form-check-input" value="{{ $gender->id }}" {{ $getApplicantProfile->gender_id == '1' ? 'checked' : ''}}>
                                                <span class="ms-4">{{ $gender->name }}</span>
                                            </div>
                                            @else
                                            <div class="form-check-label me-4" for="gender">
                                                <input type="radio" name="gender_id" id="gender1" class="form-check-input" value="{{ $gender->id }}" {{ $getApplicantProfile->gender_id == '2' ? 'checked' : ''}}>
                                                <span class="ms-4">{{ $gender->name }}</span>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <label for="marital" class="form-label">{{ __('inputFields.ms') }}<span class="text-danger">*</span></label>
                                        <select name="marital_id" id="marital" class="form-select" required>
                                            <option value="{{ $getApplicantProfile->marital_id }}" disabled>{{ $getApplicantProfile->marital['name'] }}</option>
                                            @foreach ($data['maritals'] as $marital)
                                            <option value="{{ $marital->id }}">{{ $marital->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end gender marital --}}
                        {{-- contact --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.contact') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="email" class="form-label">{{ __('inputFields.email') }}<span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ $getPersonalUserDetail->email }}" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="tel_hp" class="form-label">{{ __('inputFields.tel_hp') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="tel_hp" id="tel_hp" class="form-control" value="{{ $getPersonalUserDetail->tel_hp }}" maxlength="13" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="tel_h" class="form-label">{{ __('inputFields.tel_h') }}</label>
                                        <input type="text" name="tel_h" id="tel_h" class="form-control" value="{{ $getPersonalUserDetail->tel_h }}" maxlength="13" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end contact --}}
                        {{-- correspondence address --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.c_address') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="c_street1" class="form-label">{{ __('inputFields.address1') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="c_street1" id="c_street1" class="form-control" value="{{ $p_c_address->street1 }}" onkeyup="if (/[^|A-Za-z0-9/.\s,]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9/.\s,]+/g,'')" placeholder="{{ __('inputFields.address1_placeholder') }}" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="c_street2" class="form-label">{{ __('inputFields.address2') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="c_street2" id="c_street2" class="form-control" value="{{ $p_c_address->street2 }}" onkeyup="if (/[^|A-Za-z0-9/.\s,]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9/.\s,]+/g,'')" placeholder="{{ __('inputFields.address2_placeholder') }}" required>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="c_zipcode" class="form-label">{{ __('inputFields.zipcode') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="c_zipcode" id="c_zipcode" class="form-control" value="{{ $p_c_address->zipcode }}" maxlength="5" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="c_city" class="form-label">{{ __('inputFields.city') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="c_city" id="c_city" class="form-control" value="{{ $p_c_address->city }}" onkeyup="if (/[^|A-Za-z/.\s]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z/.\s]+/g,'')" required>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="c_state" class="form-label">{{ __('inputFields.state') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="c_state" id="c_state" class="form-control" value="{{ $p_c_address->state }}" onkeyup="if (/[^|A-Za-z/.\s]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z/.\s]+/g,'')" required>
                                    </div>
                                    <div class="col-md">
                                        <label for="c_country" class="form-label">{{ __('inputFields.country') }}<span class="text-danger">*</span></label>
                                        <select name="c_country_id" id="c_country" class="form-select" required>
                                            <option value="{{ $p_c_address->country_id }}" selected>{{ $p_c_address->country['name'] }}</option>
                                            @foreach ($data['countries'] as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end correspondence address --}}
                        {{-- permanent address --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.p_address') }}</h4>
                                <div class="form-check mb-2 mt-2">
                                    <input class="form-check-input" type="checkbox" id="sameAbove" onclick="copyAddress()">
                                    <label class="form-check-label" for="sameAbove">
                                        {{ __('inputFields.p_address_checkbox') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="p_street1" class="form-label">{{ __('inputFields.address1') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_street1" id="p_street1" class="form-control" value="{{ $p_p_address->street1 }}" onkeyup="if (/[^|A-Za-z0-9/.\s,]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9/.\s,]+/g,'')" placeholder="{{ __('inputFields.address1_placeholder') }}" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="p_street2" class="form-label">{{ __('inputFields.address2') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_street2" id="p_street2" class="form-control" value="{{ $p_p_address->street2 }}" onkeyup="if (/[^|A-Za-z0-9/.\s,]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9/.\s,]+/g,'')" placeholder="{{ __('inputFields.address2_placeholder') }}" required>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="p_zipcode" class="form-label">{{ __('inputFields.zipcode') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_zipcode" id="p_zipcode" class="form-control" value="{{ $p_p_address->zipcode }}" maxlength="5" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="p_city" class="form-label">{{ __('inputFields.city') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_city" id="p_city" class="form-control" value="{{ $p_p_address->city }}" onkeyup="if (/[^|A-Za-z/.\s]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z/.\s]+/g,'')" required>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="p_state" class="form-label">{{ __('inputFields.state') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_state" id="p_state" class="form-control" value="{{ $p_p_address->state }}" onkeyup="if (/[^|A-Za-z/.\s]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z/.\s]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="p_country" class="form-label">{{ __('inputFields.country') }}<span class="text-danger">*</span></label>
                                        <select name="p_country_id" id="p_country" class="form-select" required>
                                            <option value="{{ $p_p_address->country_id }}" selected>{{ $p_p_address->country['name'] }}</option>
                                            @foreach ($data['countries'] as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            // sameabove
                            function copyAddress(){
                                var c_street1 = document.getElementById('c_street1');
                                var c_street2 = document.getElementById('c_street2');
                                var c_zipcode = document.getElementById('c_zipcode');
                                var c_city = document.getElementById('c_city');
                                var c_state = document.getElementById('c_state');
                                var c_country = document.getElementById('c_country');

                                var p_street1 = document.getElementById('p_street1');
                                var p_street2 = document.getElementById('p_street2');
                                var p_zipcode = document.getElementById('p_zipcode');
                                var p_city = document.getElementById('p_city');
                                var p_state = document.getElementById('p_state');
                                var p_country = document.getElementById('p_country');

                                const sameAbove = document.getElementById('sameAbove');
                                if(sameAbove.checked){
                                    p_street1.value = c_street1.value;
                                    p_street2.value = c_street2.value;
                                    p_zipcode.value = c_zipcode.value;
                                    p_city.value = c_city.value;
                                    p_state.value = c_state.value;
                                    p_country.value = c_country.value;
                                }else if(sameAbove.checked == false){
                                    p_street1.value = '';
                                    p_street2.value = '';
                                    p_zipcode.value = '';
                                    p_city.value = '';
                                    p_state.value = '';
                                    p_country.value = '';
                                }
                            }
                        </script>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('button.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('button.save_changes') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- end personal particular modal --}}

<!-- Academic record modal -->
<div class="modal fade" id="editAcademicRecordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <form action="{{ route('academicDetail.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="editModalLabel">{{ __('draft.editAcademic') }}</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th scope="col">{{ __('academicRecord.table_title1') }}</th>
                                        <th scope="col">{{ __('academicRecord.table_title2') }}</th>
                                        <th scope="col">{{ __('academicRecord.table_title3') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($academicRecord as $ar)
                                    <tr>
                                        <td>
                                            <p name="school_level[{{ $ar->school_level['id'] }}]" id="school_level">{{ $ar->school_level['name'] }} <span></p>
                                        </td>
                                        <td><input name="school_name[{{ $ar->school_level['id'] }}]" type="text" class="form-control" value="{{ $ar->school_name }}"></td>
                                        <td><input name="school_graduation[{{ $ar->school_level['id'] }}]" type="text" class="form-control" value="{{ $ar->school_graduation }}"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('draft.modal_close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('draft.modal_save_button') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- end academic record modal --}}

<!-- status of health modal -->
<div class="modal fade" id="editSOHModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <form action="{{ route('statusOfHealth.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="editModalLabel">{{ __('draft.editSOH') }}</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th scope="col">{{ __('draft.statusOfHealth_table_title1') }}</th>
                                        <th scope="col">{{ __('draft.statusOfHealth_table_title2') }}</th>
                                        <th scope="col">{{ __('draft.statusOfHealth_table_title3') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($statusOfHealth as $SOH)
                                    <tr>
                                        <th>
                                            <p>{{ $SOH->disease['name'] }}</p>
                                            <input type="hidden" name="disease_id[{{ $SOH->disease['id'] }}]" value="{{ $SOH->disease['id'] }}">
                                        </th>
                                        <th>
                                            <select name="h_status[{{ $SOH->disease['id'] }}]" id="h_status" class="form-select">
                                                <option value="{{ $SOH->disease_status }}" selected>{{ $SOH->disease_status }}</option>
                                                <option value="No">{{ __('statusOfHealth.choose1') }}</option>
                                                <option value="Yes">{{ __('statusOfHealth.choose2') }}</option>
                                            </select>
                                        </th>
                                        <th><input type="text" class="form-control" name="h_remark[{{ $SOH->disease['id'] }}]" value="{{ $SOH->disease_remark }}"></th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('draft.modal_close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('draft.modal_save_button') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- end status of health modal --}}

<!-- modal -->
<div class="modal fade" id="editProfilePictureModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <form action="{{ route('profilePicture.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="editProfilePictureModalLabel">{{ __('button.edit_profile_picture') }}</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <input type="hidden" name="applicant_profile_picture_id" value="{{ $applicant_profile_picture->id }}">
                        <input type="hidden" name="applicant_profile_id" value="{{ $applicant_profile_picture->applicant_profile_id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="picture" class="form-label">{{ __('userProfile.title4') }} (<span class="text-danger fw-bold">{{ __('inputFields.photo_format1') }}</span>) and <span class="fw-bold text-danger">{{ __('inputFields.photo_format2') }}</span> <span class="text-danger">*</span></label>
                                <div class="d-flex flex-column">
                                    <input class="form-control me-3 mb-4" name="picture" id="picture" type="file" accept=".jpg, .jpeg, .png" onchange="previewPhoto(event)">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p class="text-secondary">{{ __('inputFields.preview') }}</p>
                                <img id="preview_location" name="preview_location" class="img-fluid" width="217px" height="280px">
                            </div>
                        </div>
                    </div>
                    <script>
                        // image preview
                        var previewPhoto = function(event) {
                            var previewLocation = document.getElementById('preview_location');
                            previewLocation.src = URL.createObjectURL(event.target.files[0]);
                            previewLocation.onload = function() {
                                URL.revokeObjectURL(previewLocation.src);
                            }
                        }
                    </script>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('button.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('button.save_changes') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- end modal --}}

<!-- program selection modal -->
<div class="modal fade" id="editprogramselectionmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <form action="{{ route('program_selection.updateProgramme') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="editProfilePictureModalLabel">Edit program selection</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        {{--Intake Year--}}
                        <label class="col-sm-3 col-form-label">Intake: Year</label>
                        <div class="col-sm-3">
                            <select class="form-select" name="intake_year" id="intake_year">
                                <option value="2022">2022</option>
                            </select>
                        </div>

                        {{--Intake Month--}}
                        <label class="col-sm-3 col-form-label">Intake: Month</label>
                        <div class="col-sm-3">
                            <select class="form-select" name="intake_month" id="intake_month">
                                <option value="">Please Select</option>
                                <option value="{{ $semester->id }}" selected>{{ $semester->semesters }}</option>
                                @foreach ($semestersql as $sem)
                                <option value="{{$sem->id}}">{{$sem->semesters}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <hr>

                    {{--Course Selection--}}
                    <div class="row mb-3">
                        <label for="courseselect" class="col-sm-3 col-form-label">Course Selection</label>
                        <div class="col-sm-5">
                            <select class="form-select" name="course" id="course">

                                @if($programmeLevel->id==1 || $programmeLevel->id==2)
                                <option value="PHD" selected>Postgraduate</option>
                                <option value="MAS">Undergraduate</option>
                                @else
                                <option value="PHD">Postgraduate</option>
                                <option value="MAS" selected>Undergraduate</option>
                                @endif


                            </select>
                        </div>
                    </div>
                    <div id="containerCourse"></div>




                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
    </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        if ($('#course').val() == 'PHD') {
            html = '';
            html += '{{--First Postgraduate Course--}}';
            html += '<div class="row mb-3" id="phd">';
            html += '<label for="courseselect" class="col-sm-3 col-form-label">Postgraduate courses first choice</label>';
            html += '<div class="col-sm-5">';
            html += '<select class="form-select" name="postgra1" id="postgra1">';
            html += '<option value="{{ $programme1->id }}" selected>{{ $programme1->EnglishName }}</option>';
            html += '@foreach ($postgraduate as $programme)';
            html += '<option value="{{$programme->id}}">{{$programme->EnglishName}}</option>';
            html += '@endforeach';
            html += '</select>';
            html += '</div>';
            html += '</div>';
            html += '{{--Second Postgraduate Course--}}';
            html += '<div class="row mb-3" id="phd2">';
            html += '<label for="courseselect" class="col-sm-3 col-form-label">Postgraduate courses second choice</label>';
            html += '<div class="col-sm-5">';
            html += '<select class="form-select" name="postgra2" id="postgra2">';
            html += '<option value="{{ $programme2->id }}" selected>{{ $programme2->EnglishName }}</option>';
            html += '@foreach ($postgraduate as $programme)';
            html += '<option value="{{$programme->id}}">{{$programme->EnglishName}}</option>';
            html += '@endforeach';
            html += '</select>';
            html += '</div>';
            html += '</div>';
            html += '{{--Third Postgraduate Course--}}';
            html += '<div class="row mb-3" id="phd3">';
            html += '<label for="courseselect" class="col-sm-3 col-form-label">Postgraduate courses third choice</label>';
            html += '<div class="col-sm-5">';
            html += '<select class="form-select" name="postgra3" id="postgra3">';
            html += '<option value="0">Please Select</option>';
            html += '<option value="{{ $programme3->id }}" selected>{{ $programme3->EnglishName }}</option>';
            html += '@foreach ($postgraduate as $programme)';
            html += '<option value="{{$programme->id}}">{{$programme->EnglishName}}</option>';
            html += '@endforeach';
            html += '</select>';
            html += '</div>';
            html += '</div>';
            $('#containerCourse').html(html);

        } else if ($('#course').val() == 'MAS') {
            html = '';
            html += '{{--First Undergraduate Course--}}';
            html += '<div class="row mb-3" id="master">';
            html += '<label for="courseselect" class="col-sm-3 col-form-label">Undergraduate courses first choice</label>';
            html += '<div class="col-sm-5">';
            html += '<select class="form-select" name="undergra1" id="undergra1">';
            html += '<option value="0">Please Select</option>';
            html += '<option value="{{ $programme1->id }}" selected>{{ $programme1->EnglishName }}</option>';
            html += '@foreach ($undergraduate as $programme)';
            html += '<option value="{{$programme->id}}">{{$programme->EnglishName}}</option>';
            html += '@endforeach';
            html += '</select>';
            html += '</div>';
            html += '</div>';
            html += '{{--Second undergraduate Course--}}';
            html += '<div class="row mb-3" id="master2">';
            html += '<label for="courseselect" class="col-sm-3 col-form-label">Undergraduate courses second choice</label>';
            html += '<div class="col-sm-5">';
            html += '<select class="form-select" name="undergra2" id="undergra2">';
            html += '<option value="0">Please Select</option>';
            html += '<option value="{{ $programme2->id }}" selected>{{ $programme2->EnglishName }}</option>';
            html += '@foreach ($undergraduate as $programme)';

            html += '<option value="{{$programme->id}}">{{$programme->EnglishName}}</option>';
            html += '@endforeach';
            html += '</select>';
            html += '</div>';
            html += '</div>';
            html += '{{--Third undergraduate Course--}}';
            html += '<div class="row mb-3" id="master3">';
            html += '<label for="courseselect" class="col-sm-3 col-form-label">Undergraduate courses third choice</label>';
            html += '<div class="col-sm-5">';
            html += '<select class="form-select" name="undergra3" id="undergra3">';
            html += '<option value="0">Please Select</option>';
            html += '@if ($programmePicked3!=null)'

            html += '<option value="{{ $programme3->id }}" selected>{{ $programme3->EnglishName }}</option>';

            html += '@endif'
            html += '@foreach ($undergraduate as $programme)';


            html += '<option value="{{$programme->id}}">{{$programme->EnglishName}}</option>';
            html += '@endforeach';
            html += '</select>';
            html += '</div>';
            html += '</div>';
            $('#containerCourse').html(html);
        }

        $('#course').on('change', function() {
            if ($(this).val() == 'PHD') {
                html = '';
                html += '{{--First Postgraduate Course--}}';
                html += '<div class="row mb-3" id="phd">';
                html += '<label for="courseselect" class="col-sm-3 col-form-label">Postgraduate courses first choice</label>';
                html += '<div class="col-sm-5">';
                html += '<select class="form-select" name="postgra1" id="postgra1">';
                html += '<option value="0" selected>Please Select</option>';
                html += '@foreach ($postgraduate as $programme)';
                html += '<option value="{{$programme->id}}">{{$programme->EnglishName}}</option>';
                html += '@endforeach';
                html += '</select>';
                html += '</div>';
                html += '</div>';
                html += '{{--Second Postgraduate Course--}}';
                html += '<div class="row mb-3" id="phd2">';
                html += '<label for="courseselect" class="col-sm-3 col-form-label">Postgraduate courses second choice</label>';
                html += '<div class="col-sm-5">';
                html += '<select class="form-select" name="postgra2" id="postgra2">';
                html += '<option value="0" selected>Please Select</option>';
                html += '@foreach ($postgraduate as $programme)';
                html += '<option value="{{$programme->id}}">{{$programme->EnglishName}}</option>';
                html += '@endforeach';
                html += '</select>';
                html += '</div>';
                html += '</div>';
                html += '{{--Third Postgraduate Course--}}';
                html += '<div class="row mb-3" id="phd3">';
                html += '<label for="courseselect" class="col-sm-3 col-form-label">Postgraduate courses third choice</label>';
                html += '<div class="col-sm-5">';
                html += '<select class="form-select" name="postgra3" id="postgra3">';
                html += '<option value="0">Please Select</option>';
                html += '@foreach ($postgraduate as $programme)';
                html += '<option value="{{$programme->id}}">{{$programme->EnglishName}}</option>';
                html += '@endforeach';
                html += '</select>';
                html += '</div>';
                html += '</div>';
                $('#containerCourse').html(html);
            } else if ($(this).val() == 'MAS') {
                html = '';
                html += '{{--First Undergraduate Course--}}';
                html += '<div class="row mb-3" id="master">';
                html += '<label for="courseselect" class="col-sm-3 col-form-label">Undergraduate courses first choice</label>';
                html += '<div class="col-sm-5">';
                html += '<select class="form-select" name="undergra1" id="undergra1">';
                html += '<option value="0">Please Select</option>';
                html += '<option value="0" selected>Please Select</option>';
                html += '@foreach ($undergraduate as $programme)';
                html += '<option value="{{$programme->id}}">{{$programme->EnglishName}}</option>';
                html += '@endforeach';
                html += '</select>';
                html += '</div>';
                html += '</div>';
                html += '{{--Second undergraduate Course--}}';
                html += '<div class="row mb-3" id="master2">';
                html += '<label for="courseselect" class="col-sm-3 col-form-label">Undergraduate courses second choice</label>';
                html += '<div class="col-sm-5">';
                html += '<select class="form-select" name="undergra2" id="undergra2">';
                html += '<option value="0">Please Select</option>';
                html += '<option value="0" selected>Please Select</option>';
                html += '@foreach ($undergraduate as $programme)';
                html += '<option value="{{$programme->id}}">{{$programme->EnglishName}}</option>';
                html += '@endforeach';
                html += '</select>';
                html += '</div>';
                html += '</div>';
                html += '{{--Third undergraduate Course--}}';
                html += '<div class="row mb-3" id="master3">';
                html += '<label for="courseselect" class="col-sm-3 col-form-label">Undergraduate courses third choice</label>';
                html += '<div class="col-sm-5">';
                html += '<select class="form-select" name="undergra3" id="undergra3">';
                html += '<option value="0">Please Select</option>';
                html += '@if ($programmePicked3!=null)'
                html += '<option value="0" selected>Please Select</option>';
                html += '@endif'
                html += '@foreach ($undergraduate as $programme)';
                html += '<option value="{{$programme->id}}">{{$programme->EnglishName}}</option>';
                html += '@endforeach';
                html += '</select>';
                html += '</div>';
                html += '</div>';
                $('#containerCourse').html(html);
            } else {
                // $('#phd').hide();
                // $('#phd2').hide();
                // $('#master').hide();
                // $('#master2').hide();
                // $('#master3').hide();
            }
        });
    });
</script>
</div>
{{-- end personal particular modal --}}
@endsection