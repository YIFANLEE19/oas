@extends('oas.layouts.app')

@section('content')

    {{-- modal --}}
    <style>
        .modal-backdrop {
            background-color: rgb(50, 47, 47);
        }
    </style>

    @if(Session::has('status_code') && Session::get('status_code') == 4)
        <script>
            $(function(){
                $('#statusCode4Modal').modal('show');
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
    @elseif($status_code == 2)
        <script>
            $(function(){
                $('#statusCode2Modal').modal('show');
            });
        </script>
    @elseif($status_code == 4)
        <script>
            $(function(){
                $('#statusCode4Modal').modal('show');
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
    {{-- status 2 = personal particulars / AND parent guardian particulars / AND emergency contact X --}}
    <div class="modal fade" id="statusCode2Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode2ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="statusCode2ModalLabel">Oops!</h1>
                </div>
                <div class="modal-body">
                    <p>Dear user, you haven't filled in the <span class="fw-bold">emergency contact</span>, so you can't go to the next step until you fill them in.</p>
                    <p>If you want to go ahead and fill in the <span class="fw-bold">emergency contact</span> please click <span class="fw-bold">Continue</span></p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-secondary">Back to home page</a>
                    <a href="{{ route('emergencyContact.home') }}" type="button" class="btn btn-primary">Continue</a>
                </div>
            </div>
        </div>
    </div>
    {{-- status 4 = personal particulars / AND parent guardian particulars / AND emergency contact / AND profile picture / --}}
    <div class="modal fade" id="statusCode4Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusCode4ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="statusCode4ModalLabel">Congratulations!</h1>
                </div>
                <div class="modal-body">
                    <p>Congratulations, you have filled in all your personal particulars, parent / guardian particulars, emergency contact and uploaded your profile picture. Now you can go to the home page to apply for courses.</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" type="button" class="btn btn-primary">Back to home page</a>
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
                    <h1 class="fw-bold">Uploads profile picture</h1>
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                          <li class="breadcrumb-item active fw-bold" aria-current="page">Profile picture</li>
                        </ol>
                    </nav>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped" role="progressbar" aria-label="Default striped example" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Step 4: Profile Picture</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end header --}}

    {{-- show error message --}}
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{-- end show error message --}}

    {{-- submit photo --}}
    <form action="{{ route('profilePicture.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row mb-4 mt-4">
                <div class="col-sm-9">
                    <label for="picture" class="form-label">Photo (<span class="text-danger fw-bold">Accepted Format: jpg, jpeg</span>)<span class="text-danger">*</span></label>
                    <div class="d-flex flex-column">
                        <input class="form-control me-3 mb-4" name="picture" id="picture" type="file" accept=".jpg, .jpeg" onchange="previewPhoto(event)">
                    </div>
                </div>
                <div class="col-sm-3 d-flex flex-column justify-content-end">
                    <p class="text-secondary">Preview</p>
                    <img id="preview_location" name="preview_location" class="img-fluid" width="150px" height="180px">
                </div>
            </div>
            <hr>
            @if ($status_code == 3)
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
        </div>
    </form>
    {{-- end submit photo --}}

    {{-- guidelines --}}
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning fade show" role="alert">
                    <h4 class="alert-heading">Guidelines for submitting your photo</h4>
                    <p>1. In colour, <span class="fw-bold">NOT</span> black and white.</p>
                    <p>2. Taken against a <span class="fw-bold">WHITE</span> background.</p>
                    <p>3. The photo must be a true likeness of the person.</p>
                    <p>4. Your photo must be <span class="fw-bold">professionally printed</span> and is <span class="fw-bold">45mm high x 35mm wide</span>. <span class="fw-bold">Please do not use photos that have been cut down from larger pictures.</span></p>
                    <p>5. The photo must be sent in <span class="fw-bold">JPEG file (*.JPG)</span> format and name it as your Name same as I/C.</p>
                    <hr>
                    <img src="/images/photo_correct.png" alt="" class="img-fluid me-3">
                    <img src="/images/photo_wrong.png" alt="" class="img-fluid me-3">
                </div>
            </div>
        </div>
    </div>
    {{-- end guidelines --}}



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
@endsection