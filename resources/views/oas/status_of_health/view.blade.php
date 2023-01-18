@extends('oas.layouts.app')

@section('content')

    {{-- modal --}}
    <style>
        .modal-backdrop {
            background-color: rgb(50, 47, 47);
        }
    </style>

    @if ($application_status_id == 0)
        <script>$(function(){$('#statusCode0Modal').modal('show');});</script>
    @elseif($application_status_id == 1)
        <script>$(function(){$('#statusCode1Modal').modal('show');});</script>
    @elseif($application_status_id == 2)
        <script>$(function(){$('#statusCode2Modal').modal('show');});</script>
    @elseif($application_status_id == 3)
        <script>$(function(){$('#statusCode3Modal').modal('show');});</script>
    @elseif($application_status_id == 4)
        <script>$(function(){$('#statusCode4Modal').modal('show');});</script>
    @elseif($application_status_id == 5)
        <script>$(function(){$('#statusCode5Modal').modal('show');});</script>
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
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('modal.back_to_home_button') }}</a>
                    <a href="{{ route('personalParticulars.home') }}" type="button" class="btn btn-primary">{{ __('modal.continue') }}</a>
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
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('modal.back_to_home_button') }}</a>
                    <a href="{{ route('parentGuardianParticulars.home') }}" type="button" class="btn btn-primary">{{ __('modal.continue') }}</a>
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
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('modal.back_to_home_button') }}</a>
                    <a href="{{ route('emergencyContact.home') }}" type="button" class="btn btn-primary">{{ __('modal.continue') }}</a>
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
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('modal.back_to_home_button') }}</a>
                    <a href="{{ route('profilePicture.home') }}" type="button" class="btn btn-primary">{{ __('modal.continue') }}</a>
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
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('modal.back_to_home_button') }}</a>
                    <a href="{{ route('program_selection.program_selection') }}" type="button" class="btn btn-primary">{{ __('modal.continue') }}</a>
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
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('modal.back_to_home_button') }}</a>
                    <a href="{{ route('academicDetail.home') }}" type="button" class="btn btn-primary">{{ __('modal.continue') }}</a>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}
    {{-- status 7 = personal particulars / AND parent guardian particulars / AND emergency contact / AND profile picture / AND program selection / AND academic Record /--}}
    <div class="modal fade" id="statusCode7Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode4ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h1 class="modal-title fs-5" id="statusCode7ModalLabel">{{ __('modal.congratulations') }}</h1></div>
                <div class="modal-body">
                    <p>{{ __('modal.complete_soh_modal_description1') }}</p>
                    <p>{{ __('modal.complete_soh_modal_description2') }}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('modal.back_to_home_button') }}</a>
                    <a href="{{ route('agreements.home') }}" type="button" class="btn btn-primary">{{ __('modal.continue') }}</a>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}

<div class="container mb-4">
    <div class="row">
        <div class="col-md-12">
            <h2 class="fw-bold mb-3">{{ __('statusOfHealth.title') }}</h2>
            <div class="border-bottom border-primary border-3 mb-2"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-label="Animated striped example" style="width: 42%" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" >{{ __('statusOfHealth.current_step') }}</div>
                <span class="text-primary ms-3 fw-bold">{{ __('statusOfHealth.next_step') }}</span>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <form action="{{ route('statusOfHealth.update') }}" method="POST">
                    @csrf
                <div class="card-header bg-primary text-white">{{ __('statusOfHealth.header') }}</div>
                <div class="card-body">
                    <p>{{ __('statusOfHealth.description') }}</p>
                    <div class="row mb-3">
                        <div class="col-md-12 table-responsive">
                            <table class="table">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <td scope="col">{{ __('statusOfHealth.table_title1') }}</td>
                                        <td scope="col">{{ __('statusOfHealth.table_title2') }}</td>
                                        <td scope="col">{{ __('statusOfHealth.table_title3') }}</td>
                                    </tr>
                                </thead> 
                                <tbody>
                                    @foreach ($statusOfHealth as $statusOfHealth)
                                    <tr>
                                        <th>
                                            <p>{{ $statusOfHealth->disease['name'] }}</p>
                                            <input type="hidden" name="disease_id[{{ $statusOfHealth->disease['id'] }}]" value="{{ $statusOfHealth->disease['id'] }}">
                                        </th>
                                        <th>
                                            <select name="h_status[{{ $statusOfHealth->disease['id'] }}]" id="h_status" class="form-select">
                                                <option value="{{ $statusOfHealth->disease_status }}" selected>{{ $statusOfHealth->disease_status }}</option>
                                                <option value="No">{{ __('statusOfHealth.choose1') }}</option>
                                                <option value="Yes">{{ __('statusOfHealth.choose2') }}</option>
                                            </select>
                                        </th>
                                        <th><input type="text" class="form-control" name="h_remark[{{ $statusOfHealth->disease['id'] }}]" value="{{ $statusOfHealth->disease_remark }}"></th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end mb-3 mt-3">
                        <a href="{{ route('academicDetail.home') }}" class="btn btn-secondary me-3">{{ __('statusOfHealth.back_button') }}</a>
                        <button type="submit" class="btn btn-primary">{{ __('statusOfHealth.next_button') }}</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection