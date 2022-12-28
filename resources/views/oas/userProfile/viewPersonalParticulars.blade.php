@extends('oas.layouts.app')

@section('content')

{{-- header --}}
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="border-bottom">
                <div class="d-flex justify-content-between mb-2">
                    <h1 class="fw-bold">My profile</h1>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end header --}}

{{-- data --}}
<div class="container">
    {{-- name --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">Name</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">English Name</p>
                    <h5>{{ $user_detail->en_name }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">Chinese Name</p>
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
            <h4 class="fw-bold">Identity card</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">Your IC</p>
                    <h5>{{ $user_detail->ic }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end ic --}}
    {{-- race, religion, nationality --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">Race, Religion, Nationality</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">Race</p>
                    <h5>{{ $applicant_profile->race['name'] }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">Religion</p>
                    <h5>{{ $applicant_profile->religion['name'] }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">Nationality</p>
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
            <h4 class="fw-bold">Birth date, Place of Birth, Age</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">Birth date(Y-M-D)</p>
                    <h5>{{ $applicant_profile->birth_date }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">Age</p>
                    <h5>Do it later</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">Place of Birth</p>
                    <h5>{{ $applicant_profile->place_of_birth }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end birth date, age, place of birth --}}
    {{-- gender marital --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">Gender & Marital Status</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">Gender</p>
                    <h5>{{ $applicant_profile->gender['name'] }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">Marital</p>
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
            <h4 class="fw-bold">Contact</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">Email Address</p>
                    <h5>{{ $user_detail->email }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">Tel No. (H)</p>
                    <h5>{{ $user_detail->tel_h }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">Tel No. (H/P)</p>
                    <h5>{{ $user_detail->tel_hp }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end contact --}}
    {{-- correspondence address --}}
    <div class="row d-flex flex-row mt-4 mb-4">
        <div class="col-md-4">
            <h4 class="fw-bold">Correspondence address</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">Address</p>
                    {{-- <h5>{{ $address->street1 }},{{ $address->street2 }},{{ $address->zipcode }},{{ $address->city }},{{ $address->state }},{{ $address->country['name'] }},</h5> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- end correspondence address --}}
</div>
{{-- end data --}}

@endsection