@extends('oas.layouts.app')
@section('content')
    
{{-- 
    modal - show when feedback when user visit this page
    if no modal pop up first time, means applicant not yet setup this profile

    Modal name        |  Step                               | application_status_id
    statusCode0Modal  | not yet finish personal particulars | 0
    statusCode2Modal  | finish personal particulars         | 2
--}}
<style>.modal-backdrop {background-color: rgb(50, 47, 47);}</style>
@if ($applicant_status_log == null)
    <script>$(function(){$('#statusCode0Modal').modal('show');});</script>
@elseif($applicant_status_log->applicant_profile_status_id >= config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PARENT_GUARDIAN_PARTICULARS'))
    <script>$(function(){$('#statusCode2Modal').modal('show');});</script> 
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

{{-- statusCode2Modal --}}
<div class="modal fade" id="statusCode2Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode2ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h1 class="modal-title fs-5" id="statusCode2ModalLabel">{{ __('modal.thank_you') }}</h1></div>
            <div class="modal-body">
                <p>{{ __('modal.complete_pg_modal_description1') }}</p>
                <p>{{ __('modal.complete_pg_modal_description2') }}</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('button.back_to_home_page') }}</a>
                <a href="{{ route('emergencyContact.home') }}" type="button" class="btn btn-primary">{{ __('button.continue') }}</a>
            </div>
        </div>
    </div>
</div>
{{-- end statusCode2Modal --}}

{{-- header --}}
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="border-bottom">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('button.home') }}</a></li>
                      <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('userProfile.title2') }}</li>
                    </ol>
                </nav>
                <h1 class="fw-bold">{{ __('userProfile.title2') }}</h1>
                <p><span class="fw-bold">Step 2 of 4</span> Completed</p>
                <div class="progress mb-2" style="height: 10px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary opacity-25" role="progressbar" style="width: 50%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end header --}}

{{-- form --}}
<div class="container">
    <form action="{{ route('parentGuardianParticulars.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- name --}}
        <div class="row d-flex flex-row mt-4">
            <div class="col-md-4">
                <h4 class="fw-bold">{{ __('inputFields.pg_name') }}</h4>
                <p class="text-secondary">{{ __('inputFields.hint_for_pg_name') }}</p>
            </div>
            <div class="col-md-8">
                <div class="row g-2">
                    <div class="col-md mb-3">
                        <label for="en_name" class="form-label">{{ __('inputFields.en_name') }}<span class="text-danger">*</span></label>
                        <input type="text" name="en_name" id="en_name" class="form-control text-capitalize" placeholder="" onkeyup="if (/[^|A-Za-z0-9\s/.]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/.]+/g,'')" required>
                    </div>
                    <div class="col-md mb-3">
                        <label for="ch_name" class="form-label">{{ __('inputFields.ch_name') }}</label>
                        <input type="text" name="ch_name" id="ch_name" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom mt-4 mb-4"></div>
        {{-- end name --}}
        {{-- 
            identity card - if applicant not malaysian let them to click the checkbox and
                            show the input field to let applicant fill in passport 
        --}}
        <div class="row d-flex flex-row mt-4">
            <div class="col-md-4">
                <h4 class="fw-bold">{{ __('inputFields.ic_or_passport') }}</h4>
                <p class="text-secondary">{{ __('inputFields.hint_for_ic_or_passport') }}</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="changeInput" onclick="changeInputMethod()">
                    <label class="form-check-label" for="changeInput">{{ __('inputFields.ic_or_passport_checkbox') }}</label>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row" id="ic_section">
                    <label for="ic" class="form-label">{{ __('inputFields.ic') }}<span class="text-danger">*</span></label>
                    <div class="col-md d-flex flex-row align-items-center mb-3">
                        <input type="text" name="ic1" id="ic1" class="form-control" placeholder="" minlength="6" maxlength="6" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                        <span class="ms-4">-</span>
                    </div>
                    <div class="col-md d-flex flex-row align-items-center mb-3">
                        <input type="text" name="ic2" id="ic2" class="form-control" placeholder="" minlength="2" maxlength="2" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                        <span class="ms-4">-</span>
                    </div>
                    <div class="col-md mb-3">
                        <input type="text" name="ic3" id="ic3" class="form-control" placeholder="" minlength="4" maxlength="4" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                    </div>
                </div>
                <div class="row" id="passport_section" style="display: none;">
                    <label for="ic" class="form-label">{{ __('inputFields.passport') }}<span class="text-danger">*</span></label>
                    <div class="col-md mb-3">
                        <input type="text" name="passport" id="passport" class="form-control" placeholder="" onkeyup="if (/[^|A-Za-z0-9-]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9-]+/g,'')">
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom mt-4 mb-4"></div>
        {{-- end identity card --}}
        {{-- script --}}
        <script>
            function changeInputMethod(){
                const changeInput = document.getElementById('changeInput');
                const ic_section = document.getElementById('ic_section');
                const passport_section = document.getElementById('passport_section');
                const ic1 = document.getElementById('ic1');
                const ic2 = document.getElementById('ic2');
                const ic3 = document.getElementById('ic3');
                const passport = document.getElementById('passport');
                if(changeInput.checked){
                    ic_section.style.display = 'none';
                    passport_section.style.display = 'block';
                    passport.setAttribute('required','');
                    ic1.removeAttribute('required');
                    ic2.removeAttribute('required');
                    ic3.removeAttribute('required');
                }else{
                    ic_section.style.removeProperty('display');
                    passport_section.style.display = 'none';
                    passport.removeAttribute('required');
                    ic1.setAttribute('required','');
                    ic2.setAttribute('required','');
                    ic3.setAttribute('required','');
                }
            }
        </script>
        {{-- end script --}}
        {{-- relationship, nationality --}}
        <div class="row d-flex flex-row mt-4">
            <div class="col-md-4">
                <h4 class="fw-bold">{{ __('inputFields.relationship') }} & {{ __('inputFields.nationality') }}</h4>
            </div>
            <div class="col-md-8">
                <div class="row g-3">
                    <div class="col-md mb-3">
                        <label for="relationship" class="form-label">{{ __('inputFields.relationship') }}<span class="text-danger">*</span></label>
                        <select name="guardian_relationship_id" id="relationship" class="form-select" required>
                            <option value="" disabled selected hidden>{{ __('inputFields.relationship_placeholder') }}</option>
                            @foreach ($data['relationships'] as $relationship)
                                <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md mb-3">
                        <label for="nationality" class="form-label">{{ __('inputFields.nationality') }}<span class="text-danger">*</span></label>
                        <select name="nationality_id" id="nationality" class="form-select" required>
                            <option value="" disabled selected hidden>{{ __('inputFields.nationality_placeholder') }}</option>
                            @foreach ($data['nationalities'] as $nationality)
                                <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom mt-4 mb-4"></div>
        {{-- end relationship, nationality --}}
        {{-- occupation, family income  --}}
        <div class="row d-flex flex-row mt-4">
            <div class="col-md-4">
                <h4 class="fw-bold">{{ __('inputFields.occupation') }} & {{ __('inputFields.income') }}</h4>
            </div>
            <div class="col-md-8">
                <div class="row g-3">
                    <div class="col-md mb-3">
                        <label for="occupation" class="form-label">{{ __('inputFields.occupation') }}<span class="text-danger">*</span></label>
                        <input type="text" name="occupation" id="occupation" class="form-control" onkeyup="if (/[^|A-Za-z0-9\s/.]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/.]+/g,'')" required>
                    </div>
                    <div class="col-md mb-3">
                        <label for="income" class="form-label">{{ __('inputFields.income_range') }}<span class="text-danger">*</span></label>
                        <select name="income_id" id="income" class="form-select" required>
                            <option value="" disabled selected hiddend>{{ __('inputFields.income_placeholder') }}</option>
                            @foreach ($data['incomes'] as $income)
                                <option value="{{ $income->id }}">{{ $income->range }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom mt-4 mb-4"></div>
        {{-- end occupation, family income  --}}
        {{-- contact --}}
        <div class="row d-flex flex-row mt-4">
            <div class="col-md-4">
                <h4 class="fw-bold">{{ __('inputFields.contact') }}</h4>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md mb-3">
                        <label for="tel_hp" class="form-label">{{ __('inputFields.tel_hp') }}<span class="text-danger">*</span></label>
                        <input type="text" name="tel_hp" id="tel_hp" class="form-control" placeholder="" maxlength="13" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                    </div>
                    <div class="col-md mb-3">
                        <label for="email" class="form-label">{{ __('inputFields.email') }}</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="abc@email.com">
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom mt-4 mb-4"></div>
        {{-- end contact --}}
        {{-- permanent address --}}
        <div class="row d-flex flex-row mt-4 mb-4">
            <div class="col-md-4">
                <h4 class="fw-bold">{{ __('inputFields.p_address') }}</h4>
            </div>
            <div class="col-md-8">
                <div class="row g-3">
                    <div class="col-md mb-3">
                        <label for="p_street1" class="form-label">{{ __('inputFields.address1') }}<span class="text-danger">*</span></label>
                        <input type="text" name="p_street1" id="p_street1" class="form-control" placeholder="{{ __('inputFields.address1_placeholder') }}" onkeyup="if (/[^|A-Za-z0-9/.\s,]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9/.\s,]+/g,'')" required>
                    </div>
                    <div class="col-md mb-3">
                        <label for="p_street2" class="form-label">{{ __('inputFields.address2') }}<span class="text-danger">*</span></label>
                        <input type="text" name="p_street2" id="p_street2" class="form-control" placeholder="{{ __('inputFields.address2_placeholder') }}" onkeyup="if (/[^|A-Za-z0-9/.\s,]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9/.\s,]+/g,'')" required>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md mb-3">
                        <label for="p_zipcode" class="form-label">{{ __('inputFields.zipcode') }}<span class="text-danger">*</span></label>
                        <input type="text" name="p_zipcode" id="p_zipcode" class="form-control" minlength="5" maxlength="5" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                    </div>
                    <div class="col-md mb-3">
                        <label for="p_city" class="form-label">{{ __('inputFields.city') }}<span class="text-danger">*</span></label>
                        <input type="text" name="p_city" id="p_city" class="form-control" onkeyup="if (/[^|A-Za-z/.\s]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z/.\s]+/g,'')" required>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md mb-3">
                        <label for="p_state" class="form-label">{{ __('inputFields.state') }}<span class="text-danger">*</span></label>
                        <input type="text" name="p_state" id="p_state" class="form-control" onkeyup="if (/[^|A-Za-z/.\s]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z/.\s]+/g,'')" required>
                    </div>
                    <div class="col-md mb-3">
                        <label for="p_country" class="form-label">{{ __('inputFields.country') }}<span class="text-danger">*</span></label>
                        <select name="p_country_id" id="p_country" class="form-select" required>
                            <option value="" disabled selected hiddend>{{ __('inputFields.country_placeholder') }}</option>
                            @foreach ($data['countries'] as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom mt-4 mb-4"></div>
        {{-- permanent address --}}
        {{-- form submit --}}
        @if ($applicant_status_log != null && $applicant_status_log->applicant_profile_status_id == config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PERSONAL_PARTICULARS'))
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