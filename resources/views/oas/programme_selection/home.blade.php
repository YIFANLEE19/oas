@extends('oas.layouts.app')

@section('content')
@livewireStyles
{{-- modal --}}
<style>.modal-backdrop {background-color: rgb(50, 47, 47);}</style>
@if (Session::has('data') && Session::get('data')['application_status_id'] == config('constants.APPLICATION_STATUS_CODE.COMPLETE_PROGRAM_SELECTION'))
    <script>$(function(){$('#statusCode0Modal').modal('show');});</script>  
    <div class="modal fade" id="statusCode0Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode0ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h1 class="modal-title fs-5" id="statusCode0ModalLabel">{{ __('modal.thank_you') }}</h1></div>
                <div class="modal-body">
                    <p>{{ __('modal.complete_program_selection') }}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('button.back_to_home_page') }}</a>
                    <a href="{{ route('academicDetail.home',['id'=>Session::get('data')['application_record_id'] ]) }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
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
                      <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('programmeSelect.title') }}</li>
                    </ol>
                </nav>
                <h1 class="fw-bold">{{ __('programmeSelect.title') }}</h1>
                <p><span class="fw-bold">Step 1 of 7</span> Completed</p>
                <div class="progress mb-2" style="height: 10px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 14%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary opacity-25" role="progressbar" style="width: 86%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end header --}}

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('programmeSelect.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('programmeSelect.title') }}</div>
                    <div class="card-body">
                        <livewire:programme-selection/>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary me-3">{{ __('button.back_to_home_page') }}</a>
                            <button type="submit" class="btn btn-primary me-3">{{ __('statusOfHealth.next_button') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@livewireScripts
@endsection