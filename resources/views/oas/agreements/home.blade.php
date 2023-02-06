@extends('oas.layouts.app')

@section('content')

{{-- modal --}}
<style>.modal-backdrop {background-color: rgb(50, 47, 47);}</style>
@if ($application_status_log_id->application_status_id >= config('constants.APPLICATION_STATUS_CODE.COMPLETE_AGREEMENT'))
    <script>$(function(){$('#statusCode0Modal').modal('show');});</script>  
    <div class="modal fade" id="statusCode0Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode0ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h1 class="modal-title fs-5" id="statusCode0ModalLabel">{{ __('modal.thank_you') }}</h1></div>
                <div class="modal-body">
                    <p>{{ __('modal.complete_ar_modal_description1') }}</p>
                    <p>{{ __('modal.complete_ar_modal_description2') }}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('button.back_to_home_page') }}</a>
                    <a href="{{ route('draft.home',['id'=> Crypt::encrypt($APPLICATION_RECORD_ID)]) }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
                </div>
            </div>
        </div>
    </div>
@endif

{{-- header --}}
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="border-bottom">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('button.home') }}</a></li>
                      <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('agreements.title') }}</li>
                    </ol>
                </nav>
                <h1 class="fw-bold">{{ __('agreements.title') }}</h1>
                <p><span class="fw-bold">Step 4 of 7</span> Completed</p>
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
    <form action="{{ route('agreements.submit',['id' => Crypt::encrypt($APPLICATION_RECORD_ID)]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('agreements.card-header-1') }}</div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="fw-bold">{{ __('agreements.section-1') }}</h2>
                                        <p class="lead">{{ __('agreements.section-1-paragraph') }}</p>
                                        <ul>
                                            <li>{{ __('agreements.section-1-item-1') }}</li>
                                            <li>{{ __('agreements.section-1-item-2') }}</li>
                                            <li>{{ __('agreements.section-1-item-3') }}</li>
                                            <li>{{ __('agreements.section-1-item-4') }}</li>
                                        </ul>
                                        <h2 class="fw-bold">{{ __('agreements.section-2') }}</h2>
                                        <p class="lead">{{ __('agreements.section-2-paragraph') }}</p>
                                        <ul>
                                            <li>{{ __('agreements.section-2-item-1') }}</li>
                                            <li>{{ __('agreements.section-2-item-2') }}</li>
                                        </ul>
                                        <h2 class="fw-bold">{{ __('agreements.section-3') }}</h2>
                                        <p class="lead">{{ __('agreements.section-3-paragraph') }}</p>
                                        <h2 class="fw-bold">{{ __('agreements.section-4') }}</h2>
                                        <p class="lead">{{ __('agreements.section-4-paragraph-1') }}</p>
                                        <p>{{ __('agreements.section-4-paragraph-2') }} <a href="{{ __('agreements.section-4-reference-link') }}">{{ __('agreements.section-4-reference-text') }}</a></p>
                                        <ul>
                                            <li>{{ __('agreements.section-4-paragraph-4') }} <a href="mailto:reg@sc.edu.my">{{ __('agreements.email') }}</a></li>
                                            <li>{{ __('agreements.section-4-paragraph-5') }}</li>
                                            <li>{{ __('agreements.section-4-paragraph-6') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""required/>
                                        <label class="form-check-label"><span class="text-danger">*</span>{{ __('agreements.agree-msg-1') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('statusOfHealth.home',['id' => Crypt::encrypt($APPLICATION_RECORD_ID)]) }}" class="btn btn-outline-secondary me-3">{{ __('agreements.back_button') }}</a>
                                    <button class="btn btn-primary">{{ __('agreements.next_button') }}</button>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection