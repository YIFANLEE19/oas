@extends('oas.layouts.app')

@section('content')
    
    {{-- header --}}
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="border-bottom">
                    <h3 class="fw-bold">Parent / Guardian Particulars</h3>
                    <p class="text-secondary">Next >>> Emergency Contact</p>
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
                    <h4 class="fw-bold">Identity card / Passport</h4>
                    <p class="text-secondary">For Malaysian, please specify with dashed line! <br> Example: 800808-01-0088</p>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="ic" id="ic" class="form-control" placeholder="ic" required>
                                <label for="ic">Identity card / Passport<span class="text-danger">*</span></label>
                            </div>
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
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <select name="guardian_relationship_id" id="relationship" class="form-select" required>
                                    <option selected disabled>Choose relationship</option>
                                    @foreach ($allRelationships as $relationship)
                                        <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                                    @endforeach
                                </select>
                                <label for="relationship">Relationship</label>
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
                                <label for="nationality">Nationality<span class="text-danger">*</span></label>
                            </div>
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
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="occupation" id="occupation" class="form-control" placeholder="Occupation" required>
                                <label for="occupation">Occupation<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <select name="income_id" id="income" class="form-select" required>
                                    <option selected disabled>Choose your family income range</option>
                                    @foreach ($allIncomes as $income)
                                        <option value="{{ $income->id }}">{{ $income->range }}</option>
                                    @endforeach
                                </select>
                                <label for="income">Income range<span class="text-danger">*</span></label>
                            </div>
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
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email address" required>
                                <label for="email">Email address<span class="text-danger">*</span></label>
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
            {{-- permanent address --}}
            <div class="row d-flex flex-row mt-4 mb-4">
                <div class="col-md-4">
                    <h4 class="fw-bold">Permanent Address</h4>
                    <p class="text-secondary"></p>
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
                                <input type="text" name="p_country" id="p_country" class="form-control" placeholder="Country" required>
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


@endsection