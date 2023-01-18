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
    @elseif($application_status_id == config('constants.APPLICATION_STATUS_CODE.COMEPLTE_ACADEMIC_RECORD'))
        <script>$(function(){$('#statusCode6Modal').modal('show');});</script>
    @elseif($application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_STATUS_OF_HEALTH'))
        <script>$(function(){$('#statusCode7Modal').modal('show');});</script>
    @elseif($application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_AGREEMENT'))
        <script>$(function(){$('#statusCode8Modal').modal('show');});</script>
    @elseif($application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_DRAFT'))
        <script>$(function(){$('#statusCode9Modal').modal('show');});</script>
    @elseif($application_status_id >= config('constants.APPLICATION_STATUS_CODE.COMPLETE_PAYMENT'))
        <script>$(function(){$('#statusCode11Modal').modal('show');});</script>
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
                <div class="modal-header"><h1 class="modal-title fs-5" id="statusCode5ModalLabel">{{ __('modal.kindly_reminder') }}</h1></div>
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
                <div class="modal-header"><h1 class="modal-title fs-5" id="statusCode5ModalLabel">{{ __('modal.kindly_reminder') }}</h1></div>
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
                <div class="modal-header"><h1 class="modal-title fs-5" id="statusCode5ModalLabel">{{ __('modal.kindly_reminder') }}</h1></div>
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
    {{-- status 8 = personal particulars / AND parent guardian particulars / AND emergency contact / AND profile picture / AND program selection / AND academic Record /--}}
    <div class="modal fade" id="statusCode8Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode4ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h1 class="modal-title fs-5" id="statusCode8ModalLabel">{{ __('modal.kindly_reminder') }}</h1></div>
                <div class="modal-body">
                    <p>{{ __('modal.draft_description1') }}</p>
                    <p>{{ __('modal.draft_description2') }}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('button.back_to_home_page') }}</a>
                    <a href="{{ route('draft.home') }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}
    {{-- status 9 = personal particulars / AND parent guardian particulars / AND emergency contact / AND profile picture / AND program selection / AND academic Record /--}}
    <div class="modal fade" id="statusCode9Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode4ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h1 class="modal-title fs-5" id="statusCode9ModalLabel">{{ __('modal.kindly_reminder') }}</h1></div>
                <div class="modal-body">
                    <p>{{ __('modal.sd_description1') }}</p>
                    <p>{{ __('modal.sd_description2') }}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('button.back_to_home_page') }}</a>
                    <a href="{{ route('supporting_document.supporting_document') }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}
    {{-- status 11 = personal particulars / AND parent guardian particulars / AND emergency contact / AND profile picture / AND program selection / AND academic Record /--}}
    <div class="modal fade" id="statusCode11Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode4ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h1 class="modal-title fs-5" id="statusCode11ModalLabel">{{ __('modal.congratulations') }}</h1></div>
                <div class="modal-body">
                    <p>{{ __('modal.complete_payment_modal_description1') }}</p>
                    <p>{{ __('modal.complete_payment_modal_description2') }}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-primary">{{ __('button.back_to_home_page') }}</a>
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
                      <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('payment.title') }}</li>
                    </ol>
                </nav>
                <h1 class="fw-bold">{{ __('payment.title') }}</h1>
                <p><span class="fw-bold">Step 7 of 7</span> Completed</p>
                <div class="progress mb-2" style="height: 10px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary opacity-25" role="progressbar" style="width: 0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end header --}}

<div class="container mt-2">
    <form action="{{ route('payment.create') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="row justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('payment.header') }}</div>
                        <div class="card-body">

                  <div class="card-body">
                  {{--Payment Instruction--}}
                    <div class="row">
                        <div class="card-header bg-primary text-white px-2 py-2">{{ __('payment.instruction_header') }}</div>
                        <div class="col-sm-12 pt-2">
                            <p class="lead">{{ __('payment.instruction_description') }}</p>
                            <ol>
                                <li>{{ __('payment.instruction_content1') }}</li>
                                <li>{{ __('payment.instruction_content2') }}</li>
                                <li>{{ __('payment.instruction_content3') }}</li>
                                <li>{{ __('payment.instruction_content4') }}</li>
                            </ol>
                        </div>
                    </div>
                  {{--Payment description--}}
                    <div class="row">
                        <div class="card-header bg-primary text-white px-2 py-2">{{ __('payment.method_header') }}</div>
                        <div class="col-sm-12 pt-2">
                              <table  style="font-family:Times New Roman, Times, serif;font-size:13px">
                                <tr><td>{{ __('payment.method_content1') }}</td><td colspan="2"><b>{{ __('payment.method_content1_name') }}</b></td></tr>
                                <tr><td>{{ __('payment.method_content2') }}</td><td><b>{{ __('payment.bank1_name') }} &nbsp;</b><td><b>{{ __('payment.bank1_acc') }}</b></td></td></tr>
                                <tr><td>&nbsp;</td><td><b>{{ __('payment.bank2_name') }} &nbsp;</b><td><b>{{ __('payment.bank2_acc') }}</b></td></td></tr>
                                <tr><td>&nbsp;</td><td><b>{{ __('payment.bank3_name') }} &nbsp;</b><td><b>{{ __('payment.bank3_acc') }}</b></td></td></tr>
                              </table>
                        </div>
                    </div>
                    <hr> <br>
                {{--Payment Slip Upload--}}
                <div class="row">
                    <div class="col-md-10">
                        <p class="fw-bold"><span class="text-danger">*</span>{{ __('payment.application_fee') }}<span class="text-danger">*</span></p>
                        <p>{{ __('payment.application_non_refundable') }}</p>
                    <div class="row">
                        <div class="col-sm-9 mb-3">
                            <label for="payment" class="form-label">{{ __('payment.photo') }} (<span class="text-danger fw-bold">{{ __('payment.photoAccepted') }}</span>) <span class="text-danger">*</span></label>
                            <div class="d-flex flex-row">
                                <input class="form-control me-3" id="payment" name="payment" type="file" accept=".jpg, .jpeg .pdf .png" onchange="previewImage(event)" required >
                                {{-- <button class="btn btn-primary me-3" id="image_upload" name="image_upload">Upload</button> --}}
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <p>{{ __('payment.photoPreview') }}</p>
                            <img id="preview_location" name="preview_location" class="img-fluid" width="150px" height="180px">
                        </div>
                    </div>
                </div>
          </div>                    
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-end mb-3 mt-3">
                <a href="/supporting_document" class="btn btn-secondary me-3">{{ __('payment.back_button') }}</a>
                <button type="submit" class="btn btn-primary" onClick="return confirm('After submit the all information. You cannot do any changes. Please check before submit')">{{ __('payment.next_button') }}</button> 

            </div>
        </div>
        <!--End of Payment Page-->
        </div>
    </div>

</div>

<script>
    var previewImage = function(event){
        var previewLocation = document.getElementById('preview_location');
        previewLocation.src = URL.createObjectURL(event.target.files[0]);
        previewLocation.onload = function(){
            URL.revokeObjectURL(previewLocation.src);
        }
    }
</script>

@endsection