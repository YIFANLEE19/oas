@extends('oas.layouts.app')

@section('content')

{{-- header --}}
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="border-bottom">
                <h1 class="fw-bold">{{ __('userProfile.title3') }}</h1>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('button.home') }}</a></li>
                      <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('userProfile.title3') }}</li>
                    </ol>
                </nav>
                <div class="progress mb-2" style="height: 30px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary opacity-75" role="progressbar" aria-label="Default striped example" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ __('userProfile.step1') }}</div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary opacity-75" role="progressbar" aria-label="Segment two" style="width: 25%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">{{ __('userProfile.step2') }}</div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-label="Segment two" style="width: 25%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">{{ __('userProfile.step3') }}</div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary opacity-25" role="progressbar" aria-label="Segment two" style="width: 25%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">{{ __('userProfile.step4') }}</div>
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
                {{ __('successMessage.emergency_contact_update_success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
@endif
{{-- end update success --}}

{{-- data --}}
<div class="container">

    {{-- person 1 --}}
    <div class="row mt-4">
        <div class="col-md-12">
            <h5 class="fw-bold text-secondary">{{ __('inputFields.p1') }}</h5>
        </div>
    </div>

    {{-- name --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">{{ __('inputFields.name') }}</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.en_name') }}</p>
                    <h5 class="text-capitalize">{{ $user_detail1->en_name }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.ch_name') }}</p>
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
            <h4 class="fw-bold">{{ __('inputFields.relationship') }} & {{ __('inputFields.contact') }}</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.relationship') }}</p>
                    <h5>{{ $emergency_contact1->guardianRelationship['name'] }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.tel_hp') }}</p>
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
            <h5 class="fw-bold text-secondary">{{ __('inputFields.p2') }}</h5>
        </div>
    </div>

    {{-- name --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">{{ __('inputFields.name') }}</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.en_name') }}</p>
                    <h5 class="text-capitalize">{{ $user_detail2->en_name }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.ch_name') }}</p>
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
            <h4 class="fw-bold">{{ __('inputFields.relationship') }} & {{ __('inputFields.contact') }}</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.relationship') }}</p>
                    <h5>{{ $emergency_contact2->guardianRelationship['name'] }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('inputFields.tel_hp') }}</p>
                    <h5>{{ $user_detail1->tel_hp }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end relationship & contact --}}

    {{-- edit button --}}
    <div class="row ">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">{{ __('button.edit_emergency_contact') }}</button>
        </div>
    </div>
    {{-- end edit button --}}

</div>
{{-- end data --}}

<!-- modal -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <form action="{{ route('emergencyContact.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="editModalLabel">{{ __('button.edit_emergency_contact') }}</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <input type="hidden" name="emergency_contact_id1" value="{{ $emergency_contact1->id }}">
                        <input type="hidden" name="emergency_contact_id2" value="{{ $emergency_contact2->id }}">
                        <input type="hidden" name="user_detail_id1" value="{{ $user_detail1->id }}">
                        <input type="hidden" name="user_detail_id2" value="{{ $user_detail2->id }}">

                        {{-- person 1 --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.p1') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-2">
                                    <div class="col-md mb-3">
                                        <label for="en_name" class="form-label">{{ __('inputFields.en_name') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="en_name1" id="en_name1" class="form-control text-capitalize" value="{{ $user_detail1->en_name }}" onkeyup="if (/[^|A-Za-z0-9\s/.]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/.]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="ch_name" class="form-label">{{ __('inputFields.ch_name') }}</label>
                                        <input type="text" name="ch_name1" id="ch_name1" class="form-control" value="{{ $user_detail1->ch_name }}">
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-md mb-3">
                                        <label for="relationship" class="form-label">{{ __('inputFields.relationship') }}</label>
                                        <select name="guardian_relationship_id1" id="relationship1" class="form-select" required>
                                            <option value="{{ $emergency_contact1->guardian_relationship_id }}" selected>{{ $emergency_contact1->guardianRelationship['name'] }}</option>
                                            @foreach ($allRelationships as $relationship)
                                                <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="tel_hp" class="form-label">{{ __('inputFields.tel_hp') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="tel_hp1" id="tel_hp1" class="form-control" value="{{ $user_detail1->tel_hp }}" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end person 1 --}}

                        {{-- person 2 --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.p2') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-2">
                                    <div class="col-md mb-3">
                                        <label for="en_name" class="form-label">{{ __('inputFields.en_name') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="en_name2" id="en_name2" class="form-control text-capitalize" value="{{ $user_detail2->en_name }}" onkeyup="if (/[^|A-Za-z0-9\s/.]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/.]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="ch_name" class="form-label">{{ __('inputFields.ch_name') }}</label>
                                        <input type="text" name="ch_name2" id="ch_name2" class="form-control" value="{{ $user_detail2->ch_name }}">
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-md mb-3">
                                        <label for="relationship" class="form-label">{{ __('inputFields.relationship') }}</label>
                                        <select name="guardian_relationship_id2" id="relationship2" class="form-select" required>
                                            <option value="{{ $emergency_contact2->guardian_relationship_id }}" selected>{{ $emergency_contact2->guardianRelationship['name'] }}</option>
                                            @foreach ($allRelationships as $relationship)
                                                <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="tel_hp" class="form-label">{{ __('inputFields.tel_hp') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="tel_hp2" id="tel_hp2" class="form-control" value="{{ $user_detail2->tel_hp }}" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end person 2 --}}

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