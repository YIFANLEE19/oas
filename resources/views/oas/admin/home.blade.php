@extends('oas.layouts.superadmin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h1>Admin Dashboard</h1>
                <p class="lead">Welcome, {{ Auth::user()->name }}({{ Auth::user()->role['name'] }})</p>
            </div>
        </div>
    </div>
    
    {{-- tabs - AFO --}}
    @if(Auth::user()->role['name'] == 'AFO')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>AFO</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Payment Slip</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Others</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="container-fluid">
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <table class="table align-middle" id="afoHomeTable">
                                        <thead class="table-primary">
                                            <tr>
                                                <th scope="col">English Name</th>
                                                <th scope="col">Tempcode</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="container-fluid">
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <table class="table align-middle" id="paymentSlipTable">
                                        <thead class="table-primary">
                                            <tr>
                                                <th scope="col">English Name</th>
                                                <th scope="col">IC</th>
                                                <th scope="col">Payment Slip</th>
                                                <th scope="col">Form</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($i = 0; $i < count($getAllApplicationStatusLogs); $i++)
                                                <tr>
                                                    <th scope="row">
                                                        {{ $getAllUserDetails[$i]->en_name }}
                                                    </th>
                                                    <td>{{ $getAllUserDetails[$i]->ic }}</td>
                                                    <td><a href="{{ Storage::url('images/paymentSlip/'.Crypt::decrypt($getPaymentSlip[$i]->payment_slip)) }}" target="_blank">Click for preview</a></td>
                                                    <td>
                                                        <a href="{{ route('applicationForm.home',['id'=> Crypt::encrypt($getAllApplicationRecordIds[$i]->application_record_id)]) }}" class="btn btn-success" target="_blank"><i class="bi bi-file-earmark-richtext"></i>here</a>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-warning px-2 py-2">Pending verify</span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('dataflow',['id'=>Crypt::encrypt($getAllApplicationRecordIds[$i]->application_record_id)]) }}" class="btn btn-success me-2 mb-2">Already Paid</a>
                                                        <button class="btn btn-outline-danger me-2 mb-2">Reject</button>
                                                    </td>
                                                </tr>   
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    {{-- end tabs --}}

    {{-- datatables --}}
    <script>
        $(document).ready(function () {
            $('#paymentSlipTable').DataTable();
            $('#afoHomeTable').DataTable();
        });
    </script>
    {{-- end datatables --}}


    {{-- tabs --}}
    @if (Auth::user()->role['name'] == 'Superadmin')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-programme-tab" data-bs-toggle="tab" data-bs-target="#nav-programme" type="button" role="tab" aria-controls="nav-programme" aria-selected="true">Programme</button>
                        <button class="nav-link" id="nav-others-tab" data-bs-toggle="tab" data-bs-target="#nav-others" type="button" role="tab" aria-controls="nav-others" aria-selected="false">Others</button>
                        <button class="nav-link" id="nav-account-tab" data-bs-toggle="tab" data-bs-target="#nav-account" type="button" role="tab" aria-controls="nav-account" aria-selected="false">Account</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-programme" role="tabpanel" aria-labelledby="nav-programme-tab">
                        <div class="container">
                            <div class="row mt-4 mb-2">
                                <div class="col-md-12">
                                    <h1>Programme settings</h1>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="alert alert-warning" role="alert">
                                        <h4 class="alert-heading">Open offered courses</h4>
                                        <ol>
                                            <li>Please ensure that there is a corresponding year and semester in "semester year mapping"</li>
                                            <li>Then select the courses you want to offer under "Programme offer"</li>
                                        </ol>
                                        <hr>
                                        <p class="mb-0">You can manage and view all courses in "Programme"</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow bg-primary text-light">
                                        <div class="card-body">
                                            <h5 class="card-title">Programme</h5>
                                            <a href="{{ route('programme.home') }}" class="btn btn-outline-light">Go</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow bg-primary text-light">
                                        <div class="card-body">
                                            <h5 class="card-title">Programme offer</h5>
                                            <a href="{{ route('programmeOffer.home') }}" class="btn btn-outline-light">Go</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow bg-primary text-light">
                                        <div class="card-body">
                                            <h5 class="card-title">Semester Year Mapping</h5>
                                            <a href="{{ route('semesterYearMapping.home') }}" class="btn btn-outline-light">Go</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow bg-primary text-light">
                                        <div class="card-body">
                                            <h5 class="card-title">Programme Level</h5>
                                            <a href="{{ route('programmeLevel.home') }}" class="btn btn-outline-light">Go</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow bg-primary text-light">
                                        <div class="card-body">
                                            <h5 class="card-title">Programme Type</h5>
                                            <a href="{{ route('programmeType.home') }}" class="btn btn-outline-light">Go</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow bg-primary text-light">
                                        <div class="card-body">
                                            <h5 class="card-title">Semester</h5>
                                            <a href="{{ route('semester.home') }}" class="btn btn-outline-light">Go</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-others" role="tabpanel" aria-labelledby="nav-others-tab">
                        <div class="container">
                            <div class="row mt-4 mb-2">
                                <div class="col-md-12">
                                    <h1>Others</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow border border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Address type</h5>
                                            <a href="{{ route('addressType.home') }}" class="btn btn-primary">Go</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow border border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Application Status</h5>
                                            <a href="{{ route('applicationStatus.home') }}" class="btn btn-primary">Go</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow border border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Country</h5>
                                            <a href="{{ route('country.home') }}" class="btn btn-primary">Go</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow border border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Health of Condition</h5>
                                            <a href="{{ route('disease.home') }}" class="btn btn-primary">Go</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow border border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Gender</h5>
                                            <a href="{{ route('gender.home') }}" class="btn btn-primary">Go</a>
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow border border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Relationship</h5>
                                            <a href="{{ route('guardianRelationship.home') }}" class="btn btn-primary">Go</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow border border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Income range</h5>
                                            <a href="{{ route('income.home') }}" class="btn btn-primary">Go</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow border border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Marital</h5>
                                            <a href="{{ route('marital.home') }}" class="btn btn-primary">Go</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow border border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Nationality</h5>
                                            <a href="{{ route('nationality.home') }}" class="btn btn-primary">Go</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow border border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Race</h5>
                                            <a href="{{ route('race.home') }}" class="btn btn-primary">Go</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow border border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Religion</h5>
                                            <a href="{{ route('religion.home') }}" class="btn btn-primary">Go</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow border border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">School Level</h5>
                                            <a href="{{ route('schoolLevel.home') }}" class="btn btn-primary">Go</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow border border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Applicant Profile Status</h5>
                                            <a href="{{ route('applicantProfileStatus.home') }}" class="btn btn-primary">Go</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow border border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Identity document type</h5>
                                            <a href="{{ route('identityDocumentType.home') }}" class="btn btn-primary">Go</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                        <div class="container">
                            <div class="row mt-4 mb-2">
                                <div class="col-md-12">
                                    <h1>Manage account</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow bg-success text-light">
                                        <div class="card-body">
                                            <h5 class="card-title">Admin account</h5>
                                            <a href="{{ route('adminAccount.home') }}" class="btn btn-outline-light">Go</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow bg-success text-light">
                                        <div class="card-body">
                                            <h5 class="card-title">Account status</h5>
                                            <a href="{{ route('accStatus.home') }}" class="btn btn-outline-light">Go</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow bg-success text-light">
                                        <div class="card-body">
                                            <h5 class="card-title">Role</h5>
                                            <a href="{{ route('role.home') }}" class="btn btn-outline-light">Go</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    {{-- end tabs --}}
@endsection