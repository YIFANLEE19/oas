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
@if ($applicant_status_log == null)
    <script>$(function(){$('#statusCode0Modal').modal('show');});</script>
@elseif($applicant_status_log->applicant_profile_status_id == config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PERSONAL_PARTICULARS'))
    <script>$(function(){$('#statusCode1Modal').modal('show');});</script>
@elseif($applicant_status_log->applicant_profile_status_id == config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PARENT_GUARDIAN_PARTICULARS'))
    <script>$(function(){$('#statusCode2Modal').modal('show');});</script>
@elseif($applicant_status_log->applicant_profile_status_id >= config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PROFILE_PICTURE'))
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
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('button.home') }}</a></li>
                        <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('userProfile.title4') }}</li>
                    </ol>
                </nav>
                <h1 class="fw-bold">{{ __('userProfile.title4') }}</h1>
                <p><span class="fw-bold">Step 4 of 4</span> Completed</p>
                <div class="progress mb-2" style="height: 10px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary opacity-25" role="progressbar" style="width: 0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
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
                <h4 class="alert-heading">Guidelines for submitting your photo</h4>
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
            <div class="col-sm-12">
                <label for="picture" class="form-label">Photo (<span class="text-danger fw-bold">{{ __('inputFields.photo_format1') }}</span>) and <span class="fw-bold text-danger">{{ __('inputFields.photo_format2') }}</span> <span class="text-danger">*</span></label>
                <div class="d-flex flex-column">
                    <input class="form-control me-3 mb-4" name="picture" id="picturePond" type="file" multiple data-max-file-size="5MB" data-max-files="1" data-allow-reorder="true" required>
                </div>
            </div>
        </div>
        <hr>
        @if ($applicant_status_log != null && $applicant_status_log->applicant_profile_status_id == config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_EMERGENCY_CONTACT'))
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

{{-- filepond --}}
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script>
    FilePond.registerPlugin(
        FilePondPluginFileValidateSize,
        FilePondPluginFileEncode,
        FilePondPluginImageExifOrientation,
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
    );
    const picturePond = FilePond.create(document.querySelector('input[id="picturePond"]'),{
        acceptedFileTypes: ['image/png','image/jpeg'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            resolve(type);
        }),
    });

    FilePond.setOptions({
        server: {
            process: '/user-profile/profile-picture/TmpUpload',
            revert:  (uniqueFileId, load, error) => {
                deleteFile(uniqueFileId);
                error('Error occur');
                load();
            },
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        },
    });


    function deleteFile(fileName){
        $.ajax({
            url: "/user-profile/profile-picture/TmpDelete",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "DELETE",
            data: {
                file: fileName,
            },
            success: function(response) {
                console.log(response);
            },
            error: function(response) {
                console.log('error')
            },
        });

    }
</script>
{{-- end script --}}
@endsection