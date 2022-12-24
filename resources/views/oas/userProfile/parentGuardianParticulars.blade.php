@extends('oas.layouts.app')

@section('content')
    
    {{-- header --}}
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="border-bottom">
                    <h3 class="fw-bold">Parent / Guardian Particulars</h3>
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                          <li class="breadcrumb-item active fw-bold" aria-current="page">Parent / Guardian Particulars</li>
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
                    <p>You have successfully submitted your parent / guardian particulars to us. You will also need to fill in the details of your emergency contact and submit a personal photo to apply for the programme.</p>
                    <hr>
                    <p class="mb-0">If you want to go ahead and fill in the <span class="fw-bold">emergency contact</span> please click <a href="{{ route('emergencyContact.home') }}" class="alert-link">here</a> </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    @endif
    {{-- end success message --}}

    {{-- form --}}
    <div class="container">
        <form action="{{ route('parentGuardianParticulars.create') }}" method="post" enctype="multipart/form-data">
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
                            <label for="en_name" class="form-label">English Name<span class="text-danger">*</span></label>
                            <input type="text" name="en_name" id="en_name" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-md mb-3">
                            <label for="ch_name" class="form-label">Chinese Name</label>
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
                    <h4 class="fw-bold">Identity card / Passport</h4>
                    <p class="text-secondary">For Malaysian, please specify with dashed line! <br> Example: 800808-01-0088</p>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md mb-3">
                            <label for="ic" class="form-label">Identity card / Passport<span class="text-danger">*</span></label>
                            <input type="text" name="ic" id="ic" class="form-control" placeholder="" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom mt-4 mb-4"></div>
            {{-- end ic --}}
            {{-- relationship, nationality --}}
            <div class="row d-flex flex-row mt-4">
                <div class="col-md-4">
                    <h4 class="fw-bold">Relationship & Nationality</h4>
                    <p class="text-secondary"></p>
                </div>
                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-md mb-3">
                            <label for="relationship" class="form-label">Relationship<span class="text-danger">*</span></label>
                            <select name="guardian_relationship_id" id="relationship" class="form-select" required>
                                <option selected disabled>Choose relationship</option>
                                @foreach ($allRelationships as $relationship)
                                    <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
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
            {{-- end relationship, nationality --}}
            {{-- occupation, family income  --}}
            <div class="row d-flex flex-row mt-4">
                <div class="col-md-4">
                    <h4 class="fw-bold">Occupation & Family income</h4>
                    <p class="text-secondary"></p>
                </div>
                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-md mb-3">
                            <label for="occupation" class="form-label">Occupation<span class="text-danger">*</span></label>
                            <input type="text" name="occupation" id="occupation" class="form-control" placeholder="Occupation" required>
                        </div>
                        <div class="col-md mb-3">
                            <label for="income" class="form-label">Income range<span class="text-danger">*</span></label>
                            <select name="income_id" id="income" class="form-select" required>
                                <option selected disabled>Choose your family income range</option>
                                @foreach ($allIncomes as $income)
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
                    <h4 class="fw-bold">Contact</h4>
                    <p class="text-secondary"></p>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md mb-3">
                            <label for="email" class="form-label">Email address<span class="text-danger">*</span></label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="abc@email.com" required>
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
                            <input type="text" name="p_street1" id="p_street1" class="form-control" placeholder="Address line 1" required>
                        </div>
                        <div class="col-md mb-3">
                            <label for="p_street2" class="form-label">Address line 2<span class="text-danger">*</span></label>
                            <input type="text" name="p_street2" id="p_street2" class="form-control" placeholder="Address line 2" required>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md mb-3">
                            <label for="p_zipcode" class="form-label">Zipcode<span class="text-danger">*</span></label>
                            <input type="text" name="p_zipcode" id="p_zipcode" class="form-control" placeholder="Zipcode" required>
                        </div>
                        <div class="col-md mb-3">
                            <label for="p_city" class="form-label">City<span class="text-danger">*</span></label>
                            <input type="text" name="p_city" id="p_city" class="form-control" placeholder="City" required>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md mb-3">
                            <label for="p_state" class="form-label">State<span class="text-danger">*</span></label>
                            <input type="text" name="p_state" id="p_state" class="form-control" placeholder="State" required>
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
    {{-- end form --}}

    {{-- dselect --}}
    <script>
        const config = {
            search: true, // Toggle search feature. Default: false
        }
        dselect(document.querySelector('#relationship'), config)
        dselect(document.querySelector('#income'), config)
        dselect(document.querySelector('#nationality'), config)
        dselect(document.querySelector('#p_country'), config)
    </script>

@endsection