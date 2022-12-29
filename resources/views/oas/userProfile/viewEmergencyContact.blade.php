@extends('oas.layouts.app')

@section('content')

{{-- header --}}
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="border-bottom">
                <h1 class="fw-bold">My profile - Emergecy contact</h1>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                      <li class="breadcrumb-item active fw-bold" aria-current="page">Parent / guardian particulars</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
{{-- end header --}}

{{-- data --}}
<div class="container">
    {{-- person 1 --}}
    <div class="row mt-4">
        <div class="col-md-12">
            <h5 class="fw-bold text-secondary">Person 1</h5>
        </div>
    </div>
    {{-- name --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">Name</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">English Name</p>
                    <h5 class="text-capitalize">{{ $user_detail1->en_name }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">Chinese Name</p>
                        @if ($user_detail1->ch_name == '')
                            <h5>-</h5>
                        @else
                            <h5>{{ $user_detail1->ch_name }}</h5>
                        @endif
                </div>
            </div>
        </div>
    </div>
    {{-- end name --}}
    {{-- relationship & contact --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">Relationship & Contact</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">Relationship</p>
                    <h5>{{ $emergency_contact1->guardianRelationship['name'] }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">Contact</p>
                    <h5>{{ $user_detail1->tel_hp }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end relationship & contact --}}
    {{-- person 2 --}}
    <div class="row">
        <div class="col-md-12">
            <h5 class="fw-bold text-secondary">Person 2</h5>
        </div>
    </div>
    {{-- name --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">Name</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">English Name</p>
                    <h5 class="text-capitalize">{{ $user_detail2->en_name }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">Chinese Name</p>
                        @if ($user_detail2->ch_name == '')
                            <h5>-</h5>
                        @else
                            <h5>{{ $user_detail2->ch_name }}</h5>
                        @endif
                </div>
            </div>
        </div>
    </div>
    {{-- end name --}}
    {{-- relationship & contact --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">Relationship & Contact</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">Relationship</p>
                    <h5>{{ $emergency_contact2->guardianRelationship['name'] }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">Contact</p>
                    <h5>{{ $user_detail1->tel_hp }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end relationship & contact --}}
</div>
{{-- end data --}}

@endsection