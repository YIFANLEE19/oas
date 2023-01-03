@extends('oas.layouts.app')

@section('content')
<div class="container">
    {{-- header --}}
    <div class="row">
        <div class="col-md-8">
            <h1 class="display-5">SUC Online Admission System</h1>
            {{-- description --}}
            {{-- <p class="text-secondary"></p> --}}
        </div>
    </div>
    {{-- end header --}}

    {{-- alert --}}
    @if ($application_status_id != 4)
        <div class="row mt-4 mb-2">
            <div class="col-xl-12">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading fw-bold">Read me before apply any programme!</h4>
                    <p>Aww yeah, you successfully read this important alert message. Before you apply for any course, you have to fill in three particulars, that is Personal particulars, Parent / Guardian particulars and Emergency contact. When you have finished filling it out, you will see the Apply button</p>
                    <hr>
                    <p class="mb-0">Thank you for your cooperation. I will wait for you at the next step.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    {{-- end alert --}}

    @if ($application_status_id == 0)
        {{-- personal profile --}}
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body px-4 py-4">
                        <h1>Setup your personal particulars</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione magni, consequatur at tempore repellendus eaque dignissimos nostrum quaerat excepturi quibusdam id numquam similique deserunt iste quae adipisci nesciunt eos iure?</p>
                        <small class="text-secondary"><span class="text-danger">*</span>All information will be treated as private and confidential.</small>
                        <br>
                        <a href="{{ route('personalParticulars.home') }}" class="btn btn-primary mt-2">Click here to setup</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- end personal profile --}}
    @elseif ($application_status_id == 1)
        {{-- parent / guardian profile --}}
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body px-4 py-4">
                        <h1>Setup your parent / guardian particulars</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione magni, consequatur at tempore repellendus eaque dignissimos nostrum quaerat excepturi quibusdam id numquam similique deserunt iste quae adipisci nesciunt eos iure?</p>
                        <small class="text-secondary"><span class="text-danger">*</span>All information will be treated as private and confidential.</small>
                        <br>
                        <a href="{{ route('parentGuardianParticulars.home') }}" class="btn btn-primary mt-2">Click here to setup</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- end parent / guardian profile --}}
    @elseif ($application_status_id == 2)
        {{-- emergency contact --}}
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body px-4 py-4">
                        <h1>Setup your emergency contact</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione magni, consequatur at tempore repellendus eaque dignissimos nostrum quaerat excepturi quibusdam id numquam similique deserunt iste quae adipisci nesciunt eos iure?</p>
                        <small class="text-secondary"><span class="text-danger">*</span>All information will be treated as private and confidential.</small>
                        <br>
                        <a href="{{ route('emergencyContact.home') }}" class="btn btn-primary mt-2">Click here to setup</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- end emergency contact --}}
    @elseif ($application_status_id == 3)
        {{-- profile picture --}}
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body px-4 py-4">
                        <h1>Setup your profile picture</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione magni, consequatur at tempore repellendus eaque dignissimos nostrum quaerat excepturi quibusdam id numquam similique deserunt iste quae adipisci nesciunt eos iure?</p>
                        <small class="text-secondary"><span class="text-danger">*</span>All information will be treated as private and confidential.</small>
                        <br>
                        <a href="{{ route('profilePicture.home') }}" class="btn btn-primary mt-2">Click here to setup</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- end profile picture --}}
    @endif
</div>

{{-- show after profile done --}}
@if ($application_status_id == 4)

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6">
                <h3 class="fw-bold">My profile</h3>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Attention!</strong> Please review your profile again before applying any programme. When you submit your application, we will read your last updated information.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="card">
                    <div class="card-body px-4">
                        <h4 class="card-title">{{ Auth::user()->name }}</h4>
                        <h6 class="card-subtitle">{{ Auth::user()->email }}</h6>
                        <p class="badge text-bg-primary">{{ Auth::user()->role['name'] }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('personalParticulars.view') }}" class="list-group-item list-group-item-action">Personal particulars</a>
                        <a href="{{ route('parentGuardianParticulars.view') }}" class="list-group-item list-group-item-action">Parent / guardian particulars</a>
                        <a href="{{ route('emergencyContact.view') }}" class="list-group-item list-group-item-action">Emergency contact</a>
                        <a href="{{ route('profilePicture.view') }}" class="list-group-item list-group-item-action">Profile picture</a>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="fw-bold">Apply programme</h3>
                <div class="card">
                    <div class="card-body px-4 py-4">
                        <h3>Apply programme now!</h3>
                        <p>Southern University College is now offering 58 programmes, including 44 MQA Accredited Programmes, 2 SPACE Programmes and 12 SITE Programmes.</p>
                        <small class="text-secondary"><span class="text-danger">*</span>All information will be treated as private and confidential.</small>
                        <br>
                        <a href="" class="btn btn-primary mt-2">Apply programme</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@endsection
