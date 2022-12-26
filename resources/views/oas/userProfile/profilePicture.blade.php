@extends('oas.layouts.app')

@section('content')
    <?php
        $count = 1;
    ?>
    {{-- modal --}}
    <style>
        .modal-backdrop {
            background-color: rgb(50, 47, 47);
        }
    </style>

    @if(Session::has('success_code') && Session::get('success_code') == 1)
        <script>
            $(function(){
                $('#exampleModal').modal('show');
            });
        </script>        
    @endif

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Well done!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                    <h3 class="fw-bold">Uploads profile picture {{ $count }}</h3>
                    <p class="text-secondary">Next >>> Submit and finish setup profile</p>
                </div>
            </div>
        </div>
    </div>
    {{-- end header --}}

    {{-- guidelines --}}
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">Guidelines for submitting your photo</h4>
                    <p>1. In colour, <span class="fw-bold">NOT</span> black and white.</p>
                    <p>2. Taken against a <span class="fw-bold">WHITE</span> background.</p>
                    <p>3. The photo must be a true likeness of the person.</p>
                    <p>4. Your photo must be <span class="fw-bold">professionally printed</span> and is <span class="fw-bold">45mm high x 35mm wide</span>. <span class="fw-bold">Please do not use photos that have been cut down from larger pictures.</span></p>
                    <p>5. The photo must be sent in <span class="fw-bold">JPEG file (*.JPG)</span> format and name it as your Name same as I/C.</p>
                    <hr>
                    <img src="/images/photo_correct.png" alt="" class="img-fluid me-3">
                    <img src="/images/photo_wrong.png" alt="" class="img-fluid me-3">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    {{-- end guidelines --}}

    {{-- show error message --}}
    <div class="container">
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
                @if(Session::has('success_code') && Session::get('success_code') == 0)
                    <div class="alert alert-danger">
                        <ul>
                            <li>Please fill in your personal particulars before uploading your profile picture.Click <a href="{{ route('personalParticulars.home') }}" class="alert-link">here</a>to fill in personal particulars.</li>
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
                <div class="col-sm-6">
                    <label for="picture" class="form-label">Photo (<span class="text-danger fw-bold">Accepted Format: jpg, jpeg</span>)<span class="text-danger">*</span></label>
                    <div class="d-flex flex-row">
                        <input class="form-control me-3 mb-4" name="picture" id="picture" type="file" accept=".jpg, .jpeg" onchange="previewPhoto(event)">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-6">
                        <p class="text-secondary">Preview</p>
                        <img id="preview_location" name="preview_location" class="img-fluid" width="150px" height="180px">
                </div>
            </div>
        </div>
    </form>
    {{-- end submit photo --}}

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