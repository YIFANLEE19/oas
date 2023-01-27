@extends('oas.layouts.app')

@section('content')

{{-- header --}}
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="border-bottom">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('button.home') }}</a></li>
                      <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('draft.title') }}</li>
                    </ol>
                </nav>
                <h1 class="fw-bold">{{ __('draft.title') }}</h1>
                <p><span class="fw-bold">Step 5 of 7</span> Completed</p>
                <div class="progress mb-2" style="height: 10px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 56%" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary opacity-25" role="progressbar" style="width: 44%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end header --}}

{{-- alert message --}}
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Please confirm the draft of your information before submit
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
{{-- end alert message --}}

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Draft of Information</div>
                <div class="card-body">
                    <div class="container">
                        {{-- course selection --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h1 class="fw-bold">Course Selection</h1>
                                    <a data-bs-toggle="modal" data-bs-target="#editprogramselectionmodal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Intake Month & Year:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">Month: {{ $getSelectedCourses[0]->programmeRecord['semesterYearMapping']->semester['semester'] }} ,Year: {{ $getSelectedCourses[0]->programmeRecord['semesterYearMapping']->year }}</p>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Course Selected:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                @if ($getSelectedCourses[0]->programmeRecord['programme']->programme_level_id == 1 || $getSelectedCourses[0]->programmeRecord['programme']->programme_level_id == 2)
                                    <p class="fw-bold">Postgraduate</p>
                                @else
                                    <p class="fw-bold">Undergraduate</p>
                                @endif
                            </div>
                        </div>
                        @for ($i = 0; $i < count($getSelectedCourses); $i++)
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <p class="lead">Choice {{ $i % 3 + 1 }}:</p>
                                </div>
                                <div class="col-md-6 col-12">
                                    <p class="fw-bold">{{ $getSelectedCourses[$i]->programmeRecord['programme']->en_name }}</p>
                                </div>
                            </div>
                        @endfor
                        <div class="border-bottom mb-2"></div>
                        {{-- end course selection --}}
                        {{-- personal particulars --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h1 class="fw-bold">Personal Particulars</h1>
                                    <a data-bs-toggle="modal" data-bs-target="#editprogramselectionmodal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">English name:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['user_detail']->en_name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Chinese name:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                @if ($data['user_detail']->ch_name == null)
                                    <p class="fw-bold">-</p>
                                @else
                                    <p class="fw-bold">{{ $data['user_detail']->ch_name }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Identity card/other certifcate:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['user_detail']->ic }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Race:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['applicant_profile']->race['name'] }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Religion:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['applicant_profile']->religion['name'] }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Nationality:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['applicant_profile']->nationality['name'] }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Birth date(Y-M-D):</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['applicant_profile']->birth_date }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Gender:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['applicant_profile']->gender['name'] }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Marital Status:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['applicant_profile']->marital['name'] }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Email address:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['user_detail']->email }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Tel no. (H/P):</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['user_detail']->tel_hp }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Tel no. (H):</p>
                            </div>
                            <div class="col-md-6 col-12">
                                @if ($data['user_detail']->tel_h != null)
                                    <p class="fw-bold">{{ $data['user_detail']->tel_h }}</p>
                                @else
                                    <p class="fw-bold">-</p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Correspondence Address:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['c_address']->street1 }}, {{ $data['c_address']->street2 }}, {{ $data['c_address']->zipcode }}, {{ $data['c_address']->city }}, {{ $data['c_address']->state }}, {{ $data['c_address']->country['name'] }}.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Permanent Address:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['p_address']->street1 }}, {{ $data['p_address']->street2 }}, {{ $data['p_address']->zipcode }}, {{ $data['p_address']->city }}, {{ $data['p_address']->state }}, {{ $data['p_address']->country['name'] }}.</p>
                            </div>
                        </div>
                        <div class="border-bottom mb-2"></div>
                        {{-- end personal particulars --}}
                        {{-- parent/guardian particulars --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h1 class="fw-bold">Parent/Guardian Particulars</h1>
                                    <a data-bs-toggle="modal" data-bs-target="#editprogramselectionmodal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Parent/Guardian name:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['guardian_user_detail']->en_name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Identity card/Passport:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['guardian_user_detail']->ic }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Relationship:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['guardian_detail']->guardianRelationship['name'] }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Nationality:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['guardian_detail']->nationality['name'] }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Occupation:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['guardian_detail']->occupation }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Family income:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['guardian_detail']->income['range'] }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Tel no(H/P):</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['guardian_user_detail']->tel_hp }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Email address:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['guardian_user_detail']->email }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Permanent address:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['pg_p_address']->street1 }}, {{ $data['pg_p_address']->street2 }}, {{ $data['pg_p_address']->zipcode }}, {{ $data['pg_p_address']->city }}, {{ $data['pg_p_address']->state }}, {{ $data['pg_p_address']->country['name'] }}.</p>
                            </div>
                        </div>
                        <div class="border-bottom mb-2"></div>
                        {{-- end parent/guardian particulars --}}
                        {{-- emergency contact --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h1 class="fw-bold">Emergency contact</h1>
                                    <a data-bs-toggle="modal" data-bs-target="#editprogramselectionmodal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Person 1</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">English name:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['emergency_contact_user_detail1']->en_name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Chinese name:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                @if ($data['emergency_contact_user_detail1']->ch_name != null)
                                    <p class="fw-bold">{{ $data['emergency_contact_user_detail1']->ch_name }}</p>
                                @else
                                    <p class="fw-bold">-</p>
                                @endif 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Relationship:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['emergency_contact1']->guardianRelationship['name'] }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Tel no.(H/P):</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['emergency_contact_user_detail1']->tel_hp }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Person 2</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">English name:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['emergency_contact_user_detail2']->en_name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Chinese name:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                @if ($data['emergency_contact_user_detail2']->ch_name != null)
                                    <p class="fw-bold">{{ $data['emergency_contact_user_detail2']->ch_name }}</p>
                                @else
                                    <p class="fw-bold">-</p>
                                @endif 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Relationship:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['emergency_contact2']->guardianRelationship['name'] }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Tel no.(H/P):</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['emergency_contact_user_detail2']->tel_hp }}</p>
                            </div>
                        </div>
                        <div class="border-bottom mb-2"></div>
                        {{-- end emergency contact --}}
                        {{-- profile picture --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h1 class="fw-bold">Profile picture</h1>
                                    <a data-bs-toggle="modal" data-bs-target="#editprogramselectionmodal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-12">
                                <div class="alert alert-warning fade show" role="alert">
                                    <h4 class="alert-heading">Guidelines for submitting your photo</h4>
                                    <p>1. In colour, <span class="fw-bold">NOT</span> black and white.</p>
                                    <p>2. Taken against a <span class="fw-bold">WHITE</span> background.</p>
                                    <p>3. The photo must be a true likeness of the person.</p>
                                    <p>4. Please do not use photos that have been cut down from larger pictures.</p>
                                    <p>5. The photo must be sent in <span class="fw-bold">(.jpg, .jpeg, .png)</span> file format and name it as your Name same as I/C.</p>
                                    <hr>
                                    <img src="/images/photo_correct.png" alt="" class="img-fluid me-3">
                                    <img src="/images/photo_wrong.png" alt="" class="img-fluid me-3">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <p class="lead">Preview</p>
                                <img src="/images/profile_picture/{{ $data['profile_picture']->path }}" class="img-fluid" width="217px" height="280px">
                            </div>
                        </div>
                        <div class="border-bottom mb-2"></div>
                        {{-- end profile picture --}}
                        {{-- academic record --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h1 class="fw-bold">Academic Record</h1>
                                    <a data-bs-toggle="modal" data-bs-target="#editprogramselectionmodal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table">
                                    <thead class="table-primary">
                                        <tr>
                                            <th scope="col">School Level</th>
                                            <th scope="col">School Name</th>
                                            <th scope="col">Year Graduation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < count($data['academic_record']); $i++)
                                            <tr>
                                                <th scope="row">{{ $data['academic_record'][$i]->schoolLevel['name'] }}</th>
                                                <td>{{ $data['academic_record'][$i]->school_name }}</td>
                                                <td>{{ $data['academic_record'][$i]->school_graduation }}</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- end academic record --}}
                        {{-- status of health --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h1 class="fw-bold">Status of Health</h1>
                                    <a data-bs-toggle="modal" data-bs-target="#editprogramselectionmodal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table">
                                    <thead class="table-primary">
                                        <tr>
                                            <th scope="col">Disease</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < count($data['status_of_health']); $i++)
                                            <tr>
                                                <th>{{ $data['status_of_health'][$i]->disease['name'] }}</th>
                                                <td>{{ ($data['status_of_health'][$i]->disease_status == 1)? "No" :"Yes"; }}</td>
                                                <td>{{ ($data['status_of_health'][$i]->disease_remark == null)?"-": $data['status_of_health'][$i]->disease_remark ; }}</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- end status of health --}}
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-outline-secondary me-3">{{ __('academicRecord.back_button') }}</a>
                        <button type="submit" class="btn btn-primary me-3" onClick="check()">{{ __('academicRecord.next_button') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection