@extends('oas.layouts.app')

@section('content')

{{-- modal --}}
<style>.modal-backdrop {background-color: rgb(50, 47, 47);}</style>
@if (Session::has('data') && Session::get('data')['application_status_id'] == config('constants.APPLICATION_STATUS_CODE.COMPLETE_ACADEMIC_DETAIL'))
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
@if ($application_status_log_id->application_status_id >= config('constants.APPLICATION_STATUS_CODE.COMPLETE_ACADEMIC_DETAIL'))
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
                      <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('academicRecord.title') }}</li>
                    </ol>
                </nav>
                <h1 class="fw-bold">{{ __('academicRecord.title') }}</h1>
                <p><span class="fw-bold">Step 2 of 7</span> Completed</p>
                <div class="progress mb-2" style="height: 10px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary opacity-25" role="progressbar" style="width: 72%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end header --}}

{{-- success message --}}
@if(Session::has('error'))
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
@endif
{{-- end success message --}}

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('academicRecord.header') }}</div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('academicDetail.create', ['id' => Crypt::encrypt($APPLICATION_RECORD_ID)]) }}" method="POST">
                            @csrf
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
                                            <tr>
                                                <td>
                                                    <p name="school_level" id="school_level">{{ $school_level[0]->name }}<span></p>
                                                </td>
                                                <td>
                                                    <input onkeyup="if (/[^|A-Za-z0-9\s/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/]+/g,'')"  maxlength="50" type="text" class="form-control" name="s_school_name" id="s_school_name">
                                                </td>
                                                <td><input onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" maxlength="10" type="text" name="s_school_graduation" id="s_school_graduation" class="form-control"></td>
                                            </tr>   
                                            <tr>
                                                <td>
                                                    <p name="school_level" id="school_level">{{ $school_level[1]->name }}</p>
                                                </td>
                                                <td>
                                                    <input onkeyup="if (/[^|A-Za-z0-9\s/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/]+/g,'')" maxlength="50" type="text" class="form-control" name="us_school_name" id="us_school_name">
                                                </td>
                                                <td><input onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" maxlength="10" type="text" name="us_school_graduation" id="us_school_graduation" class="form-control"></td>
                                            </tr>                                   
                                            <tr>
                                                <td>
                                                    <p name="school_level" id="school_level">{{ $school_level[2]->name }}</p>
                                                </td>
                                                <td>
                                                    <input onkeyup="if (/[^|A-Za-z0-9\s/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/]+/g,'')" maxlength="50" type="text" class="form-control" name="f_school_name" id="f_school_name">
                                                </td>
                                                <td><input onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" maxlength="10" type="text" name="f_school_graduation" id="f_school_graduation" class="form-control"></td>
                                            </tr>            

                                            <tr>
                                                <td>
                                                    <p name="school_level" id="school_level">{{ $school_level[3]->name }}</p>
                                                </td>
                                                <td>
                                                    <input onkeyup="if (/[^|A-Za-z0-9\s/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/]+/g,'')" maxlength="50" type="text" class="form-control" name="di_school_name" id="di_school_name">
                                                </td>
                                                <td><input onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" maxlength="10" type="text" name="di_school_graduation" id="di_school_graduation" class="form-control"></td>
                                            </tr> 

                                            <tr>
                                                <td>
                                                    <p name="school_level" id="school_level">{{ $school_level[4]->name }}</p>
                                                </td>
                                                <td>
                                                    <input onkeyup="if (/[^|A-Za-z0-9\s/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/]+/g,'')" maxlength="50" type="text" class="form-control" name="de_school_name" id="de_school_name">
                                                </td>
                                                <td><input onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" maxlength="10" type="text" name="de_school_graduation" id="de_school_graduation" class="form-control"></td>
                                            </tr> 
                                            <tr>
                                                <td>
                                                    <p name="school_level" id="school_level">{{ $school_level[5]->name }}</p>
                                                </td>
                                                <td>
                                                    <input onkeyup="if (/[^|A-Za-z0-9\s/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/]+/g,'')" maxlength="50" type="text" class="form-control" name="p_school_name" id="p_school_name">
                                                </td>
                                                <td><input onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" maxlength="10" type="text" name="p_school_graduation" id="p_school_graduation" class="form-control"></td>
                                            </tr> 
                                            <tr>
                                                <td>
                                                    <p name="school_level" id="school_level">{{ $school_level[6]->name }}</p>
                                                </td>
                                                <td>
                                                    <input onkeyup="if (/[^|A-Za-z0-9\s/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/]+/g,'')" maxlength="50" type="text" class="form-control" name="m_school_name" id="m_school_name">
                                                </td>
                                                <td><input onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" maxlength="10" type="text" name="m_school_graduation" id="m_school_graduation" class="form-control"></td>
                                            </tr> 
                                            <tr>
                                                <td>
                                                    <p name="school_level" id="school_level">{{ $school_level[7]->name }}</p>
                                                </td>
                                                <td>
                                                    <input onkeyup="if (/[^|A-Za-z0-9\s/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/]+/g,'')" maxlength="50" type="text" class="form-control" name="o_school_name" id="o_school_name">
                                                </td>
                                                <td><input onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" maxlength="10" type="text" name="o_school_graduation" id="o_school_graduation" class="form-control"></td>
                                            </tr> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card-footer">
                       <div class="d-flex justify-content-end mb-3 mt-3">
                            <a href="/program_selection" class="btn btn-outline-secondary me-3">{{ __('academicRecord.back_button') }}</a>
                            <button type="submit" class="btn btn-primary me-3" onClick="check()">{{ __('academicRecord.next_button') }}</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection