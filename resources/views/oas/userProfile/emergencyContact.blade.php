@extends('oas.layouts.app')

@section('content')
    
    {{-- modal --}}
    <style>
        .modal-backdrop {
            background-color: rgb(50, 47, 47);
        }
    </style>

    @if(Session::has('status_code') && Session::get('status_code') == 3)
        <script>
            $(function(){
                $('#statusCode3Modal').modal('show');
            });
        </script>        
    @endif

    @if ($status_code == 0)
        <script>
            $(function(){
                $('#statusCode0Modal').modal('show');
            });
        </script>
    @elseif($status_code == 1)
        <script>
            $(function(){
                $('#statusCode1Modal').modal('show');
            });
        </script>
    @elseif($status_code == 3)
        <script>
            $(function(){
                $('#statusCode3Modal').modal('show');
            });
        </script>
    @endif
    {{-- status 0 = personal particulars X --}}
    <div class="modal fade" id="statusCode0Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode0ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="statusCode0ModalLabel">Oops!</h1>
                </div>
                <div class="modal-body">
                    <p>Dear user, you haven't filled in the <span class="fw-bold">personal particulars</span>, so you can't go to the next step until you fill them in.</p>
                    <p>If you want to go ahead and fill in the <span class="fw-bold">personal particulars</span> please click <span class="fw-bold">Continue</span></p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-secondary">Back to home page</a>
                    <a href="{{ route('personalParticulars.home') }}" type="button" class="btn btn-primary">Continue</a>
                </div>
            </div>
        </div>
    </div>
    {{-- status 1 = personal particulars / AND parent guardian particulars X --}}
    <div class="modal fade" id="statusCode1Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode1ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="statusCode1ModalLabel">Oops!</h1>
                </div>
                <div class="modal-body">
                    <p>Dear user, you haven't filled in the <span class="fw-bold">parent / guardian particulars</span>, so you can't go to the next step until you fill them in.</p>
                    <p>If you want to go ahead and fill in the <span class="fw-bold">parent / guardian particulars</span> please click <span class="fw-bold">Continue</span></p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-secondary">Back to home page</a>
                    <a href="{{ route('parentGuardianParticulars.home') }}" type="button" class="btn btn-primary">Continue</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="statusCode3Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode3ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="statusCode3ModalLabel">Thank you!</h1>
                </div>
                <div class="modal-body">
                    <p>We have received your<span class="fw-bold">emergency contact</span>. You will also need to submit a personal photo to apply for the programme.</p>
                    <p>If you want to go ahead and upload your <span class="fw-bold">profile picture</span> please click <span class="fw-bold">Continue</span></p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">Back to home page</a>
                    <a href="{{ route('profilePicture.home') }}" type="button" class="btn btn-primary">Continue</a>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}

    {{-- header --}}
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="border-bottom">
                    <h1 class="fw-bold">Emergency Contact</h1>
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                          <li class="breadcrumb-item active fw-bold" aria-current="page">Emergency contact</li>
                        </ol>
                    </nav>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-label="Default striped example" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Step 3: Emergency Contact</div>
                        <span class="ms-4">Next : Profile picture</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end header --}}

    {{-- alert message --}}
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">Kindly remind!</h4>
                    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    {{-- end alert message --}}

    {{-- form --}}
    <div class="container">
        <form action="{{ route('emergencyContact.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- person 1 --}}
            <div class="row d-flex flex-row mt-4">
                <div class="col-md-4">
                    <h4 class="fw-bold">Person 1</h4>
                    <p class="text-secondary"></p>
                </div>
                <div class="col-md-8">
                    <div class="row g-2">
                        <div class="col-md mb-3">
                            <label for="en_name" class="form-label">English Name<span class="text-danger">*</span></label>
                            <input type="text" name="en_name1" id="en_name1" class="form-control text-capitalize" placeholder="" required>
                        </div>
                        <div class="col-md mb-3">
                            <label for="ch_name" class="form-label">Chinese Name</label>
                            <input type="text" name="ch_name1" id="ch_name1" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md mb-3">
                            <label for="relationship" class="form-label">Relationship</label>
                            <select name="guardian_relationship_id1" id="relationship1" class="form-select" required>
                                <option selected disabled>Choose relationship</option>
                                @foreach ($allRelationships as $relationship)
                                    <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md mb-3">
                            <label for="tel_hp" class="form-label">Tel No. (H/P)<span class="text-danger">*</span></label>
                            <input type="text" name="tel_hp1" id="tel_hp1" class="form-control" placeholder="" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom mt-4 mb-4"></div>
            {{-- end person 1 --}}
            {{-- person 2 --}}
            <div class="row d-flex flex-row mt-4">
                <div class="col-md-4">
                    <h4 class="fw-bold">Person 2</h4>
                    <p class="text-secondary"></p>
                </div>
                <div class="col-md-8">
                    <div class="row g-2">
                        <div class="col-md mb-3">
                            <label for="en_name" class="form-label">English Name<span class="text-danger">*</span></label>
                            <input type="text" name="en_name2" id="en_name2" class="form-control text-capitalize" placeholder="" required>
                        </div>
                        <div class="col-md mb-3">
                            <label for="ch_name" class="form-label">Chinese Name</label>
                            <input type="text" name="ch_name2" id="ch_name2" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md mb-3">
                            <label for="relationship" class="form-label">Relationship</label>
                            <select name="guardian_relationship_id2" id="relationship2" class="form-select" required>
                                <option selected disabled>Choose relationship</option>
                                @foreach ($allRelationships as $relationship)
                                    <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md mb-3">
                            <label for="tel_hp" class="form-label">Tel No. (H/P)<span class="text-danger">*</span></label>
                            <input type="text" name="tel_hp2" id="tel_hp2" class="form-control" placeholder="" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom mt-4 mb-4"></div>
            {{-- end person 2 --}}
            {{-- form submit --}}
            @if ($status_code == 2)
                <div class="row">
                    <div class="d-flex justify-content-end">
                        <p class="text-secondary"><span class="text-danger">*</span>Please reconfirm the information before submitting</p><br>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            @endif
            {{-- end form submit --}}
        </form>
    </div>
    {{-- end form --}}

    {{-- dselect --}}
    <script>
        const config = {
            search: true, // Toggle search feature. Default: false
        }
        dselect(document.querySelector('#relationship1'), config)
        dselect(document.querySelector('#relationship2'), config)
    </script>

@endsection