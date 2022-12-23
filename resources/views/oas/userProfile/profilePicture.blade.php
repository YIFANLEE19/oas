@extends('oas.layouts.app')

@section('content')
    
    {{-- header --}}
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="border-bottom">
                    <h3 class="fw-bold">Uploads profile picture</h3>
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