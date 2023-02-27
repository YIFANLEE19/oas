@extends('oas.layouts.app')

@section('content')

{{-- header --}}
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="border-bottom">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('button.home') }}</a></li>
                      <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('userProfile.title1') }}</li>
                    </ol>
                </nav>
                <h1 class="fw-bold">{{ __('userProfile.title1') }}</h1>
                <p><span class="fw-bold">{{ __('userProfile.step1') }}</span></p>
                <div class="progress mb-2" style="height: 10px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary opacity-25" role="progressbar" style="width: 75%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end header --}}

{{-- update success --}}
@if(Session::has('success') && Session::get('success') == 'success')
<div class="container mt-2">
    <div class="row">
        <div class="col-xl-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ __('successMessage.personal_particulars_update_success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
@endif
{{-- end update success --}}

{{-- data --}}
<div class="container">

    {{-- name --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">{{ __('inputFields.name') }}</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.en_name') }}</p>
                    <h5 class="text-capitalize">{{ $user_detail->en_name }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.ch_name') }}</p>
                    @if ($user_detail->ch_name == null)
                        <h5>-</h5>
                    @else
                        <h5>{{ $user_detail->ch_name }}</h5>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end name --}}

    {{-- ic --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">{{ __('inputFields.ic') }}</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.ic') }}</p>
                    <h5 id="read_ic">{{ $user_detail->ic }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end ic --}}

    {{-- race, religion, nationality --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">{{ __('inputFields.race') }}, {{ __('inputFields.religion') }} & {{ __('inputFields.nationality') }}</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.race') }}</p>
                    <h5>{{ $applicant_profile->race['name'] }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.religion') }}</p>
                    <h5>{{ $applicant_profile->religion['name'] }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.nationality') }}</p>
                    <h5>{{ $applicant_profile->nationality['name'] }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end race, religion, nationality --}}

    {{-- birth date, age, place of birth --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">{{ __('inputFields.bd') }}, {{ __('inputFields.age') }} & {{ __('inputFields.pob') }}</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.bd') }}(Y-M-D)</p>
                    <h5>{{ $applicant_profile->birth_date }}</h5>
                    <input type="hidden" id="read_birth_date" value="{{ $applicant_profile->birth_date }}">
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.age') }}</p>
                    <h5 id="read_age"></h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.pob') }}</p>
                    <h5>{{ $applicant_profile->place_of_birth }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end birth date, age, place of birth --}}

    {{-- script --}}
    <script>
        var readInput = document.getElementById('read_birth_date').value;
        var date_of_birth = new Date(readInput);
        var month_diff = Date.now() - date_of_birth.getTime();
        var age_df = new Date(month_diff);
        var year = age_df.getUTCFullYear();
        var age = Math.abs(year - 1970);
        document.getElementById("read_age").innerHTML = age;
    </script>
    {{-- end script --}}

    {{-- gender marital --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">{{ __('inputFields.gender') }} & {{ __('inputFields.ms') }}</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.gender') }}</p>
                    <h5>{{ $applicant_profile->gender['name'] }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.ms') }}</p>
                    <h5>{{ $applicant_profile->marital['name'] }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end gender marital --}}

    {{-- contact --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">{{ __('inputFields.contact') }}</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.email') }}</p>
                    <h5>{{ $user_detail->email }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.tel_hp') }}</p>
                    <h5>{{ $user_detail->tel_hp }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.tel_h') }}</p>
                    <h5>{{ $user_detail->tel_h }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end contact --}}

    {{-- correspondence address --}}
    <div class="row d-flex flex-row mt-4 mb-4">
        <div class="col-md-4">
            <h4 class="fw-bold">{{ __('inputFields.c_address') }}</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.address') }}</p>
                    <h5>{{ $c_address->street1 }},{{ $c_address->street2 }},{{ $c_address->zipcode }},{{ $c_address->city }},{{ $c_address->state }},{{ $c_address->country['name'] }}.</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end correspondence address --}}

    {{-- permanent address --}}
    <div class="row d-flex flex-row mt-4 mb-4">
        <div class="col-md-4">
            <h4 class="fw-bold">{{ __('inputFields.p_address') }}</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.address') }}</p>
                    <h5>{{ $p_address->street1 }},{{ $p_address->street2 }},{{ $p_address->zipcode }},{{ $p_address->city }},{{ $p_address->state }},{{ $p_address->country['name'] }}.</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end permanent address --}}

    {{-- edit button --}}
    <div class="row ">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">{{ __('button.edit_personal_particulars') }}</button>
        </div>
    </div>
    {{-- end edit button --}}
</div>
{{-- end data --}}

<!-- modal -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <form action="{{ route('personalParticulars.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="editModalLabel">{{ __('button.edit_personal_particulars') }}</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <input type="hidden" name="user_detail_id" value="{{ $user_detail->id }}">
                        <input type="hidden" name="c_address_id" value="{{ $c_address->id }}">
                        <input type="hidden" name="p_address_id" value="{{ $p_address->id }}">
                        <input type="hidden" name="applicant_profile_id" value="{{ $applicant_profile->id }}">
                        {{-- name --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.name') }}</h4>
                                <p class="text-secondary">{{ __('inputFields.hint_for_name') }}</p>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-2">
                                    <div class="col-md mb-3">
                                        <label for="en_name" class="form-label">{{ __('inputFields.en_name') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="en_name" id="en_name" class="form-control text-capitalize" value="{{ $user_detail->en_name }}" onkeyup="if (/[^|A-Za-z0-9\s/.]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/.]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="ch_name" class="form-label">{{ __('inputFields.ch_name') }}</label>
                                        <input type="text" name="ch_name" id="ch_name" class="form-control" value="{{ $user_detail->ch_name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end name --}}

                        {{-- ic --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.ic') }}</h4>
                                <p class="text-secondary">{{ __('inputFields.hint_for_ic') }}</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="changeInput" onclick="changeInputMethod()">
                                    <label class="form-check-label mb-2" for="changeInput">
                                        {{ __('inputFields.ic_checkbox') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
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
                                    <label for="ic" class="form-label">{{ __('inputFields.without_ic') }}<span class="text-danger">*</span></label>
                                    <div class="col-md mb-3">
                                        <input type="text" name="passport" id="passport" class="form-control" placeholder="" onkeyup="if (/[^|A-Za-z0-9-]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9-]+/g,'')">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end ic --}}

                        {{-- script --}}
                        <script>
                                
                            let text = document.getElementById('read_ic').innerHTML;
                            const myArray = text.split("-");
                            const changeInput = document.getElementById('changeInput');
                            const ic_section = document.getElementById('ic_section');
                            const passport_section = document.getElementById('passport_section');
                            const ic1 = document.getElementById('ic1');
                            const ic2 = document.getElementById('ic2');
                            const ic3 = document.getElementById('ic3');
                            const passport = document.getElementById('passport');
                            const nationality = document.getElementById('nationality');

                            if(myArray.length != 3){
                                document.getElementById("passport").value = myArray[0];
                                changeInput.checked = true;
                                ic_section.style.display = 'none';
                                passport_section.style.display = 'block';
                            }else{
                                document.getElementById("ic1").value = myArray[0]; 
                                document.getElementById("ic2").value = myArray[1]; 
                                document.getElementById("ic3").value = myArray[2]; 

                            }

                            function changeInputMethod(){
                                if(changeInput.checked){
                                    ic_section.style.display = 'none';
                                    passport_section.style.display = 'block';
                                    passport.setAttribute('required','');
                                    ic1.removeAttribute('required');
                                    ic2.removeAttribute('required');
                                    ic3.removeAttribute('required');
                                    ic1.value = '';
                                    ic2.value = '';
                                    ic3.value = '';
                                    nationality.value = 161;
                                }else{
                                    ic_section.style.removeProperty('display');
                                    passport_section.style.display = 'none';
                                    passport.removeAttribute('required');
                                    ic1.setAttribute('required','');
                                    ic2.setAttribute('required','');
                                    ic3.setAttribute('required','');
                                    passport.value = '';
                                    nationality.value = 131;
                                }
                            }
                        </script>
                        {{-- end script --}}

                        {{-- race, religion, nationality --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.race') }}, {{ __('inputFields.religion') }} & {{ __('inputFields.nationality') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="race" class="form-label">{{ __('inputFields.race') }}<span class="text-danger">*</span></label>
                                        <select name="race_id" id="race" class="form-select" required>
                                            <option value="{{ $applicant_profile->race_id }}" selected>{{ $applicant_profile->race['name'] }}</option>
                                            @foreach ($data['races'] as $race)
                                                <option value="{{ $race->id }}">{{ $race->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="religion" class="form-label">{{ __('inputFields.religion') }}<span class="text-danger">*</span></label>
                                        <select name="religion_id" id="religion" class="form-select" required>
                                            <option value="{{ $applicant_profile->religion_id }}" selected>{{ $applicant_profile->religion['name'] }}</option>
                                            @foreach ($data['religions'] as $religion)
                                                <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="nationality" class="form-label">{{ __('inputFields.nationality') }}<span class="text-danger">*</span></label>
                                        <select name="nationality_id" id="nationality" class="form-select" required>
                                            <option value="131" selected>Malaysia</option>
                                            <option value="161" selected>Non-Malaysian</option>
                                        </select>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end race, religion, nationality --}}

                        {{-- birth date, age, place of birth --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.bd') }}, {{ __('inputFields.age') }} & {{ __('inputFields.pob') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="birth_date" class="form-label">{{ __('inputFields.bd') }}<span class="text-danger">*</span></label>
                                        <input type="date" name="birth_date" id="birth_date" class="form-control" value="{{ $applicant_profile->birth_date }}" onchange="ageCalculator()" max="<?= date('Y-m-d'); ?>">
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="age" class="form-label">{{ __('inputFields.age') }}</label>
                                        <input type="text" name="age" id="age" value="" class="form-control" placeholder="" disabled>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="place_of_birth" class="form-label">{{ __('inputFields.pob') }}<span class="text-danger">*</span></label>
                                        <select name="place_of_birth" id="place_of_birth" class="form-select" required>
                                            <option value="{{ $applicant_profile->place_of_birth }}" selected>{{ $applicant_profile->place_of_birth }}</option>
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
                        {{-- end birth date, age, place of birth  --}}

                        {{-- script --}}
                        <script>
                            ageCalculator()
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

                        {{-- gender, marital --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.gender') }} & {{ __('inputFields.ms') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-2">
                                    <div class="col-md">
                                        <label for="gender" class="form-label">{{ __('inputFields.gender') }}<span class="text-danger">*</span></label>
                                        <div class="d-flex flex-row mb-3 me-3">
                                            @foreach ($data['genders'] as $gender)
                                                @if ($gender->id == 1)
                                                    <div class="form-check-label me-4" for="gender">
                                                        <input type="radio" name="gender_id" id="gender1" class="form-check-input" value="{{ $gender->id }}" {{ $applicant_profile->gender_id == '1' ? 'checked' : ''}}>
                                                        <span class="ms-4">{{ $gender->name }}</span>
                                                    </div>
                                                @else
                                                    <div class="form-check-label me-4" for="gender">
                                                        <input type="radio" name="gender_id" id="gender1" class="form-check-input" value="{{ $gender->id }}" {{ $applicant_profile->gender_id == '2' ? 'checked' : ''}}>
                                                        <span class="ms-4">{{ $gender->name }}</span>
                                                    </div> 
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <label for="marital" class="form-label">{{ __('inputFields.ms') }}<span class="text-danger">*</span></label>
                                        <select name="marital_id" id="marital" class="form-select" required>
                                            <option value="{{ $applicant_profile->marital_id }}" selected hidden>{{ $applicant_profile->marital['name'] }}</option>
                                            @foreach ($data['maritals'] as $marital)
                                                <option value="{{ $marital->id }}">{{ $marital->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end gender marital --}}

                        {{-- contact --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.contact') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="email" class="form-label">{{ __('inputFields.email') }}<span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ $user_detail->email }}" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="tel_hp" class="form-label">{{ __('inputFields.tel_hp') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="tel_hp" id="tel_hp" class="form-control" value="{{ $user_detail->tel_hp }}" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="tel_h" class="form-label">{{ __('inputFields.tel_h') }}</label>
                                        <input type="text" name="tel_h" id="tel_h" class="form-control" value="{{ $user_detail->tel_h }}" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end contact --}}

                        {{-- correspondence address --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.c_address') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="c_street1" class="form-label">{{ __('inputFields.address1') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="c_street1" id="c_street1" class="form-control" value="{{ $c_address->street1 }}" onkeyup="if (/[^|A-Za-z0-9/.\s,]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9/.\s,]+/g,'')" placeholder="{{ __('inputFields.address1_placeholder') }}" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="c_street2" class="form-label">{{ __('inputFields.address2') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="c_street2" id="c_street2" class="form-control" value="{{ $c_address->street2 }}" onkeyup="if (/[^|A-Za-z0-9/.\s,]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9/.\s,]+/g,'')" placeholder="{{ __('inputFields.address2_placeholder') }}" required>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="c_zipcode" class="form-label">{{ __('inputFields.zipcode') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="c_zipcode" id="c_zipcode" class="form-control" value="{{ $c_address->zipcode }}" minlength="5" maxlength="5" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="c_city" class="form-label">{{ __('inputFields.city') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="c_city" id="c_city" class="form-control" value="{{ $c_address->city }}" onkeyup="if (/[^|A-Za-z/.\s]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z/.\s]+/g,'')" required>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="c_state" class="form-label">{{ __('inputFields.state') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="c_state" id="c_state" class="form-control" value="{{ $c_address->state }}" onkeyup="if (/[^|A-Za-z/.\s]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z/.\s]+/g,'')" required>
                                    </div>
                                    <div class="col-md">
                                        <label for="c_country" class="form-label">{{ __('inputFields.country') }}<span class="text-danger">*</span></label>
                                        <select name="c_country_id" id="c_country" class="form-select" required>
                                            <option value="{{ $c_address->country_id }}" selected hidden>{{ $c_address->country['name'] }}</option>
                                            @foreach ($data['countries'] as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end correspondence address --}}

                        {{-- permanent address --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.p_address') }}</h4>
                                <div class="form-check mb-2 mt-2">
                                    <input class="form-check-input" type="checkbox" id="sameAbove" onclick="copyAddress()">
                                    <label class="form-check-label" for="sameAbove">
                                        {{ __('inputFields.p_address_checkbox') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="p_street1" class="form-label">{{ __('inputFields.address1') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_street1" id="p_street1" class="form-control" value="{{ $p_address->street1 }}" onkeyup="if (/[^|A-Za-z0-9/.\s,]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9/.\s,]+/g,'')" placeholder="{{ __('inputFields.address1_placeholder') }}" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="p_street2" class="form-label">{{ __('inputFields.address2') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_street2" id="p_street2" class="form-control" value="{{ $p_address->street2 }}" onkeyup="if (/[^|A-Za-z0-9/.\s,]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9/.\s,]+/g,'')" placeholder="{{ __('inputFields.address2_placeholder') }}" required>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="p_zipcode" class="form-label">{{ __('inputFields.zipcode') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_zipcode" id="p_zipcode" class="form-control" value="{{ $p_address->zipcode }}" minlength="5" maxlength="5" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="p_city" class="form-label">{{ __('inputFields.city') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_city" id="p_city" class="form-control" value="{{ $p_address->city }}" onkeyup="if (/[^|A-Za-z/.\s]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z/.\s]+/g,'')" required>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="p_state" class="form-label">{{ __('inputFields.state') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_state" id="p_state" class="form-control" value="{{ $p_address->state }}" onkeyup="if (/[^|A-Za-z/.\s]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z/.\s]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="p_country" class="form-label">{{ __('inputFields.country') }}<span class="text-danger">*</span></label>
                                        <select name="p_country_id" id="p_country" class="form-select" required>
                                            <option value="{{ $p_address->country_id }}" selected hidden>{{ $p_address->country['name'] }}</option>
                                            @foreach ($data['countries'] as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end permanent address --}}

                        {{-- script --}}
                        <script>
                            // sameabove
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('button.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('button.save_changes') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- end modal --}}

@endsection