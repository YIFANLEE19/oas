@extends('oas.layouts.superadmin')

@section('content')

    <div class="container">
        {{-- header --}}
        <div class="row">
            <div class="col-xl-12">
                <h1>Manage</h1>
                <p>Something here...</p>
            </div>
        </div>
        {{-- end header --}}

        <div class="row">
            {{-- accStatus --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Account status</h5>
                        <a href="{{ route('accStatus.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end accStatus --}}
            {{-- addressType --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Address type</h5>
                        <a href="{{ route('addressType.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end addressType --}}
            {{-- admin account --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Admin account</h5>
                        <a href="{{ route('adminAccount.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end admin account --}}
            {{-- applicationStatus --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Application Status</h5>
                        <a href="{{ route('applicationStatus.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end applicationStatus --}}
            {{-- country --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Country</h5>
                        <a href="{{ route('country.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end country --}}
            {{-- Disease --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Health of Condition</h5>
                        <a href="{{ route('disease.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end Disease --}}
            {{-- gender --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Gender</h5>
                        <a href="{{ route('gender.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end gender --}}
            {{-- guardian relationship --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Relationship</h5>
                        <a href="{{ route('guardianRelationship.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end guardian relationship --}}
            {{-- income --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Income range</h5>
                        <a href="{{ route('income.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end income --}}
            {{-- marital --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Marital</h5>
                        <a href="{{ route('marital.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end marital --}}
            {{-- nationality --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Nationality</h5>
                        <a href="{{ route('nationality.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end nationality --}}
            {{-- race --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Race</h5>
                        <a href="{{ route('race.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end race --}}
            {{-- religion --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Religion</h5>
                        <a href="{{ route('religion.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end religion --}}
            {{-- role --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Role</h5>
                        <a href="{{ route('role.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end role --}}
            {{-- school level --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">School Level</h5>
                        <a href="{{ route('schoolLevel.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end school level --}}
            {{-- programme level --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Programme Level</h5>
                        <a href="{{ route('programmeLevel.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end programme level --}}
            {{-- programme type --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Programme Type</h5>
                        <a href="{{ route('programmeType.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end programme type --}}
            {{-- applicantProfileStatus --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Applicant Profile Status</h5>
                        <a href="{{ route('applicantProfileStatus.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end applicantProfileStatus --}}
            {{-- semester --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Semester</h5>
                        <a href="{{ route('semester.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end semester --}}
            {{-- semester year mapping --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Semester Year Mapping</h5>
                        <a href="{{ route('semesterYearMapping.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end semester year mapping --}}
            {{-- programme --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Programme</h5>
                        <a href="{{ route('programme.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end programme --}}
            {{-- programme offered --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Programme offer</h5>
                        <a href="{{ route('programmeOffer.home') }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            {{-- end programme offered --}}
        </div>
    </div>

@endsection