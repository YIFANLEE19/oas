@extends('oas.layouts.app')
@section('content')

{{-- 
    modal - show when feedback when user visit this page
    if no modal pop up first time, means applicant not yet setup this profile

    Modal name        |  Step                               | application_status_id
    statusCode0Modal  | not yet finish personal particulars | 0
    statusCode1Modal  | not yet finish parent/guardian      | 1
                      | particulars                         |
    statusCode2Modal  | not yet finish emergency contact    | 2                  
    statusCode4Modal  | finish profile picture              | 4
--}}
<style>.modal-backdrop {background-color: rgb(50, 47, 47);}</style>

@if(Session::has('application_status_id') && Session::get('application_status_id') == config('constants.APPLICATION_STATUS_CODE.COMPLETE_PROFILE_PICTURE'))
    <script>$(function(){$('#statusCode4Modal').modal('show');});</script>        
@endif
@if ($application_status_id == config('constants.APPLICATION_STATUS_CODE.NEW_USER'))
    <script>$(function(){$('#statusCode0Modal').modal('show');});</script>
@elseif($application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_PERSONAL_PARTICULARS'))
    <script>$(function(){$('#statusCode1Modal').modal('show');});</script>
@elseif($application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_PARENT_GUARDIAN_PARTICULARS'))
    <script>$(function(){$('#statusCode2Modal').modal('show');});</script>
@elseif($application_status_id >= config('constants.APPLICATION_STATUS_CODE.COMPLETE_PROFILE_PICTURE'))
    <script>$(function(){$('#statusCode4Modal').modal('show');});</script>
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

{{-- statusCode2Modal --}}
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
{{-- end statusCode2Modal --}}

{{-- statusCode4Modal --}}
<div class="modal fade" id="statusCode4Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode4ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h1 class="modal-title fs-5" id="statusCode4ModalLabel">{{ __('modal.congratulations') }}</h1></div>
            <div class="modal-body">
                <p>{{ __('modal.complete_ppic_modal_description1') }}</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('home') }}" type="button" class="btn btn-primary">{{ __('button.back_to_home_page') }}</a>
            </div>
        </div>
    </div>
</div>
{{-- end statusCode4Modal --}}

{{-- header --}}
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="border-bottom">
                <h1 class="fw-bold">{{ __('userProfile.title4') }}</h1>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('button.home') }}</a></li>
                        <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('userProfile.title4') }}</li>
                    </ol>
                </nav>
                <div class="progress mb-2" style="height: 30px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary opacity-75" role="progressbar" aria-label="Default striped example" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ __('userProfile.step1') }}</div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary opacity-75" role="progressbar" aria-label="Segment two" style="width: 25%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">{{ __('userProfile.step2') }}</div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary opacity-75" role="progressbar" aria-label="Segment two" style="width: 25%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">{{ __('userProfile.step3') }}</div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-label="Segment two" style="width: 25%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">{{ __('userProfile.step4') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end header --}}

{{-- guidelines --}}
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning fade show" role="alert">
                <h4 class="alert-heading">{{ __('profilePicture.guidelines_heading') }}</h4>
                <p>1. In colour, <span class="fw-bold">NOT</span> black and white.</p>
                <p>2. Taken against a <span class="fw-bold">WHITE</span> background.</p>
                <p>3. The photo must be a true likeness of the person.</p>
                <p>4. Please do not use photos that have been cut down from larger pictures.</p>
                <p>5. The photo must be sent in <span class="fw-bold">(.jpg, .jpeg, .png)</span> file format and name it as your Name same as I/C.</p>
                <hr>
                <img src="/images/photo_correct.png" alt="" class="img-fluid me-3">
                <img src="/images/photo_wrong.png" alt="" class="img-fluid me-3">
            </div>
        </div>
    </div>
</div>
{{-- end guidelines --}}

{{-- show error message --}}
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
{{-- end show error message --}}

{{-- submit photo --}}
<form action="{{ route('profilePicture.create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row mb-4 mt-4">
            <div class="col-sm-9">
                <label for="picture" class="form-label">Photo (<span class="text-danger fw-bold">{{ __('inputFields.photo_format1') }}</span>) and <span class="fw-bold text-danger">{{ __('inputFields.photo_format2') }}</span> <span class="text-danger">*</span></label>
                <div class="d-flex flex-column">
                    <input class="form-control me-3 mb-4" name="picture" id="picture" type="file" accept=".jpg, .jpeg, .png" onchange="previewPhoto(event)">
                </div>
            </div>
            <div class="col-sm-3 d-flex flex-column justify-content-end">
                <p class="text-secondary">Preview</p>
                <img id="preview_location" name="preview_location" class="img-fluid" width="217px" height="280px">
            </div>
        </div>
        <hr>
        @if ($application_status_id == 3)
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
    </div>
</form>
{{-- end submit photo --}}

{{-- script --}}
<script>
    // image preview
    var previewPhoto = function(event){
        var previewLocation = document.getElementById('preview_location');
        previewLocation.src = URL.createObjectURL(event.target.files[0]);
        previewLocation.onload = function(){
            URL.revokeObjectURL(previewLocation.src);
        }
    }
</script>
{{-- end script --}}
@endsection