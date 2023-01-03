@extends('oas.layouts.app')

@section('content')
    {{-- modal --}}
    <style>
        .modal-backdrop {
            background-color: rgb(50, 47, 47);
        }
    </style>

    @if(Session::has('application_status_id') && Session::get('application_status_id') == 1)
        <script>
            $(function(){
                $('#completeModal').modal('show');
            });
        </script>        
    @endif

    @if ($application_status_id == 1 || $application_status_id >= 1)
        <script>
            $(function(){
                $('#completeModal').modal('show');
            });
        </script>   
    @endif

    <div class="modal fade" id="completeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="completeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="completeModalLabel">Thank you!</h1>
                </div>
                <div class="modal-body">
                    <p>We have received your <span class="fw-bold">personal particulars</span>. You will also need to fill in the details of your parent / guardian particulars, emergency contact and submit a personal photo to apply for the programme.</p>
                    <p>If you want to go ahead and fill in the <span class="fw-bold">parent / guardian particulars</span>, please click <span class="fw-bold">Continue</span>.</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">Back to home page</a>
                    <a href="{{ route('parentGuardianParticulars.home') }}" type="button" class="btn btn-primary">Continue</a>
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
                    <h1 class="fw-bold">Personal Particulars</h1>
                    <p class="text-secondary"></p>
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                          <li class="breadcrumb-item active fw-bold" aria-current="page">Personal particulars</li>
                        </ol>
                    </nav>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-label="Default striped example" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Step 1: Personal Particulars</div>
                        <span class="ms-4">Next : Parent / guardian particulars</span>
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
                    <h4 class="fw-bold">Name</h4>
                    <p class="text-secondary">Your name must same with your Identity Card.</p>
                </div>
                <div class="col-md-8">
                    <div class="row g-2">
                        <div class="col-md mb-3">
                            <label for="en_name" class="form-label">English name<span class="text-danger">*</span></label>
                            <input type="text" name="en_name" id="en_name" class="form-control text-capitalize" placeholder="" required>
                        </div>
                        <div class="col-md mb-3">
                            <label for="ch_name" class="form-label">Chinese name</label>
                            <input type="text" name="ch_name" id="ch_name" class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom mt-4 mb-4"></div>
            {{-- end name --}}
            {{-- ic --}}
            <div class="row d-flex flex-row mt-4">
                <div class="col-md-4">
                    <h4 class="fw-bold">Identity card</h4>
                    <p class="text-secondary">For Malaysian, please specify with dashed line! <br> Example: 800808-01-0088</p>
                    <p class="text-secondary">If you are local student but don't have identity card, please click the checkbox below.</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="changeInput" onclick="changeInputMethod()">
                        <label class="form-check-label" for="changeInput">
                            Don't have identity card
                        </label>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row" id="ic_section">
                        <label for="ic" class="form-label">Identity card<span class="text-danger">*</span></label>
                        <div class="col-md d-flex flex-row align-items-center mb-3">
                            <input type="text" name="ic1" id="ic1" class="form-control" placeholder="" maxlength="6" required>
                            <span class="ms-4">-</span>
                        </div>
                        <div class="col-md d-flex flex-row align-items-center mb-3">
                            <input type="text" name="ic2" id="ic2" class="form-control" placeholder="" maxlength="2" required>
                            <span class="ms-4">-</span>
                        </div>
                        <div class="col-md mb-3">
                            <input type="text" name="ic3" id="ic3" class="form-control" placeholder="" maxlength="4" required>
                        </div>
                    </div>
                    <div class="row" id="passport_section" style="display: none;">
                        <label for="ic" class="form-label">Other certificate<span class="text-danger">*</span></label>
                        <div class="col-md mb-3">
                            <input type="text" name="passport" id="passport" class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom mt-4 mb-4"></div>
            {{-- end ic --}}
            {{-- race, religion, nationality --}}
            <div class="row d-flex flex-row mt-4">
                <div class="col-md-4">
                    <h4 class="fw-bold">Race, Religion, Nationality</h4>
                    <p class="text-secondary"></p>
                </div>
                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-md mb-3">
                            <label for="race" class="form-label">Race<span class="text-danger">*</span></label>
                            <select name="race_id" id="race" class="form-select" required>
                                <option selected disabled>Choose your race</option>
                                @foreach ($allRaces as $race)
                                    <option value="{{ $race->id }}">{{ $race->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md mb-3">
                            <label for="religion" class="form-label">Religion<span class="text-danger">*</span></label>
                            <select name="religion_id" id="religion" class="form-select" required>
                                <option selected disabled>Choose your religion</option>
                                @foreach ($allReligions as $religion)
                                    <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md mb-3">
                            <label for="nationality" class="form-label">Nationality<span class="text-danger">*</span></label>
                            <select name="nationality_id" id="nationality" class="form-select" required>
                                {{-- <option selected disabled>Choose your nationality</option>
                                @foreach ($allNationalities as $nationality)
                                    <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                @endforeach --}}
                                <option value="131" selected>Malaysia</option>
                                <option value="161">Non-Malaysian</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom mt-4 mb-4"></div>
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
            {{-- end race, religion, nationality --}}
            {{-- birth date, age, place of birth --}}
            <div class="row d-flex flex-row mt-4">
                <div class="col-md-4">
                    <h4 class="fw-bold">Birth date, Age, Place of Birth</h4>
                    <p class="text-secondary"></p>
                </div>
                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-md mb-3">
                            <label for="birth_date" class="form-label">Birth date<span class="text-danger">*</span></label>
                            <input type="date" name="birth_date" id="birth_date" class="form-control" placeholder="" onchange="ageCalculator()">
                        </div>
                        <div class="col-md mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="text" name="age" id="age" value="" class="form-control" placeholder="" disabled>
                        </div>
                        <div class="col-md mb-3">
                            <label for="place_of_birth" class="form-label">Place of birth<span class="text-danger">*</span></label>
                            <select name="place_of_birth" id="place_of_birth" class="form-select" required>
                                <option selected disabled>Choose place of birth</option>
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
            {{-- gender marital --}}
            <div class="row d-flex flex-row mt-4">
                <div class="col-md-4">
                    <h4 class="fw-bold">Gender & Marital Status</h4>
                    <p class="text-secondary"></p>
                </div>
                <div class="col-md-8">
                    <div class="row g-2">
                        <div class="col-md">
                            <label for="gender" class="form-label">Gender<span class="text-danger">*</span></label>
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
                            <label for="marital" class="form-label">Marital<span class="text-danger">*</span></label>
                            <select name="marital_id" id="marital" class="form-select" required>
                                <option selected disabled>Choose your marital</option>
                                @foreach ($allMaritals as $marital)
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
            <div class="row d-flex flex-row mt-4">
                <div class="col-md-4">
                    <h4 class="fw-bold">Contact</h4>
                    <p class="text-secondary"></p>
                </div>
                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-md mb-3">
                            <label for="email" class="form-label">Email address<span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="abc@email.com" required>
                        </div>
                        <div class="col-md mb-3">
                            <label for="tel_hp" class="form-label">Tel no. (H/P)<span class="text-danger">*</span></label>
                            <input type="text" name="tel_hp" id="tel_hp" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-md mb-3">
                                <label for="tel_h" class="form-label">Tel no. (H)</label>
                                <input type="text" name="tel_h" id="tel_h" class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom mt-4 mb-4"></div>
            {{-- end contact --}}
            {{-- correspondence address --}}
            <div class="row d-flex flex-row mt-4 mb-4">
                <div class="col-md-4">
                    <h4 class="fw-bold">Correspondence Address</h4>
                    <p class="text-secondary"></p>
                </div>
                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-md mb-3">
                            <label for="c_street1" class="form-label">Address line 1<span class="text-danger">*</span></label>
                            <input type="text" name="c_street1" id="c_street1" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-md mb-3">
                            <label for="c_street2" class="form-label">Address line 2<span class="text-danger">*</span></label>
                            <input type="text" name="c_street2" id="c_street2" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md mb-3">
                            <label for="c_zipcode" class="form-label">Zipcode<span class="text-danger">*</span></label>
                            <input type="text" name="c_zipcode" id="c_zipcode" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-md mb-3">
                            <label for="c_city" class="form-label">City<span class="text-danger">*</span></label>
                            <input type="text" name="c_city" id="c_city" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md mb-3">
                            <label for="c_state" class="form-label">State<span class="text-danger">*</span></label>
                            <input type="text" name="c_state" id="c_state" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-md">
                            <label for="c_country" class="form-label">Country<span class="text-danger">*</span></label>
                            <select name="c_country_id" id="c_country" class="form-select" required>
                                <option selected disabled>Choose your country</option>
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
                    <h4 class="fw-bold">Permanent Address</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="sameAbove" onclick="copyAddress()">
                        <label class="form-check-label" for="sameAbove">
                          Same with correspondence address
                        </label>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-md mb-3">
                            <label for="p_street1" class="form-label">Address line 1<span class="text-danger">*</span></label>
                            <input type="text" name="p_street1" id="p_street1" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-md mb-3">
                            <label for="p_street2" class="form-label">Address line 2<span class="text-danger">*</span></label>
                            <input type="text" name="p_street2" id="p_street2" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md mb-3">
                            <label for="p_zipcode" class="form-label">Zipcode<span class="text-danger">*</span></label>
                            <input type="text" name="p_zipcode" id="p_zipcode" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-md mb-3">
                            <label for="p_city" class="form-label">City<span class="text-danger">*</span></label>
                            <input type="text" name="p_city" id="p_city" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md mb-3">
                            <label for="p_state" class="form-label">State<span class="text-danger">*</span></label>
                            <input type="text" name="p_state" id="p_state" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-md mb-3">
                            <label for="p_country" class="form-label">Country<span class="text-danger">*</span></label>
                            <select name="p_country_id" id="p_country" class="form-select" required>
                                <option selected disabled>Choose your country</option>
                                @foreach ($allCountries as $country)
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
            @if ($application_status_id >= 1 || $application_status_id == 0)
                <div class="row">
                    <div class="d-flex justify-content-end">
                        <p class="text-secondary"><span class="text-danger">*</span>Please reconfirm the information before submitting</p><br>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            @endif
            {{-- end form submit --}}
        </form>
    </div>

    <script>
    // age
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

@endsection