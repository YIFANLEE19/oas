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
                                    <a data-bs-toggle="modal" data-bs-target="#editProgrammeSelectionModal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
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
                                    <a data-bs-toggle="modal" data-bs-target="#editPersonalParticularsModal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
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
                                <p class="fw-bold" id="read_ic">{{ $data['user_detail']->ic }}</p>
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
                                    <a data-bs-toggle="modal" data-bs-target="#editParentGuardianParticularsModal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
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
                                <p class="fw-bold" id="read_pg_ic">{{ $data['guardian_user_detail']->ic }}</p>
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
                                <img src="/images/profile_picture/{{ Crypt::decrypt($data['profile_picture']->path) }}" class="img-fluid" width="217px" height="280px">
                            </div>
                        </div>
                        <div class="border-bottom mb-2"></div>
                        {{-- end profile picture --}}
                        {{-- academic record --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h1 class="fw-bold">Academic Record</h1>
                                    <a data-bs-toggle="modal" data-bs-target="#editAcademicDetailModal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
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
                                    <a data-bs-toggle="modal" data-bs-target="#editStatusOfHealthModal" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
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
                                                <td>{{ ($data['status_of_health'][$i]->disease_status == 0)? "No" :"Yes"; }}</td>
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
                        <a data-bs-toggle="modal" data-bs-target="#confirmModal" class="btn btn-primary me-3">{{ __('academicRecord.next_button') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- confirm modal --}}
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('draft.create',['id' => Crypt::encrypt($APPLICATION_RECORD_ID)]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="confirmModalLabel">Confirmation</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to continue. If you continue, the information you provide cannot be modified.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Continue</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end confirm modal --}}

{{-- edit programme selection modal --}}
@livewireStyles
<div class="modal fade" id="editProgrammeSelectionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editProgrammeSelectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <form action="{{ route('programmeSelect.update',['id' => Crypt::encrypt($APPLICATION_RECORD_ID)]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="editProgrammeSelectionModalLabel">Edit academic record</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <livewire:edit-programme-selection :APPLICATION_RECORD_ID="$APPLICATION_RECORD_ID"/>
                            </div>
                        </div>
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
@livewireScripts
{{-- end edit programme selection modal --}}

{{-- edit personal particulars modal --}}
<div class="modal fade" id="editPersonalParticularsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editPersonalParticularsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <form action="{{ route('personalParticulars.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="editPersonalParticularsModalLabel">Edit personal particulars</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <input type="hidden" name="user_detail_id" value="{{ $data['user_detail']->id }}">
                        <input type="hidden" name="c_address_id" value="{{ $data['c_address']->id }}">
                        <input type="hidden" name="p_address_id" value="{{ $data['p_address']->id }}">
                        <input type="hidden" name="applicant_profile_id" value="{{ $data['applicant_profile']->id }}">
                        {{-- name --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.name') }}</h4>
                                <p class="text-secondary">{{ __('inputFields.hint_for_name') }}</p>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-2">
                                    <div class="col-md mb-3">
                                        <label for="en_name" class="form-label">{{ __('inputFields.en_name') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="en_name" id="en_name" class="form-control text-capitalize" value="{{ $data['user_detail']->en_name }}" onkeyup="if (/[^|A-Za-z0-9\s/.]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/.]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="ch_name" class="form-label">{{ __('inputFields.ch_name') }}</label>
                                        <input type="text" name="ch_name" id="ch_name" class="form-control" value="{{ $data['user_detail']->ch_name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end name --}}
                        {{-- ic --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.ic') }}</h4>
                                <p class="text-secondary">{{ __('inputFields.hint_for_ic') }}</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="changeInput" onclick="changeInputMethod()">
                                    <label class="form-check-label mb-2" for="changeInput">
                                        {{ __('inputFields.ic_checkbox') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row" id="ic_section">
                                    <label for="ic" class="form-label">{{ __('inputFields.ic') }}<span class="text-danger">*</span></label>
                                    <div class="col-md d-flex flex-row align-items-center mb-3">
                                        <input type="text" name="ic1" id="ic1" class="form-control" placeholder="" minlength="6" maxlength="6" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                        <span class="ms-4">-</span>
                                    </div>
                                    <div class="col-md d-flex flex-row align-items-center mb-3">
                                        <input type="text" name="ic2" id="ic2" class="form-control" placeholder="" minlength="2" maxlength="2" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                        <span class="ms-4">-</span>
                                    </div>
                                    <div class="col-md mb-3">
                                        <input type="text" name="ic3" id="ic3" class="form-control" placeholder="" minlength="4" maxlength="4" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                </div>
                                <div class="row" id="passport_section" style="display: none;">
                                    <label for="ic" class="form-label">{{ __('inputFields.without_ic') }}<span class="text-danger">*</span></label>
                                    <div class="col-md mb-3">
                                        <input type="text" name="passport" id="passport" class="form-control" placeholder="" onkeyup="if (/[^|A-Za-z0-9-]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9-]+/g,'')">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end ic --}}
                        {{-- script --}}
                        <script>
                                
                            let text = document.getElementById('read_ic').innerHTML;
                            const myArray = text.split("-");
                            const changeInput = document.getElementById('changeInput');
                            const ic_section = document.getElementById('ic_section');
                            const passport_section = document.getElementById('passport_section');
                            const ic1 = document.getElementById('ic1');
                            const ic2 = document.getElementById('ic2');
                            const ic3 = document.getElementById('ic3');
                            const passport = document.getElementById('passport');

                            if(myArray.length != 3){
                                document.getElementById("passport").value = myArray[0];
                                changeInput.checked = true;
                                ic_section.style.display = 'none';
                                passport_section.style.display = 'block';
                            }else{
                                document.getElementById("ic1").value = myArray[0]; 
                                document.getElementById("ic2").value = myArray[1]; 
                                document.getElementById("ic3").value = myArray[2]; 

                            }

                            function changeInputMethod(){
                                if(changeInput.checked){
                                    ic_section.style.display = 'none';
                                    passport_section.style.display = 'block';
                                    passport.setAttribute('required','');
                                    ic1.removeAttribute('required');
                                    ic2.removeAttribute('required');
                                    ic3.removeAttribute('required');
                                    ic1.value = '';
                                    ic2.value = '';
                                    ic3.value = '';
                                }else{
                                    ic_section.style.removeProperty('display');
                                    passport_section.style.display = 'none';
                                    passport.removeAttribute('required');
                                    ic1.setAttribute('required','');
                                    ic2.setAttribute('required','');
                                    ic3.setAttribute('required','');
                                    passport.value = '';
                                }
                            }
                        </script>
                        {{-- end script --}}
                        {{-- race, religion, nationality --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.race') }}, {{ __('inputFields.religion') }} & {{ __('inputFields.nationality') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="race" class="form-label">{{ __('inputFields.race') }}<span class="text-danger">*</span></label>
                                        <select name="race_id" id="race" class="form-select" required>
                                            <option value="{{ $data['applicant_profile']->race_id }}" selected hidden>{{ $data['applicant_profile']->race['name'] }}</option>
                                            @foreach ($data['getRaces'] as $race)
                                                <option value="{{ $race->id }}">{{ $race->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="religion" class="form-label">{{ __('inputFields.religion') }}<span class="text-danger">*</span></label>
                                        <select name="religion_id" id="religion" class="form-select" required>
                                            <option value="{{ $data['applicant_profile']->religion_id }}" selected hidden>{{ $data['applicant_profile']->religion['name'] }}</option>
                                            @foreach ($data['getReligions'] as $religion)
                                                <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="nationality" class="form-label">{{ __('inputFields.nationality') }}<span class="text-danger">*</span></label>
                                        <select name="nationality_id" id="nationality" class="form-select" required>
                                            <option value="{{ $data['applicant_profile']->nationality_id }}" selected hidden>{{ $data['applicant_profile']->nationality['name'] }}</option>
                                            <option value="131">Malaysia</option>
                                            <option value="161">Non-Malaysian</option>
                                        </select>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end race, religion, nationality --}}   
                        {{-- birth date, age, place of birth --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.bd') }}, {{ __('inputFields.age') }} & {{ __('inputFields.pob') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="birth_date" class="form-label">{{ __('inputFields.bd') }}<span class="text-danger">*</span></label>
                                        <input type="date" name="birth_date" id="birth_date" class="form-control" value="{{ $data['applicant_profile']->birth_date }}" onchange="ageCalculator()" max="<?= date('Y-m-d'); ?>">
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="age" class="form-label">{{ __('inputFields.age') }}</label>
                                        <input type="text" name="age" id="age" value="" class="form-control" disabled>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="place_of_birth" class="form-label">{{ __('inputFields.pob') }}<span class="text-danger">*</span></label>
                                        <select name="place_of_birth" id="place_of_birth" class="form-select" required>
                                            <option value="{{ $data['applicant_profile']->place_of_birth }}" selected hidden>{{ $data['applicant_profile']->place_of_birth }}</option>
                                            <option value="Johor">Johor</option>
                                            <option value="Kedah">Kedah</option>
                                            <option value="Kelantan">Kelantan</option>
                                            <option value="Kuala Lumpur">Kuala Lumpur</option>
                                            <option value="Labuan">Labuan</option>
                                            <option value="Malacca">Malacca</option>
                                            <option value="Negeri Sembilan">Negeri Sembilan</option>
                                            <option value="Pahang">Pahang</option>
                                            <option value="Penang">Penang</option>
                                            <option value="Perak">Perak</option>
                                            <option value="Perlis">Perlis</option>
                                            <option value="Sabah">Sabah</option>
                                            <option value="Sarawak">Sarawak</option>
                                            <option value="Selangor">Selangor</option>
                                            <option value="Terengganu">Terengganu</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end birth date, age, place of birth  --}}    
                        {{-- script --}}
                        <script>
                            ageCalculator();
                            function ageCalculator(){
                                var user_input = document.getElementById('birth_date').value;
                                var date_of_birth = new Date(user_input);
                                
                                if(user_input!=null || user_input!='' || user_input!=undefined){
                                    var month_diff = Date.now() - date_of_birth.getTime();
                                    var age_df = new Date(month_diff);
                                    var year = age_df.getUTCFullYear();
                                    var age = Math.abs(year - 1970);
                                    return document.getElementById("age").value = age;
                                }else{
                                    return false;
                                }
                            }
                        </script>
                        {{-- end script --}}   
                        {{-- gender, marital --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.gender') }} & {{ __('inputFields.ms') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-2">
                                    <div class="col-md">
                                        <label for="gender" class="form-label">{{ __('inputFields.gender') }}<span class="text-danger">*</span></label>
                                        <div class="d-flex flex-row mb-3 me-3">
                                            @foreach ($data['getGenders'] as $gender)
                                                @if ($gender->id == 1)
                                                    <div class="form-check-label me-4" for="gender">
                                                        <input type="radio" name="gender_id" id="gender1" class="form-check-input" value="{{ $gender->id }}" {{ $data['applicant_profile']->gender_id == '1' ? 'checked' : ''}}>
                                                        <span class="ms-4">{{ $gender->name }}</span>
                                                    </div>
                                                @else
                                                    <div class="form-check-label me-4" for="gender">
                                                        <input type="radio" name="gender_id" id="gender1" class="form-check-input" value="{{ $gender->id }}" {{ $data['applicant_profile']->gender_id == '2' ? 'checked' : ''}}>
                                                        <span class="ms-4">{{ $gender->name }}</span>
                                                    </div> 
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <label for="marital" class="form-label">{{ __('inputFields.ms') }}<span class="text-danger">*</span></label>
                                        <select name="marital_id" id="marital" class="form-select" required>
                                            <option value="{{ $data['applicant_profile']->marital_id }}" selected hidden>{{ $data['applicant_profile']->marital['name'] }}</option>
                                            @foreach ($data['getMaritals'] as $marital)
                                                <option value="{{ $marital->id }}">{{ $marital->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end gender marital --}}   
                        {{-- contact --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.contact') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="email" class="form-label">{{ __('inputFields.email') }}<span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ $data['user_detail']->email }}" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="tel_hp" class="form-label">{{ __('inputFields.tel_hp') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="tel_hp" id="tel_hp" class="form-control" value="{{ $data['user_detail']->tel_hp }}" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="tel_h" class="form-label">{{ __('inputFields.tel_h') }}</label>
                                        <input type="text" name="tel_h" id="tel_h" class="form-control" value="{{ $data['user_detail']->tel_h }}" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end contact --}}   
                        {{-- correspondence address --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.c_address') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="c_street1" class="form-label">{{ __('inputFields.address1') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="c_street1" id="c_street1" class="form-control" value="{{ $data['c_address']->street1 }}" onkeyup="if (/[^|A-Za-z0-9/.\s,]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9/.\s,]+/g,'')" placeholder="{{ __('inputFields.address1_placeholder') }}" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="c_street2" class="form-label">{{ __('inputFields.address2') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="c_street2" id="c_street2" class="form-control" value="{{ $data['c_address']->street2 }}" onkeyup="if (/[^|A-Za-z0-9/.\s,]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9/.\s,]+/g,'')" placeholder="{{ __('inputFields.address2_placeholder') }}" required>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="c_zipcode" class="form-label">{{ __('inputFields.zipcode') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="c_zipcode" id="c_zipcode" class="form-control" value="{{ $data['c_address']->zipcode }}" minlength="5" maxlength="5" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="c_city" class="form-label">{{ __('inputFields.city') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="c_city" id="c_city" class="form-control" value="{{ $data['c_address']->city }}" onkeyup="if (/[^|A-Za-z/.\s]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z/.\s]+/g,'')" required>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="c_state" class="form-label">{{ __('inputFields.state') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="c_state" id="c_state" class="form-control" value="{{ $data['c_address']->state }}" onkeyup="if (/[^|A-Za-z/.\s]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z/.\s]+/g,'')" required>
                                    </div>
                                    <div class="col-md">
                                        <label for="c_country" class="form-label">{{ __('inputFields.country') }}<span class="text-danger">*</span></label>
                                        <select name="c_country_id" id="c_country" class="form-select" required>
                                            <option value="{{ $data['c_address']->country_id }}" selected hidden>{{ $data['c_address']->country['name'] }}</option>
                                            @foreach ($data['getCountries'] as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end correspondence address --}}     
                        {{-- permanent address --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.p_address') }}</h4>
                                <div class="form-check mb-2 mt-2">
                                    <input class="form-check-input" type="checkbox" id="sameAbove" onclick="copyAddress()">
                                    <label class="form-check-label" for="sameAbove">
                                        {{ __('inputFields.p_address_checkbox') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="p_street1" class="form-label">{{ __('inputFields.address1') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_street1" id="p_street1" class="form-control" value="{{ $data['p_address']->street1 }}" onkeyup="if (/[^|A-Za-z0-9/.\s,]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9/.\s,]+/g,'')" placeholder="{{ __('inputFields.address1_placeholder') }}" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="p_street2" class="form-label">{{ __('inputFields.address2') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_street2" id="p_street2" class="form-control" value="{{ $data['p_address']->street2 }}" onkeyup="if (/[^|A-Za-z0-9/.\s,]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9/.\s,]+/g,'')" placeholder="{{ __('inputFields.address2_placeholder') }}" required>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="p_zipcode" class="form-label">{{ __('inputFields.zipcode') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_zipcode" id="p_zipcode" class="form-control" value="{{ $data['p_address']->zipcode }}" minlength="5" maxlength="5" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="p_city" class="form-label">{{ __('inputFields.city') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_city" id="p_city" class="form-control" value="{{ $data['p_address']->city }}" onkeyup="if (/[^|A-Za-z/.\s]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z/.\s]+/g,'')" required>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="p_state" class="form-label">{{ __('inputFields.state') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_state" id="p_state" class="form-control" value="{{ $data['p_address']->state }}" onkeyup="if (/[^|A-Za-z/.\s]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z/.\s]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="p_country" class="form-label">{{ __('inputFields.country') }}<span class="text-danger">*</span></label>
                                        <select name="p_country_id" id="p_country" class="form-select" required>
                                            <option value="{{ $data['p_address']->country_id }}" selected hidden>{{ $data['p_address']->country['name'] }}</option>
                                            @foreach ($data['getCountries'] as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end permanent address --}}  
                        {{-- script --}}
                        <script>
                            // sameabove
                            function copyAddress(){
                                var c_street1 = document.getElementById('c_street1');
                                var c_street2 = document.getElementById('c_street2');
                                var c_zipcode = document.getElementById('c_zipcode');
                                var c_city = document.getElementById('c_city');
                                var c_state = document.getElementById('c_state');
                                var c_country = document.getElementById('c_country');

                                var p_street1 = document.getElementById('p_street1');
                                var p_street2 = document.getElementById('p_street2');
                                var p_zipcode = document.getElementById('p_zipcode');
                                var p_city = document.getElementById('p_city');
                                var p_state = document.getElementById('p_state');
                                var p_country = document.getElementById('p_country');

                                const sameAbove = document.getElementById('sameAbove');
                                if(sameAbove.checked){
                                    p_street1.value = c_street1.value;
                                    p_street2.value = c_street2.value;
                                    p_zipcode.value = c_zipcode.value;
                                    p_city.value = c_city.value;
                                    p_state.value = c_state.value;
                                    p_country.value = c_country.value;
                                }else if(sameAbove.checked == false){
                                    p_street1.value = '';
                                    p_street2.value = '';
                                    p_zipcode.value = '';
                                    p_city.value = '';
                                    p_state.value = '';
                                    p_country.value = '';
                                }
                            }
                        </script>
                        {{-- end script --}} 
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
{{-- end edit personal particulars modal --}}

{{-- edit parent/guardian particulars modal --}}
<div class="modal fade" id="editParentGuardianParticularsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editParentGuardianParticularsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <form action="{{ route('parentGuardianParticulars.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="editParentGuardianParticularsModalLabel">Edit parent/guardian particulars</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <input type="hidden" name="guardian_detail_id" value="{{ $data['guardian_detail']->id }}">
                        <input type="hidden" name="user_detail_id" value="{{ $data['guardian_user_detail']->id }}">
                        <input type="hidden" name="p_address_id" value="{{ $data['pg_p_address']->id }}">
                        {{-- name --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.pg_name') }}</h4>
                                <p class="text-secondary">{{ __('inputFields.hint_for_pg_name') }}</p>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-2">
                                    <div class="col-md mb-3">
                                        <label for="en_name" class="form-label">{{ __('inputFields.en_name') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="en_name" id="en_name" class="form-control text-capitalize" value="{{ $data['guardian_user_detail']->en_name }}" onkeyup="if (/[^|A-Za-z0-9\s/.]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/.]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="ch_name" class="form-label">{{ __('inputFields.ch_name') }}</label>
                                        <input type="text" name="ch_name" id="ch_name" class="form-control" value="{{ $data['guardian_user_detail']->ch_name }}">
                                    </div>
                                </div>   
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end name --}}
                        {{-- ic / passport --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.ic_or_passport') }}</h4>
                                <p class="text-secondary">{{ __('inputFields.hint_for_ic_or_passport') }}</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="changeInput" onclick="changeInputMethod()">
                                    <label class="form-check-label" for="changeInput">
                                        {{ __('inputFields.ic_or_passport_checkbox') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row" id="ic_section">
                                    <label for="ic" class="form-label">{{ __('inputFields.ic') }}<span class="text-danger">*</span></label>
                                    <div class="col-md d-flex flex-row align-items-center mb-3">
                                        <input type="text" name="ic1" id="pg_ic1" class="form-control" placeholder="" minlength="6" maxlength="6" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                        <span class="ms-4">-</span>
                                    </div>
                                    <div class="col-md d-flex flex-row align-items-center mb-3">
                                        <input type="text" name="ic2" id="pg_ic2" class="form-control" placeholder="" minlength="2" maxlength="2" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                        <span class="ms-4">-</span>
                                    </div>
                                    <div class="col-md mb-3">
                                        <input type="text" name="ic3" id="pg_ic3" class="form-control" placeholder="" minlength="4" maxlength="4" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                </div>
                                <div class="row" id="passport_section" style="display: none;">
                                    <label for="ic" class="form-label">{{ __('inputFields.passport') }}<span class="text-danger">*</span></label>
                                    <div class="col-md mb-3">
                                        <input type="text" name="passport" id="pg_passport" class="form-control" placeholder="" onkeyup="if (/[^|A-Za-z0-9-]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9-]+/g,'')">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end ic / passport --}}
                        {{-- script --}}
                        <script>
                            const pg_text = document.getElementById('read_pg_ic').innerHTML;
                            const pg_myArray = pg_text.split("-");
                            const pg_changeInput = document.getElementById('changeInput');
                            const pg_ic_section = document.getElementById('ic_section');
                            const pg_passport_section = document.getElementById('passport_section');
                            const pg_ic1 = document.getElementById('pg_ic1');
                            const pg_ic2 = document.getElementById('pg_ic2');
                            const pg_ic3 = document.getElementById('pg_ic3');
                            const pg_passport = document.getElementById('pg_passport');

                            if(pg_myArray.length != 3){
                                document.getElementById("pg_passport").value = pg_myArray[0];
                                pg_changeInput.checked = true;
                                pg_ic_section.style.display = 'none';
                                pg_passport_section.style.display = 'block';
                            }else{
                                document.getElementById("pg_ic1").value = pg_myArray[0]; 
                                document.getElementById("pg_ic2").value = pg_myArray[1]; 
                                document.getElementById("pg_ic3").value = pg_myArray[2]; 

                            }

                            function changeInputMethod(){
                                if(pg_changeInput.checked){
                                    pg_ic_section.style.display = 'none';
                                    pg_passport_section.style.display = 'block';
                                    pg_passport.setAttribute('required','');
                                    pg_ic1.removeAttribute('required');
                                    pg_ic2.removeAttribute('required');
                                    pg_ic3.removeAttribute('required');
                                    pg_ic1.value = '';
                                    pg_ic2.value = '';
                                    pg_ic3.value = '';

                                }else{
                                    pg_ic_section.style.removeProperty('display');
                                    pg_passport_section.style.display = 'none';
                                    pg_passport.removeAttribute('required');
                                    pg_ic1.setAttribute('required','');
                                    pg_ic2.setAttribute('required','');
                                    pg_ic3.setAttribute('required','');
                                    pg_passport.value = '';
                                }
                            }
                        </script>
                        {{-- end script --}}
                        {{-- relationship, nationality --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.relationship') }} & {{ __('inputFields.nationality') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="relationship" class="form-label">{{ __('inputFields.relationship') }}<span class="text-danger">*</span></label>
                                        <select name="guardian_relationship_id" id="relationship" class="form-select" required>
                                            <option value="{{ $data['guardian_detail']->guardian_relationship_id }}" selected hidden>{{ $data['guardian_detail']->guardianRelationship['name'] }}</option>
                                            @foreach ($data['getRelationships'] as $relationship)
                                                <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="nationality" class="form-label">{{ __('inputFields.nationality') }}<span class="text-danger">*</span></label>
                                        <select name="nationality_id" id="nationality" class="form-select" required>
                                            <option value="{{ $data['guardian_detail']->nationality_id }}" selected hidden>{{ $data['guardian_detail']->nationality['name'] }}</option>
                                            @foreach ($data['getNationalities'] as $nationality)
                                                <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end relationship, nationality --}}
                        {{-- occupation, family income --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.occupation') }} & {{ __('inputFields.income') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="occupation" class="form-label">{{ __('inputFields.occupation') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="occupation" id="occupation" class="form-control" value="{{ $data['guardian_detail']->occupation }}" onkeyup="if (/[^|A-Za-z0-9\s/.]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/.]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="income" class="form-label">{{ __('inputFields.income_range') }}<span class="text-danger">*</span></label>
                                        <select name="income_id" id="income" class="form-select" required>
                                            <option value="{{ $data['guardian_detail']->income_id }}" selected hidden>{{ $data['guardian_detail']->income['range'] }}</option>
                                            @foreach ($data['getIncomes'] as $income)
                                                <option value="{{ $income->id }}">{{ $income->range }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end occupation, family income --}}
                        {{-- contact --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.contact') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md mb-3">
                                        <label for="tel_hp" class="form-label">{{ __('inputFields.tel_hp') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="tel_hp" id="tel_hp" class="form-control" value="{{ $data['guardian_user_detail']->tel_hp }}" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')"  required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="email" class="form-label">{{ __('inputFields.email') }}</label>
                                        <input type="text" name="email" id="email" class="form-control" value="{{ $data['guardian_user_detail']->email }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end contact --}}
                        {{-- permanent address --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('inputFields.p_address') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="p_street1" class="form-label">{{ __('inputFields.address1') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_street1" id="pg_p_street1" class="form-control" value="{{ $data['pg_p_address']->street1 }}" onkeyup="if (/[^|A-Za-z0-9/.\s,]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9/.\s,]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="p_street2" class="form-label">{{ __('inputFields.address2') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_street2" id="pg_p_street2" class="form-control" value="{{ $data['pg_p_address']->street2 }}" onkeyup="if (/[^|A-Za-z0-9/.\s,]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9/.\s,]+/g,'')" required>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="p_zipcode" class="form-label">{{ __('inputFields.zipcode') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_zipcode" id="pg_p_zipcode" class="form-control" value="{{ $data['pg_p_address']->zipcode}}" minlength="5" maxlength="5" onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="p_city" class="form-label">{{ __('inputFields.city') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_city" id="pg_p_city" class="form-control" value="{{ $data['pg_p_address']->city }}" onkeyup="if (/[^|A-Za-z/.\s]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z/.\s]+/g,'')" required>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="p_state" class="form-label">{{ __('inputFields.state') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_state" id="pg_p_state" class="form-control" value="{{ $data['pg_p_address']->state }}" onkeyup="if (/[^|A-Za-z/.\s]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z/.\s]+/g,'')" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="p_country" class="form-label">{{ __('inputFields.country') }}<span class="text-danger">*</span></label>
                                        <select name="p_country_id" id="pg_p_country" class="form-select" required>
                                            <option value="{{ $data['pg_p_address']->country_id }}" selected hidden>{{ $data['pg_p_address']->country['name'] }}</option>
                                            @foreach ($data['getCountries'] as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end permanent address --}}
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
                                            @foreach ($data['getRelationships'] as $relationship)
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
                                            @foreach ($data['getRelationships'] as $relationship)
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
                    <div class="container-fluid">
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

{{-- edit academic record modal --}}
<div class="modal fade" id="editAcademicDetailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editAcademicDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <form action="{{ route('academicDetail.update',['id' => Crypt::encrypt($APPLICATION_RECORD_ID)]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="editAcademicDetailModalLabel">Edit status of health</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="table-primary">
                                            <tr>
                                                <th scope="col">School Level</th>
                                                <th scope="col">School Name</th>
                                                <th scope="col">Year Graduation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($i = 0; $i < count($data['getSchoolLevels']); $i++)
                                                <tr>
                                                    <th scope="row">
                                                        {{ $data['getSchoolLevels'][$i]->name }}
                                                        <input type="hidden" name="school_level_id[]" value="{{ $data['getSchoolLevels'][$i]->id }}">
                                                    </th>
                                                    @if ($data['getAllAcademicRecord'][$i]->status == 1)
                                                        <td>
                                                            <input onkeyup="if (/[^|A-Za-z0-9\s/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/]+/g,'')"  maxlength="50" type="text" name="school_name[]" id="school_name[{{ $data['getSchoolLevels'][$i]->id }}]" class="form-control" value="{{ $data['getAllAcademicRecord'][$i]->school_name }}">
                                                        </td>
                                                        <td>
                                                            <input onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" maxlength="4" type="text" name="school_graduation[]" id="school_graduation[{{ $data['getSchoolLevels'][$i]->id }}]" class="form-control" value="{{ $data['getAllAcademicRecord'][$i]->school_graduation }}">
                                                        </td>
                                                    @else
                                                        <td>
                                                            <input onkeyup="if (/[^|A-Za-z0-9\s/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/]+/g,'')"  maxlength="50" type="text" name="school_name[]" id="school_name[{{ $data['getSchoolLevels'][$i]->id }}]" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" maxlength="4" type="text" name="school_graduation[]" id="school_graduation[{{ $data['getSchoolLevels'][$i]->id }}]" class="form-control">
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
{{-- end edit academic record modal --}}

{{-- edit status of health --}}
<div class="modal fade" id="editStatusOfHealthModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editStatusOfHealthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <form action="{{ route('statusOfHealth.update',['id' => Crypt::encrypt($APPLICATION_RECORD_ID)]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="editStatusOfHealthModalLabel">Edit academic record</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="table-primary">
                                            <tr>
                                                <th scope="col">Type of Disease</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">If 'Yes', Please state</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($i = 0; $i < count($data['getDiseases']); $i++)
                                                <tr>
                                                    <th scope="row">
                                                        {{ $data['getDiseases'][$i]->name }}
                                                        <input type="hidden" name="disease_id[]" value="{{ $data['getDiseases'][$i]->id }}">
                                                    </th>
                                                    <td>
                                                        <select name="disease_status[]" id="disease_status[{{ $data['getDiseases'][$i]->id }}]" class="form-select" onchange="setRequired(this,'disease_remark[{{ $data['getDiseases'][$i]->id }}]')">
                                                            @if ($data['status_of_health'][$i]->disease_status == 0)
                                                                <option value="0" selected hidden>No</option>
                                                            @else
                                                                <option value="1" selected hidden>Yes</option>
                                                            @endif
                                                            <option value="0">No</option>
                                                            <option value="1">Yes</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        @if ($data['status_of_health'][$i]->disease_remark == null)
                                                            <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="disease_remark[]" id="disease_remark[{{ $data['getDiseases'][$i]->id }}]" class="form-control">
                                                        @else
                                                            <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="disease_remark[]" id="disease_remark[{{ $data['getDiseases'][$i]->id }}]" class="form-control" value="{{ $data['status_of_health'][$i]->disease_remark }}">
                                                        @endif
                                                    </td>  
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
<script>
    // 1 = no, 2 = yes 
    // refer to dropdown above
    function setRequired(select,remark_id){
        (select.value == 1)?document.getElementById(remark_id).setAttribute('required',''):document.getElementById(remark_id).removeAttribute('required');
        document.getElementById(remark_id).value='';
    }
</script>
{{-- end edit status of health --}}
@endsection