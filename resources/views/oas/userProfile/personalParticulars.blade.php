@extends('oas.layouts.app')
@section('content')

{{-- 
    modal - show when feedback when user visit this page
    if no modal pop up first time, means applicant not yet setup this profile

    Modal name    |  Step                          | application_status_id
    completeModal |  complete personal particulars | 1
--}}
<style>.modal-backdrop {background-color: rgb(50, 47, 47);}</style>
@if(Session::has('application_status_id') && Session::get('application_status_id') == 1)
    <script>$(function(){$('#completeModal').modal('show');});</script>        
@endif
@if ($application_status_id == 1 || $application_status_id >= 1)
    <script>$(function(){$('#completeModal').modal('show');});</script>   
@endif

{{-- completeModal --}}
<div class="modal fade" id="completeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="completeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h1 class="modal-title fs-5" id="completeModalLabel">{{ __('modal.thank_you') }}</h1></div>
            <div class="modal-body">
                <p>{{ __('modal.complete_pp_modal_description1') }}</p>
                <p>{{ __('modal.complete_pp_modal_description2') }}</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">{{ __('modal.back_to_home_button') }}</a>
                <a href="{{ route('parentGuardianParticulars.home') }}" type="button" class="btn btn-primary">{{ __('modal.continue') }}</a>
            </div>
        </div>
    </div>
</div>
{{-- end completeModal --}}

{{-- header --}}
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="border-bottom">
                <h1 class="fw-bold">{{ __('personalParticulars.pageTitle') }}</h1>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('personalParticulars.home') }}</a></li>
                      <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('personalParticulars.pageTitle') }}</li>
                    </ol>
                </nav>
                <div class="progress mb-2">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-label="Default striped example" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ __('personalParticulars.current_step') }}</div>
                    <span class="ms-4">{{ __('personalParticulars.next_step') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end header --}}

{{-- form --}}
<div class="container">
    <form action="{{ route('personalParticulars.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- name --}}
        <div class="row d-flex flex-row mt-4">
            <div class="col-md-4">
                <h4 class="fw-bold">{{ __('personalParticulars.name') }}</h4>
                <p class="text-secondary">{{ __('personalParticulars.name_description') }}</p>
            </div>
            <div class="col-md-8">
                <div class="row g-2">
                    <div class="col-md mb-3">
                        <label for="en_name" class="form-label">{{ __('personalParticulars.en_name') }}<span class="text-danger">*</span></label>
                        <input type="text" name="en_name" id="en_name" class="form-control text-capitalize" required>
                    </div>
                    <div class="col-md mb-3">
                        <label for="ch_name" class="form-label">{{ __('personalParticulars.ch_name') }}</label>
                        <input type="text" name="ch_name" id="ch_name" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom mt-4 mb-4"></div>
        {{-- end name --}}
        {{-- 
            identity card - if applicant don't have ic let them to click the checkbox and
                            show the input field to let applicant fill in other certificate
        --}}
        <div class="row d-flex flex-row mt-4">
            <div class="col-md-4">
                <h4 class="fw-bold">{{ __('personalParticulars.ic') }}</h4>
                <p class="text-secondary">{{ __('personalParticulars.ic_description1') }}</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="changeInput" onclick="changeInputMethod()">
                    <label class="form-check-label" for="changeInput">{{ __('personalParticulars.ic_checkbox') }}</label>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row" id="ic_section">
                    <label for="ic" class="form-label">{{ __('personalParticulars.ic') }}<span class="text-danger">*</span></label>
                    <div class="col-md d-flex flex-row align-items-center mb-3">
                        <input type="text" name="ic1" id="ic1" class="form-control" maxlength="6" required>
                        <span class="ms-4">-</span>
                    </div>
                    <div class="col-md d-flex flex-row align-items-center mb-3">
                        <input type="text" name="ic2" id="ic2" class="form-control" maxlength="2" required>
                        <span class="ms-4">-</span>
                    </div>
                    <div class="col-md mb-3">
                        <input type="text" name="ic3" id="ic3" class="form-control" maxlength="4" required>
                    </div>
                </div>
                <div class="row" id="passport_section" style="display: none;">
                    <label for="ic" class="form-label">{{ __('personalParticulars.ic') }}<span class="text-danger">*</span></label>
                    <div class="col-md mb-3">
                        <input type="text" name="passport" id="passport" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom mt-4 mb-4"></div>
        {{-- end identity card --}}
        {{-- race, religion, nationality --}}
        <div class="row d-flex flex-row mt-4">
            <div class="col-md-4">
                <h4 class="fw-bold">{{ __('personalParticulars.race_religion_nationality') }}</h4>
            </div>
            <div class="col-md-8">
                <div class="row g-3">
                    <div class="col-md mb-3">
                        <label for="race" class="form-label">{{ __('personalParticulars.race') }}<span class="text-danger">*</span></label>
                        <select name="race_id" id="race" class="form-select" required>
                            <option disabled selected hidden value="">{{ __('personalParticulars.race_placeholder') }}</option>
                            @foreach ($allRaces as $race)
                                <option value="{{ $race->id }}">{{ $race->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md mb-3">
                        <label for="religion" class="form-label">{{ __('personalParticulars.religion') }}<span class="text-danger">*</span></label>
                        <select name="religion_id" id="religion" class="form-select" required>
                            <option disabled selected hidden value="">{{ __('personalParticulars.religion_placeholder') }}</option>
                            @foreach ($allReligions as $religion)
                                <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md mb-3">
                        <label for="nationality" class="form-label">{{ __('personalParticulars.nationality') }}<span class="text-danger">*</span></label>
                        <select name="nationality_id" id="nationality" class="form-select" required>
                            <option value="131" selected>Malaysia</option>
                            <option value="161">Non-Malaysian</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom mt-4 mb-4"></div>
        {{-- end race, religion, nationality --}}
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
                const nationality = document.getElementById('nationality');
                if(changeInput.checked){
                    ic_section.style.display = 'none';
                    passport_section.style.display = 'block';
                    passport.setAttribute('required','');
                    ic1.removeAttribute('required');
                    ic2.removeAttribute('required');
                    ic3.removeAttribute('required');
                    nationality.value = 161;
                }else{
                    ic_section.style.removeProperty('display');
                    passport_section.style.display = 'none';
                    passport.removeAttribute('required');
                    ic1.setAttribute('required','');
                    ic2.setAttribute('required','');
                    ic3.setAttribute('required','');
                    nationality.value = 131;
                }
            }
        </script>
        {{-- end script --}}
        {{-- birth date, age, place of birth --}}
        <div class="row d-flex flex-row mt-4">
            <div class="col-md-4">
                <h4 class="fw-bold">{{ __('personalParticulars.birth_date_age_place_of_birth') }}</h4>
            </div>
            <div class="col-md-8">
                <div class="row g-3">
                    <div class="col-md mb-3">
                        <label for="birth_date" class="form-label">{{ __('personalParticulars.birth_date') }}<span class="text-danger">*</span></label>
                        <input type="date" name="birth_date" id="birth_date" class="form-control" onchange="ageCalculator()" required>
                    </div>
                    <div class="col-md mb-3">
                        <label for="age" class="form-label">{{ __('personalParticulars.age') }}</label>
                        <input type="text" name="age" id="age" class="form-control" disabled>
                    </div>
                    <div class="col-md mb-3">
                        <label for="place_of_birth" class="form-label">{{ __('personalParticulars.place_of_birth') }}<span class="text-danger">*</span></label>
                        <select name="place_of_birth" id="place_of_birth" class="form-select" required>
                            <option disabled selected hidden value="">{{ __('personalParticulars.place_of_birth_placeholder') }}</option>
                            <option value="Johor">Johor</option>
                            <option value="Kedah">Kedah</option>
                            <option value="Kelantan">Kelantan</option>
                            <option value="Kuala Lumpur">Kuala Lumpur</option>
                            <option value="Labuan">Labuan</option>
                            <option value="Malacca">Malacca</option>
                            <option value="Negeri Sembilan">Negeri Sembilan</option>
                            <option value="Pahang">Pahang</option>
                            <option value="Penang">Penang</option>
                            <option value="Perak">Perak</option>
                            <option value="Perlis">Perlis</option>
                            <option value="Sabah">Sabah</option>
                            <option value="Sarawak">Sarawak</option>
                            <option value="Selangor">Selangor</option>
                            <option value="Terengganu">Terengganu</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom mt-4 mb-4"></div>
        {{-- end birth date, age, place of birth --}}
        {{-- script --}}
        <script>
            function ageCalculator(){
                var user_input = document.getElementById('birth_date').value;
                var date_of_birth = new Date(user_input);
                
                if(user_input!=null || user_input!='' || user_input!=undefined){
                    var month_diff = Date.now() - date_of_birth.getTime();
                    var age_df = new Date(month_diff);
                    var year = age_df.getUTCFullYear();
                    var age = Math.abs(year - 1970);
                    return document.getElementById("age").value = age;
                }else{
                    return false;
                }
            }
        </script>
        {{-- end script --}}
        {{-- gender & marital --}}
        <div class="row d-flex flex-row mt-4">
            <div class="col-md-4">
                <h4 class="fw-bold">{{ __('personalParticulars.gender_marital_status') }}</h4>
            </div>
            <div class="col-md-8">
                <div class="row g-2">
                    <div class="col-md">
                        <label for="gender" class="form-label">{{ __('personalParticulars.gender') }}<span class="text-danger">*</span></label>
                        <div class="d-flex flex-row mb-3 me-3">
                            @foreach ($allGenders as $gender)
                                @if ($gender->id == 1)
                                    <div class="form-check-label me-4" for="gender">
                                        <input type="radio" name="gender_id" id="gender1" class="form-check-input" value="{{ $gender->id }}" checked>
                                        <span class="ms-4">{{ $gender->name }}</span>
                                    </div>
                                @else
                                    <div class="form-check-label me-4" for="gender">
                                        <input type="radio" name="gender_id" id="gender1" class="form-check-input" value="{{ $gender->id }}">
                                        <span class="ms-4">{{ $gender->name }}</span>
                                    </div> 
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md">
                        <label for="marital" class="form-label">{{ __('personalParticulars.marital') }}<span class="text-danger">*</span></label>
                        <select name="marital_id" id="marital" class="form-select" required>
                            <option disabled selected hidden value="">{{ __('personalParticulars.marital_placeholder') }}</option>
                            @foreach ($allMaritals as $marital)
                                <option value="{{ $marital->id }}">{{ $marital->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom mt-4 mb-4"></div>
        {{-- end gender & marital --}}
        {{-- contact --}}
        <div class="row d-flex flex-row mt-4">
            <div class="col-md-4">
                <h4 class="fw-bold">{{ __('personalParticulars.contact') }}</h4>
            </div>
            <div class="col-md-8">
                <div class="row g-3">
                    <div class="col-md mb-3">
                        <label for="email" class="form-label">{{ __('personalParticulars.email_address') }}<span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="col-md mb-3">
                        <label for="tel_hp" class="form-label">{{ __('personalParticulars.tel_hp') }}<span class="text-danger">*</span></label>
                        <input type="text" name="tel_hp" id="tel_hp" class="form-control" required>
                    </div>
                    <div class="col-md mb-3">
                            <label for="tel_h" class="form-label">{{ __('personalParticulars.tel_h') }}</label>
                            <input type="text" name="tel_h" id="tel_h" class="form-control"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom mt-4 mb-4"></div>
        {{-- end contact --}}
        {{-- correspondence address --}}
        <div class="row d-flex flex-row mt-4 mb-4">
            <div class="col-md-4">
                <h4 class="fw-bold">{{ __('personalParticulars.correspondence_address') }}</h4>
            </div>
            <div class="col-md-8">
                <div class="row g-3">
                    <div class="col-md mb-3">
                        <label for="c_street1" class="form-label">{{ __('personalParticulars.address_line1') }}<span class="text-danger">*</span></label>
                        <input type="text" name="c_street1" id="c_street1" class="form-control" required>
                    </div>
                    <div class="col-md mb-3">
                        <label for="c_street2" class="form-label">{{ __('personalParticulars.address_line2') }}<span class="text-danger">*</span></label>
                        <input type="text" name="c_street2" id="c_street2" class="form-control" required>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md mb-3">
                        <label for="c_zipcode" class="form-label">{{ __('personalParticulars.zipcode') }}<span class="text-danger">*</span></label>
                        <input type="text" name="c_zipcode" id="c_zipcode" class="form-control" required>
                    </div>
                    <div class="col-md mb-3">
                        <label for="c_city" class="form-label">{{ __('personalParticulars.city') }}<span class="text-danger">*</span></label>
                        <input type="text" name="c_city" id="c_city" class="form-control" required>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md mb-3">
                        <label for="c_state" class="form-label">{{ __('personalParticulars.state') }}<span class="text-danger">*</span></label>
                        <input type="text" name="c_state" id="c_state" class="form-control" required>
                    </div>
                    <div class="col-md">
                        <label for="c_country" class="form-label">{{ __('personalParticulars.country') }}<span class="text-danger">*</span></label>
                        <select name="c_country_id" id="c_country" class="form-select" required>
                            <option disabled selected hidden value="">{{ __('personalParticulars.country_placeholder') }}</option>
                            @foreach ($allCountries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom mt-4 mb-4"></div>
        {{-- correspondence address --}}
        {{-- permanent address --}}
        <div class="row d-flex flex-row mt-4 mb-4">
            <div class="col-md-4">
                <h4 class="fw-bold">{{ __('personalParticulars.permanent_address') }}</h4>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="sameAbove" onclick="copyAddress()">
                    <label class="form-check-label" for="sameAbove">{{ __('personalParticulars.permanent_address_checkbox') }}</label>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row g-3">
                    <div class="col-md mb-3">
                        <label for="p_street1" class="form-label">{{ __('personalParticulars.address_line1') }}<span class="text-danger">*</span></label>
                        <input type="text" name="p_street1" id="p_street1" class="form-control" required>
                    </div>
                    <div class="col-md mb-3">
                        <label for="p_street2" class="form-label">{{ __('personalParticulars.address_line2') }}<span class="text-danger">*</span></label>
                        <input type="text" name="p_street2" id="p_street2" class="form-control" required>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md mb-3">
                        <label for="p_zipcode" class="form-label">{{ __('personalParticulars.zipcode') }}<span class="text-danger">*</span></label>
                        <input type="text" name="p_zipcode" id="p_zipcode" class="form-control" required>
                    </div>
                    <div class="col-md mb-3">
                        <label for="p_city" class="form-label">{{ __('personalParticulars.city') }}<span class="text-danger">*</span></label>
                        <input type="text" name="p_city" id="p_city" class="form-control" required>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md mb-3">
                        <label for="p_state" class="form-label">{{ __('personalParticulars.state') }}<span class="text-danger">*</span></label>
                        <input type="text" name="p_state" id="p_state" class="form-control" required>
                    </div>
                    <div class="col-md mb-3">
                        <label for="p_country" class="form-label">{{ __('personalParticulars.country') }}<span class="text-danger">*</span></label>
                        <select name="p_country_id" id="p_country" class="form-select" required>
                            <option disabled selected hidden value="">{{ __('personalParticulars.country_placeholder') }}</option>
                            @foreach ($allCountries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom mt-4 mb-4"></div>
        {{-- end permanent address --}}
        {{-- script --}}
        <script>
            function copyAddress(){
                var c_street1 = document.getElementById('c_street1');
                var c_street2 = document.getElementById('c_street2');
                var c_zipcode = document.getElementById('c_zipcode');
                var c_city = document.getElementById('c_city');
                var c_state = document.getElementById('c_state');
                var c_country = document.getElementById('c_country');

                var p_street1 = document.getElementById('p_street1');
                var p_street2 = document.getElementById('p_street2');
                var p_zipcode = document.getElementById('p_zipcode');
                var p_city = document.getElementById('p_city');
                var p_state = document.getElementById('p_state');
                var p_country = document.getElementById('p_country');

                const sameAbove = document.getElementById('sameAbove');
                if(sameAbove.checked){
                    p_street1.value = c_street1.value;
                    p_street2.value = c_street2.value;
                    p_zipcode.value = c_zipcode.value;
                    p_city.value = c_city.value;
                    p_state.value = c_state.value;
                    p_country.value = c_country.value;
                }else if(sameAbove.checked == false){
                    p_street1.value = '';
                    p_street2.value = '';
                    p_zipcode.value = '';
                    p_city.value = '';
                    p_state.value = '';
                    p_country.value = '';
                }
            }
        </script>
        {{-- end script --}} 
        {{-- form submit --}}
        @if ($application_status_id >= 1 || $application_status_id == 0)
            <div class="row">
                <div class="d-flex justify-content-end">
                    <p class="text-secondary"><span class="text-danger">*</span>{{ __('personalParticulars.reminder_msg1') }}</p><br>
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">{{ __('personalParticulars.submit_button') }}</button>
                </div>
            </div>
        @endif
        {{-- end form submit --}}

    </form>
</div>
{{-- end form --}}
@endsection