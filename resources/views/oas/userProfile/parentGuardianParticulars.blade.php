@extends('oas.layouts.app')

@section('content')
    
    {{-- modal --}}
    <style>
        .modal-backdrop {
            background-color: rgb(50, 47, 47);
        }
    </style>

    @if(Session::has('status_code') && Session::get('status_code') == 2)
        <script>
            $(function(){
                $('#statusCode2Modal').modal('show');
            });
        </script>        
    @endif

    @if ($status_code == 0)
        <script>
            $(function(){
                $('#statusCode0Modal').modal('show');
            });
        </script>   
    @elseif($status_code == 1)
        <script>
            $(function(){
                $('#statusCode1Modal').modal('show');
            });
        </script>  
    @elseif($status_code == 2)
        <script>
            $(function(){
                $('#statusCode2Modal').modal('show');
            });
        </script>  
    @endif
    {{-- status 0 = personal particulars X --}}
    <div class="modal fade" id="statusCode0Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode0ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="statusCode0ModalLabel">Oops!</h1>
                </div>
                <div class="modal-body">
                    <p>Dear user, you haven't filled in the <span class="fw-bold">personal particulars</span>, so you can't go to the next step until you fill them in.</p>
                    <p>If you want to go ahead and fill in the <span class="fw-bold">personal particulars</span> please click <span class="fw-bold">Continue</span></p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-secondary">Back to home page</a>
                    <a href="{{ route('personalParticulars.home') }}" type="button" class="btn btn-primary">Continue</a>
                </div>
            </div>
        </div>
    </div>
    {{-- status 2 = personal particulars / AND parent guardian particulars / --}}
    <div class="modal fade" id="statusCode2Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode2ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="statusCode2ModalLabel">Thank you!</h1>
                </div>
                <div class="modal-body">
                    <p>We have received your <span class="fw-bold">parent / guardian particulars</span>. You will also need to fill in the details of your emergency contact and submit a personal photo to apply for the programme.</p>
                    <p>If you want to go ahead and fill in the <span class="fw-bold">emergency contact</span> please click <span class="fw-bold">Continue</span></p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">Back to home page</a>
                    <a href="{{ route('emergencyContact.home') }}" type="button" class="btn btn-primary">Continue</a>
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
                    <h1 class="fw-bold">Parent / Guardian Particulars</h1>
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                          <li class="breadcrumb-item active fw-bold" aria-current="page">Parent / guardian particulars</li>
                        </ol>
                    </nav>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-label="Default striped example" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Step 2: Parent / Guardian Particulars</div>
                        <span class="ms-4">Next : Emergency contact</span>
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
                    <h4 class="fw-bold">Parent / guardian name</h4>
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
                    <h4 class="fw-bold">Identity card / Passport</h4>
                    <p class="text-secondary">For Malaysian, please specify with dashed line! <br> Example: 800808-01-0088</p>
                    <p class="text-secondary">If you are not a Malaysian citizen please click on the checkbox below in order to enter passport.</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="changeInput" onclick="changeInputMethod()">
                        <label class="form-check-label" for="changeInput">
                            Use Passport
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
                        <label for="ic" class="form-label">Passport<span class="text-danger">*</span></label>
                        <div class="col-md mb-3">
                            <input type="text" name="passport" id="passport" class="form-control" placeholder="">
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
                            <label for="tel_hp" class="form-label">Tel No. (H/P)<span class="text-danger">*</span></label>
                            <input type="text" name="tel_hp" id="tel_hp" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-md mb-3">
                            <label for="email" class="form-label">Email address</label>
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
            @if ($status_code == 1)
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
    {{-- end form --}}

@endsection