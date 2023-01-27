@extends('oas.layouts.app')

@section('content')

{{-- modal --}}
<style>.modal-backdrop {background-color: rgb(50, 47, 47);}</style>
@if (Session::has('data') && Session::get('data')['application_status_id'] == config('constants.APPLICATION_STATUS_CODE.COMPLETE_AGREEMENT'))
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
                    <a href="{{ route('agreements.home',['id'=>Session::get('data')['application_record_id'] ]) }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
                </div>
            </div>
        </div>
    </div>
@endif
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
                    <a href="{{ route('statusOfHealth.home',['id'=> Crypt::encrypt($APPLICATION_RECORD_ID)]) }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
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
    <form action="{{ route('agreements.submit',['id' => Crypt::encrypt($APPLICATION_RECORD_ID)]) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('agreements.header') }}</div>
                        <div class="card-body">
                    {{--Refund Policy for New Students' Withdrawal--}}
                            <div class="row px-3 mt-3 mb-3">
                                <div class="card-header bg-primary text-white px-3 py-2">{{ __('agreements.consent1_header') }}</div>
                                    <div class="col-sm-12 pt-2">
                                        <p class="lead">{{ __('agreements.consent1_title') }}</p>
                                        <ul>
                                            <li>{{ __('agreements.consent1_content1') }}</li>
                                            <li>{{ __('agreements.consent1_content2') }}</li>
                                            <li>{{ __('agreements.consent1_content3') }}</li>
                                            <li>{{ __('agreements.consent1_content4') }}</li>
                                        </ul>
                                </div>
                            </div>

                            {{--Southern Holistic Education 南方整体教育--}}
                            <div class="row px-3 mt-3 mb-3">
                                <div class="card-header bg-primary text-white px-3 py-2">{{ __('agreements.consent2_header') }}</div>
                                    <div class="col-sm-12 pt-2">
                                        <p class="lead">{{ __('agreements.consent2_title') }}</p>
                                        <ul>
                                            <li>{{ __('agreements.consent2_content1') }}</li>
                                            <li>{{ __('agreements.consent2_content2') }} </li>
                                        </ul>
                                </div>
                            </div>

                            {{--Letter of Guarantee 担保信--}}
                            <div class="row px-3 mt-3 mb-3">
                                <div class="card-header bg-primary text-white px-3 py-2">{{ __('agreements.consent3_header') }}</div>
                                    <div class="col-sm-12 pt-2">
                                        <p>{{ __('agreements.consent3_content') }}</p>
                                </div>
                            </div>

                            {{--Self Declaration 宣誓书--}}
                            <div class="row px-3 mt-3 mb-3">
                                <div class="card-header bg-primary text-white px-3 py-2">{{ __('agreements.consent4_header') }}</div>
                                    <div class="col-sm-12 pt-2">
                                        <p class="lead">{{ __('agreements.consent4_title') }}</p>
                                            <p>{{ __('agreements.consent4_reference') }} <a href="{{ __('agreements.consent4_reference_link') }}" target="_blank">{{ __('agreements.consent4_reference_title') }}</a></p>
                                            <p>{{ __('agreements.consent4_content1') }} <a href="{{ __('agreements.consent4_email') }}">{{ __('agreements.consent4_email_title') }}</a>{{ __('agreements.consent4_content1_2') }}<br />
                                                {{ __('agreements.consent4_content1_br') }}</p>
                                            <p>{{ __('agreements.consent4_content2') }}</p>
                                            <p>{{ __('agreements.consent4_content3') }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row px-3 mt-3 mb-3">
                                <div class="col-md-12 mt-4">
                                    <div class="d-flex flex-row">
                                        <input class="form-check-input me-2" type="checkbox" value="" aria-label="Checkbox for following text input" required/>
                                        <span><span style="color: #F00">*</span><strong>{{ __('agreements.consent_agree') }}<strong></span>
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