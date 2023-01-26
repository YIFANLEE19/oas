@extends('oas.layouts.app')
@section('content')

{{-- 
    header here. If want to add some description below the heading,
    please use <p class="text-secondary">content here</p>
--}}
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1 class="display-5">{{ __('home.page_heading') }}</h1>
        </div>
    </div>
</div>
{{-- end header --}}

{{-- alert --}}
@if (($applicant_status_log == null) || ($applicant_status_log->applicant_profile_status_id != config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PROFILE_PICTURE')))
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-xl-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h4 class="alert-heading fw-bold">{{ __('home.alert_msg1_heading') }}</h4>
                <p>{{ __('home.alert_msg1_text1') }}</p>
                <hr>
                <p class="mb-0">{{ __('home.alert_msg1_text2') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
@endif
{{-- end alert --}}

{{-- card --}}
@if($applicant_status_log == null)
{{-- personal particulars --}}
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body px-4 py-4">
                    <h1>{{ __('home.step1_heading') }}</h1>
                    <p>{{ __('home.step1_description') }}</p>
                    <small class="text-secondary"><span class="text-danger">*</span>{{ __('home.clauses_msg1') }}</small>
                    <br>
                    <a href="{{ route('personalParticulars.home') }}" class="btn btn-primary mt-2">{{ __('home.step_button') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end personal particulars --}}
@elseif ($applicant_status_log->applicant_profile_status_id == config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PERSONAL_PARTICULARS'))
{{-- parent/guardian particulars --}}
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body px-4 py-4">
                    <h1>{{ __('home.step2_heading') }}</h1>
                    <p>{{ __('home.step2_description') }}</p>
                    <small class="text-secondary"><span class="text-danger">*</span>{{ __('home.clauses_msg1') }}</small>
                    <br>
                    <a href="{{ route('parentGuardianParticulars.home') }}" class="btn btn-primary mt-2">{{ __('home.step_button') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end parent/guardian particulars --}}
@elseif ($applicant_status_log->applicant_profile_status_id == config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PARENT_GUARDIAN_PARTICULARS'))
{{-- emergency contact --}}
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body px-4 py-4">
                    <h1>{{ __('home.step3_heading') }}</h1>
                    <p>{{ __('home.step3_description') }}</p>
                    <small class="text-secondary"><span class="text-danger">*</span>{{ __('home.clauses_msg1') }}</small>
                    <br>
                    <a href="{{ route('emergencyContact.home') }}" class="btn btn-primary mt-2">{{ __('home.step_button') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>        
{{-- end emergency contact --}}
@elseif ($applicant_status_log->applicant_profile_status_id == config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_EMERGENCY_CONTACT'))
{{-- profile picture --}}
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body px-4 py-4">
                    <h1>{{ __('home.step4_heading') }}</h1>
                    <p>{{ __('home.step4_description') }}</p>
                    <small class="text-secondary"><span class="text-danger">*</span>{{ __('home.clauses_msg1') }}</small>
                    <br>
                    <a href="{{ route('profilePicture.home') }}" class="btn btn-primary mt-2">{{ __('home.step_button') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end profile picture --}}
@endif
{{-- end card --}}

{{-- 
    My profile & apply programme - show when user finish setup user profile
    application_status_id is 4 when user finish setup personal particulars,
    parent/guardian particulars, emergency contact and profile picture
--}}
@if($applicant_status_log != null && $applicant_status_log->applicant_profile_status_id == 4)
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6">
                <h3 class="fw-bold">{{ __('home.profile_heading') }}</h3>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ __('home.profile_alert_msg1_strong') }}</strong> {{ __('home.profile_alert_msg1') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="card">
                    <div class="card-body px-4">
                        <h4 class="card-title">{{ Auth::user()->name }}</h4>
                        <h6 class="card-subtitle">{{ Auth::user()->email }}</h6>
                        <p class="badge text-bg-primary">{{ Auth::user()->role['name'] }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('personalParticulars.view') }}" class="list-group-item list-group-item-action d-flex justify-content-between">
                            <span>{{ __('home.step1_list_item') }}</span>
                            <span><i class="bi bi-arrow-right"></i></span>
                        </a>
                        <a href="{{ route('parentGuardianParticulars.view') }}" class="list-group-item list-group-item-action d-flex justify-content-between">
                            <span>{{ __('home.step2_list_item') }}</span>
                            <span><i class="bi bi-arrow-right"></i></span>
                        </a>
                        <a href="{{ route('emergencyContact.view') }}" class="list-group-item list-group-item-action d-flex justify-content-between">
                            <span>{{ __('home.step3_list_item') }}</span>
                            <span><i class="bi bi-arrow-right"></i></span>
                        </a>
                        <a href="{{ route('profilePicture.view') }}" class="list-group-item list-group-item-action d-flex justify-content-between">
                            <span>{{ __('home.step4_list_item') }}</span>
                            <span><i class="bi bi-arrow-right"></i></span>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="fw-bold">{{ __('home.apply_programme_heading') }}</h3>
                <div class="card">
                    <div class="card-body px-4 py-4">
                        <p class="lead">{{ __('home.apply_programme_description1') }}</p>
                        <p>{{ __('home.apply_programme_description2') }}</p>
                        <small class="text-secondary"><span class="text-danger">*</span>{{ __('home.clauses_msg1') }}</small>
                        <br>
                        
                            <a href="{{ route('programmeSelect.home') }}" class="btn btn-primary mt-2">{{ __('home.apply_programme_button') }}</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
{{-- end my profile & apply programme --}}

{{-- process --}}
@if(count($application_status_logs) == true)
    <div class="container">
        <div class="row mb-3 mt-4">
            <div class="col-md-12">
                <h3 class="fw-bold">Application In progress</h3>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12 table-responsive">
                <table class="table align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Programme</th>
                            <th scope="col">Current Stage</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($application_status_logs as $application_status_log)
                            <tr>
                                <th scope="row">
                                    @for ($i = 0; $i < count($getProgrammePickeds); $i++)
                                        @if ($getProgrammePickeds[$i]->application_record_id == $application_status_log->application_record_id)
                                        Choice {{ $i % 3 + 1 }}: {{ $getProgrammePickeds[$i]->programmeRecord['programme']->en_name }} <br>
                                        @endif                           
                                    @endfor
                                </th>
                                <td>{{ $application_status_log->applicationStatus['status'] }}</td>
                                <td>
                                    @if ($application_status_log->application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_PROGRAM_SELECTION'))
                                    <a href="{{ route('academicDetail.home', ['id' => Crypt::encrypt($application_status_log->application_record_id) ]) }}" class="btn btn-primary">Continue academic detail</a>
                                    @elseif($application_status_log->application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_ACADEMIC_DETAIL'))
                                    <a href="{{ route('statusOfHealth.home', ['id' => Crypt::encrypt($application_status_log->application_record_id) ]) }}" class="btn btn-primary">Continue status of health</a>
                                    @elseif($application_status_log->application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_STATUS_OF_HEALTH'))
                                    <a href="{{ route('agreements.home', ['id' => Crypt::encrypt($application_status_log->application_record_id) ]) }}" class="btn btn-primary">Continue agreements</a>
                                    @elseif($application_status_log->application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_AGREEMENT'))
                                    <a href="{{ route('draft.home', ['id' => Crypt::encrypt($application_status_log->application_record_id) ]) }}" class="btn btn-primary">Continue draft</a>
                                    @elseif($application_status_log->application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_DRAFT'))
                                    <a href="#" class="btn btn-primary">Continue supporting document</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif

{{-- end process --}}
@endsection
