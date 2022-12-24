@extends('oas.layouts.app')

@section('content')

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
                          <li class="breadcrumb-item active fw-bold" aria-current="page">Personal Particulars</li>
                        </ol>
                    </nav>
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
                    <h4 class="alert-heading">{{ Session::get('success') }} </h4>
                    <p>You have successfully submitted your personal particulars to us. You will also need to fill in the details of your parent / guardian particulars, emergency contact and submit a personal photo to apply for the programme.</p>
                    <hr>
                    <p class="mb-0">If you want to go ahead and fill in the <span class="fw-bold">parent / guardian particulars</span> please click <a href="{{ route('parentGuardianParticulars.home') }}" class="alert-link">here</a> </p>
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
                        <div class="col-md mb-3">
                            <label for="en_name" class="form-label">English name<span class="text-danger">*</span></label>
                            <input type="text" name="en_name" id="en_name" class="form-control" placeholder="" required>
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
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md mb-3">
                            <label for="ic" class="form-label">Identity card<span class="text-danger">*</span></label>
                            <input type="text" name="ic" id="ic" class="form-control" placeholder="" required>
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
                                <option selected disabled>Choose your nationality</option>
                                @foreach ($allNationalities as $nationality)
                                    <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                @endforeach
                            </select>
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
                        <div class="col-md mb-3">
                            <label for="birth_date" class="form-label">Birth date<span class="text-danger">*</span></label>
                            <input type="date" name="birth_date" id="birth_date" class="form-control" placeholder="" onchange="ageCalculator()">
                        </div>
                        <div class="col-md mb-3">
                            <label for="age" class="form-label">Age<span class="text-danger">*</span></label>
                            <input type="text" name="age" id="age" value="" class="form-control" placeholder="" disabled>
                        </div>
                        <div class="col-md mb-3">
                            <label for="place_of_birth" class="form-label">Place of birth<span class="text-danger">*</span></label>
                            <input type="text" name="place_of_birth" id="place_of_birth" class="form-control" placeholder="">
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
                            <label for="email" class="form-label">Email Address<span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="abc@email.com" required>
                        </div>
                        <div class="col-md mb-3">
                                <label for="tel_h" class="form-label">Tel No. (H)<span class="text-danger">*</span></label>
                                <input type="text" name="tel_h" id="tel_h" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-md mb-3">
                            <label for="tel_hp" class="form-label">Tel No. (H/P)<span class="text-danger">*</span></label>
                            <input type="text" name="tel_hp" id="tel_hp" class="form-control" placeholder="" required>
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
                                <option value="" selected disabled>Choose your country</option>
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
                    <p class="text-secondary"></p>
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
                                <option value="" selected disabled>Choose your country</option>
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
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="d-flex flex-column">
                        <p class="text-secondary"><span class="text-danger">*</span>Please reconfirm the information before submitting</p>
                        <button type="submit" class="btn btn-primary col-md-3">Submit</button>
                    </div>
                </div>
            </div>
            {{-- end form submit --}}
        </form>
    </div>
    
    {{-- dselect --}}
    <script>
        const config = {
            search: true, // Toggle search feature. Default: false
        }
        dselect(document.querySelector('#race'), config)
        dselect(document.querySelector('#religion'), config)
        dselect(document.querySelector('#nationality'), config)
        dselect(document.querySelector('#marital'), config)
        dselect(document.querySelector('#c_country'), config)
        dselect(document.querySelector('#p_country'), config)
    </script>

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
</script>

@endsection