@extends('oas.layouts.app')

@section('content')

{{-- modal --}}
<style>.modal-backdrop {background-color: rgb(50, 47, 47);}</style>
@if (Session::has('data') && Session::get('data')['application_status_id'] == config('constants.APPLICATION_STATUS_CODE.COMPLETE_STATUS_OF_HEALTH'))
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
                    <a href="{{ route('statusOfHealth.home',['id'=>Session::get('data')['application_record_id'] ]) }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
                </div>
            </div>
        </div>
    </div>
@endif
@if ($application_status_log_id->application_status_id >= config('constants.APPLICATION_STATUS_CODE.COMPLETE_STATUS_OF_HEALTH'))
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

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('statusOfHealth.create',['id' => Crypt::encrypt($APPLICATION_RECORD_ID)])}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="card">
                    <div class="card-header bg-primary text-white">Status of health</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">Type of Disease</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">If 'Yes', Please state</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($diseases); $i++)         
                                        <tr>
                                            <th scope="row">
                                                {{ $diseases[$i]->name }}
                                                <input type="hidden" name="disease_id[]" value="{{ $diseases[$i]->id }}">
                                            </th>
                                            <td>
                                                <select name="disease_status[]" id="disease_status[{{ $diseases[$i]->id }}]" class="form-select" onchange="setRequired(this,'disease_remark[{{ $diseases[$i]->id }}]')">
                                                    <option value="1">No</option>
                                                    <option value="2">Yes</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="disease_remark[]" id="disease_remark[{{ $diseases[$i]->id }}]" class="form-control">
                                            </td>  
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end mb-3 mt-3">
                            <a href="/program_selection" class="btn btn-outline-secondary me-3">{{ __('academicRecord.back_button') }}</a>
                            <button type="submit" class="btn btn-primary me-3">{{ __('academicRecord.next_button') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function setRequired(select,remark_id){
        (select.value == 2)?document.getElementById(remark_id).setAttribute('required',''):document.getElementById(remark_id).removeAttribute('required');
    }
</script>
@endsection