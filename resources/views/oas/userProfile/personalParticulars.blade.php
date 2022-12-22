@extends('oas.layouts.app')

@section('content')

    {{-- header --}}
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="border-bottom">
                    <h3 class="fw-bold">Personal Particulars</h3>
                    <p class="text-secondary">Next >>> Guardian Particulars</p>
                </div>
            </div>
        </div>
    </div>
    {{-- end header --}}

    {{-- success message --}}
    @if(Session::has('success'))
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    @endif
    {{-- end success message --}}

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
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="en_name" id="en_name" class="form-control" placeholder="English name" required>
                                <label for="en_name">English Name<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="ch_name" id="ch_name" class="form-control" placeholder="Chinese name">
                                <label for="ch_name">Chinese Name</label>
                            </div>
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
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="ic" id="ic" class="form-control" placeholder="ic" required>
                                <label for="ic">Identity card<span class="text-danger">*</span></label>
                            </div>
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
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <select name="race_id" id="race" class="form-select" required>
                                    <option selected disabled>Choose your race</option>
                                    @foreach ($allRaces as $race)
                                        <option value="{{ $race->id }}">{{ $race->name }}</option>
                                    @endforeach
                                </select>
                                <label for="race">Race<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <select name="religion_id" id="religion" class="form-select" required>
                                    <option selected disabled>Choose your religion</option>
                                    @foreach ($allReligions as $religion)
                                        <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                    @endforeach
                                </select>
                                <label for="race">Religion<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <select name="nationality_id" id="nationality" class="form-select" required>
                                    <option selected disabled>Choose your nationality</option>
                                    @foreach ($allNationalities as $nationality)
                                        <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                    @endforeach
                                </select>
                                <label for="race">Nationality<span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom mt-4 mb-4"></div>
            {{-- end race, religion, nationality --}}
            {{-- birth date, age, place of birth --}}
            <div class="row d-flex flex-row mt-4">
                <div class="col-md-4">
                    <h4 class="fw-bold">Birth date, Place of Birth, Age</h4>
                    <p class="text-secondary"></p>
                </div>
                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="date" name="birth_date" id="birth_date" class="form-control" placeholder="Birth date" onchange="ageCalculator()">
                                <label for="birth_date">Birth date<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="age" id="age" value="" class="form-control-plaintext" readonly>
                                <label for="age">Age<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="place_of_birth" id="place_of_birth" class="form-control" placeholder="Place of birth">
                                <label for="place_of_birth">Place of birth<span class="text-danger">*</span></label>
                            </div>
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
                            <label for="gender" class="form-label text-secondary">Gender<span class="text-danger">*</span></label>
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
                            <div class="form-floating mb-3 me-3">
                                <select name="marital_id" id="marital" class="form-select" required>
                                    <option selected disabled>Choose your marital</option>
                                    @foreach ($allMaritals as $marital)
                                        <option value="{{ $marital->id }}">{{ $marital->name }}</option>
                                    @endforeach
                                </select>
                                <label for="race">Marital<span class="text-danger">*</span></label>
                            </div>
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
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required>
                                <label for="email">Email Address<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="tel_h" id="tel_h" class="form-control" placeholder="Tel No. (H)" required>
                                <label for="tel_h">Tel No. (H)<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="tel_hp" id="tel_hp" class="form-control" placeholder="Tel No. (H/P)" required>
                                <label for="tel_hp">Tel No. (H/P)<span class="text-danger">*</span></label>
                            </div>
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
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="c_street1" id="c_street1" class="form-control" placeholder="Address line 1" required>
                                <label for="c_street1">Address line 1<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="c_street2" id="c_street2" class="form-control" placeholder="Address line 2" required>
                                <label for="c_street2">Address line 2<span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="c_zipcode" id="c_zipcode" class="form-control" placeholder="Zipcode" required>
                                <label for="c_zipcode">Zipcode<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="c_city" id="c_city" class="form-control" placeholder="City" required>
                                <label for="c_city">City<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="c_state" id="c_state" class="form-control" placeholder="State" required>
                                <label for="c_state">State<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <select name="c_country" id="c_country" class="form-select" required>
                                    <option selected disabled>Choose your country</option>
                                    @foreach ($allCountries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                <label for="c_country">Country<span class="text-danger">*</span></label>
                            </div>
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
                    <p class="text-secondary"></p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="sameAbove" onclick="copyAddress()">
                        <label class="form-check-label" for="sameAbove">
                          Same with correspondence address
                        </label>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="p_street1" id="p_street1" class="form-control" placeholder="Address line 1" required>
                                <label for="p_street1">Address line 1<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="p_street2" id="p_street2" class="form-control" placeholder="Address line 2" required>
                                <label for="p_street2">Address line 2<span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="p_zipcode" id="p_zipcode" class="form-control" placeholder="Zipcode" required>
                                <label for="p_zipcode">Zipcode<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="p_city" id="p_city" class="form-control" placeholder="City" required>
                                <label for="p_city">City<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="p_state" id="p_state" class="form-control" placeholder="State" required>
                                <label for="p_state">State<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <select name="p_country" id="p_country" class="form-select" required>
                                    <option selected disabled>Choose your country</option>
                                    @foreach ($allCountries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                <label for="p_country">Country<span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom mt-4 mb-4"></div>
            {{-- permanent address --}}

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    {{-- end form --}}


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