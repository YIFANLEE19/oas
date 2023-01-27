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
                                    <a data-bs-toggle="modal" data-bs-target="#editCourseSelectionModal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Intake Month & Year:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">Month: {{ $data['getSelectedCourses'][0]->programmeRecord['semesterYearMapping']->semester['semester'] }} ,Year: {{ $data['getSelectedCourses'][0]->programmeRecord['semesterYearMapping']->year }}</p>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Course Selected:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                @if ($data['getSelectedCourses'][0]->programmeRecord['programme']->programme_level_id == 1 || $data['getSelectedCourses'][0]->programmeRecord['programme']->programme_level_id == 2)
                                    <p class="fw-bold">Postgraduate</p>
                                @else
                                    <p class="fw-bold">Undergraduate</p>
                                @endif
                            </div>
                        </div>
                        @for ($i = 0; $i < count($data['getSelectedCourses']); $i++)
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <p class="lead">Choice {{ $i % 3 + 1 }}:</p>
                                </div>
                                <div class="col-md-6 col-12">
                                    <p class="fw-bold">{{ $data['getSelectedCourses'][$i]->programmeRecord['programme']->en_name }}</p>
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
                                <p class="lead">English name:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="fw-bold">{{ $data['guardian_user_detail']->en_name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p class="lead">Chinese name:</p>
                            </div>
                            <div class="col-md-6 col-12">
                                @if ($data['guardian_user_detail']->ch_name == null)
                                    <p class="fw-bold">-</p>
                                @else
                                    <p class="fw-bold">{{ $data['guardian_user_detail']->ch_name }}</p>
                                @endif
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
                                    <a data-bs-toggle="modal" data-bs-target="#editEmergencyContactModal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
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
                                    <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editProfilePictureModal"><i class="bi bi-pencil"></i></a>
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

{{-- edit parent/guardian particulars modal --}}

{{-- end edit parent/guardian particulars modal --}}

{{-- edit emergency contact modal --}}
<div class="modal fade" id="editEmergencyContactModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editEmergencyContactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <form action="{{ route('emergencyContact.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="editEmergencyContactModalLabel">Edit emergency contact</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <input type="hidden" name="emergency_contact_id1" value="{{ $data['emergency_contact1']->id }}">
                        <input type="hidden" name="emergency_contact_id2" value="{{ $data['emergency_contact2']->id }}">
                        <input type="hidden" name="user_detail_id1" value="{{ $data['emergency_contact_user_detail1']->id }}">
                        <input type="hidden" name="user_detail_id2" value="{{ $data['emergency_contact_user_detail2']->id }}">
                        {{-- person 1 --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">Person 1</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-2">
                                    <div class="col-md-6 mb-3">
                                        <label for="en_name" class="form-label">{{ __('inputFields.en_name') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="en_name1" id="en_name1" class="form-control text-capitalize" value="{{ $data['emergency_contact_user_detail1']->en_name }}" onkeyup="if (/[^|A-Za-z0-9\s/.]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/.]+/g,'')" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="ch_name" class="form-label">{{ __('inputFields.ch_name') }}</label>
                                        <input type="text" name="ch_name1" id="ch_name1" class="form-control" value="{{ $data['emergency_contact_user_detail1']->ch_name }}">
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-md-6 mb-3">
                                        <label for="relationship" class="form-label">{{ __('inputFields.relationship') }}</label>
                                        <select name="guardian_relationship_id1" id="relationship1" class="form-select" required>
                                            <option value="{{ $data['emergency_contact1']->guardian_relationship_id }}" selected hidden>{{ $data['emergency_contact1']->guardianRelationship['name'] }}</option>
                                            @foreach ($data['allRelationships'] as $relationship)
                                                <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tel_hp" class="form-label">{{ __('inputFields.tel_hp') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="tel_hp1" id="tel_hp1" class="form-control" value="{{ $data['emergency_contact_user_detail1']->tel_hp }}" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end person 1 --}}
                        {{-- person 2 --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">Person 2</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-2">
                                    <div class="col-md-6 mb-3">
                                        <label for="en_name2" class="form-label">{{ __('inputFields.en_name') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="en_name2" id="en_name2" class="form-control text-capitalize" value="{{ $data['emergency_contact_user_detail2']->en_name }}" onkeyup="if (/[^|A-Za-z0-9\s/.]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/.]+/g,'')" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="ch_name2" class="form-label">{{ __('inputFields.ch_name') }}</label>
                                        <input type="text" name="ch_name2" id="ch_name2" class="form-control" value="{{ $data['emergency_contact_user_detail2']->ch_name }}">
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-md-6 mb-3">
                                        <label for="relationship2" class="form-label">{{ __('inputFields.relationship') }}</label>
                                        <select name="guardian_relationship_id2" id="relationship2" class="form-select" required>
                                            <option value="{{ $data['emergency_contact2']->guardian_relationship_id }}" selected hidden>{{ $data['emergency_contact2']->guardianRelationship['name'] }}</option>
                                            @foreach ($data['allRelationships'] as $relationship)
                                                <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tel_hp2" class="form-label">{{ __('inputFields.tel_hp') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="tel_hp2" id="tel_hp2" class="form-control" value="{{ $data['emergency_contact_user_detail2']->tel_hp }}" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end person 2 --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end edit emergency contact modal --}}

{{-- edit profile picture modal --}}
<div class="modal fade" id="editProfilePictureModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editProfilePictureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <form action="{{ route('profilePicture.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="editProfilePictureModalLabel">Edit profile picture</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <input type="hidden" name="applicant_profile_picture_id" value="{{ $data['profile_picture']->id }}">
                        <input type="hidden" name="applicant_profile_id" value="{{ $data['applicant_profile']->id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="picture" class="form-label">Photo (<span class="text-danger fw-bold">{{ __('inputFields.photo_format1') }}</span>) and <span class="fw-bold text-danger">{{ __('inputFields.photo_format2') }}</span> <span class="text-danger">*</span></label>
                                <div class="d-flex flex-column">
                                    <input class="form-control me-3 mb-4" name="picture" id="picture" type="file" accept=".jpg, .jpeg, .png" onchange="previewPhoto(event)">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p class="text-secondary">{{ __('inputFields.preview') }}</p>
                                <img id="preview_location" name="preview_location" class="img-fluid" width="217px" height="280px">
                            </div>
                        </div>
                    </div>
                    <script>
                        // image preview
                        var previewPhoto = function(event){
                            var previewLocation = document.getElementById('preview_location');
                            previewLocation.src = URL.createObjectURL(event.target.files[0]);
                            previewLocation.onload = function(){
                                URL.revokeObjectURL(previewLocation.src);
                            }
                        }
                    </script>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end edit profile picture modal --}}
@endsection