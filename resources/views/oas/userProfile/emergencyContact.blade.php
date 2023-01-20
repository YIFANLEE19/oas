@extends('oas.layouts.app')
@section('content')

{{-- 
    modal - show when feedback when user visit this page
    if no modal pop up first time, means applicant not yet setup this profile

    Modal name        |  Step                               | application_status_id
    statusCode0Modal  | not yet finish personal particulars | 0
    statusCode1Modal  | not yet finish parent/guardian      | 1
                      | particulars                         |
    statusCode3Modal  | finish emergency contact            | 3
--}}
<style>.modal-backdrop {background-color: rgb(50, 47, 47);}</style>
@if ($applicant_status_log == null)
    <script>$(function(){$('#statusCode0Modal').modal('show');});</script>
@elseif($applicant_status_log->applicant_profile_status_id == config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PERSONAL_PARTICULARS'))
    <script>$(function(){$('#statusCode1Modal').modal('show');});</script>
@elseif($applicant_status_log->applicant_profile_status_id >= config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_EMERGENCY_CONTACT'))
    <script>$(function(){$('#statusCode3Modal').modal('show');});</script>
@endif

{{-- statusCode0Modal --}}
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
{{-- end statusCode0Modal --}}

{{-- statusCode1Modal --}}
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
{{-- end statusCode1Modal --}}

{{-- statusCode3Modal --}}
<div class="modal fade" id="statusCode3Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode3ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h1 class="modal-title fs-5" id="statusCode3ModalLabel">{{ __('modal.thank_you') }}</h1></div>
            <div class="modal-body">
                <p>{{ __('modal.complete_ec_modal_description1') }}</p>
                <p>{{ __('modal.complete_ec_modal_description2') }}</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('button.back_to_home_page') }}</a>
                <a href="{{ route('profilePicture.home') }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
            </div>
        </div>
    </div>
</div>
{{-- end statusCode3Modal --}}

{{-- header --}}
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="border-bottom">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('button.home') }}</a></li>
                        <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('userProfile.title3') }}</li>
                    </ol>
                </nav>
                <h1 class="fw-bold">{{ __('userProfile.title3') }}</h1>
                <p><span class="fw-bold">Step 3 of 4</span> Completed</p>
                <div class="progress mb-2" style="height: 10px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary opacity-25" role="progressbar" style="width: 25%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end header --}}

{{-- alert message --}}
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">{{ __('inputFields.kindly_remind') }}</h4>
                <p>{{ __('inputFields.ec_alert_msg1') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
{{-- end alert message --}}

{{-- form --}}
<div class="container">
    <form action="{{ route('emergencyContact.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- person 1 --}}
        <div class="row d-flex flex-row mt-4">
            <div class="col-md-4">
                <h4 class="fw-bold">{{ __('inputFields.p1') }}</h4>
            </div>
            <div class="col-md-8">
                <div class="row g-2">
                    <div class="col-md mb-3">
                        <label for="en_name" class="form-label">{{ __('inputFields.en_name') }}<span class="text-danger">*</span></label>
                        <input type="text" name="en_name1" id="en_name1" class="form-control text-capitalize" placeholder="" onkeyup="if (/[^|A-Za-z0-9\s/.]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/.]+/g,'')" required>
                    </div>
                    <div class="col-md mb-3">
                        <label for="ch_name" class="form-label">{{ __('inputFields.ch_name') }}</label>
                        <input type="text" name="ch_name1" id="ch_name1" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md mb-3">
                        <label for="relationship" class="form-label">{{ __('inputFields.relationship') }}</label>
                        <select name="guardian_relationship_id1" id="relationship1" class="form-select" required>
                            <option selected disabled>{{ __('inputFields.relationship_placeholder') }}</option>
                            @foreach ($allRelationships as $relationship)
                                <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md mb-3">
                        <label for="tel_hp" class="form-label">{{ __('inputFields.tel_hp') }}<span class="text-danger">*</span></label>
                        <input type="text" name="tel_hp1" id="tel_hp1" class="form-control" placeholder="" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom mt-4 mb-4"></div>
        {{-- end person 1 --}}
        {{-- person 2 --}}
        <div class="row d-flex flex-row mt-4">
            <div class="col-md-4">
                <h4 class="fw-bold">{{ __('inputFields.p2') }}</h4>
                <p class="text-secondary"></p>
            </div>
            <div class="col-md-8">
                <div class="row g-2">
                    <div class="col-md mb-3">
                        <label for="en_name" class="form-label">{{ __('inputFields.en_name') }}<span class="text-danger">*</span></label>
                        <input type="text" name="en_name2" id="en_name2" class="form-control text-capitalize" placeholder="" onkeyup="if (/[^|A-Za-z0-9\s/.]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/.]+/g,'')" required>
                    </div>
                    <div class="col-md mb-3">
                        <label for="ch_name" class="form-label">{{ __('inputFields.ch_name') }}</label>
                        <input type="text" name="ch_name2" id="ch_name2" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md mb-3">
                        <label for="relationship" class="form-label">{{ __('inputFields.relationship') }}</label>
                        <select name="guardian_relationship_id2" id="relationship2" class="form-select" required>
                            <option selected disabled>{{ __('inputFields.relationship_placeholder') }}</option>
                            @foreach ($allRelationships as $relationship)
                                <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md mb-3">
                        <label for="tel_hp" class="form-label">{{ __('inputFields.tel_hp') }}<span class="text-danger">*</span></label>
                        <input type="text" name="tel_hp2" id="tel_hp2" class="form-control" placeholder="" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom mt-4 mb-4"></div>
        {{-- end person 2 --}}
        {{-- form submit --}}
        @if ($applicant_status_log != null && $applicant_status_log->applicant_profile_status_id == config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PARENT_GUARDIAN_PARTICULARS'))
            <div class="row">
                <div class="d-flex justify-content-end">
                    <p class="text-secondary"><span class="text-danger">*</span>{{ __('inputFields.reminder_msg1') }}</p><br>
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">{{ __('button.submit_button') }}</button>
                </div>
            </div>
        @endif
        {{-- end form submit --}}
        
    </form>
</div>
{{-- end form --}}
@endsection