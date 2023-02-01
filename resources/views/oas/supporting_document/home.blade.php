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
                      <li class="breadcrumb-item active fw-bold" aria-current="page">Submit Supporting Document</li>
                    </ol>
                </nav>
                <h1 class="fw-bold">Submit Supporting Document</h1>
                <p><span class="fw-bold">Step 6 of 7</span> Completed</p>
                <div class="progress mb-2" style="height: 10px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 84%" aria-valuenow="84" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary opacity-25" role="progressbar" style="width: 16%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end header --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('supportingDocument.create',['id'=>Crypt::encrypt($APPLICATION_RECORD_ID )]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header bg-primary text-white">Submit Supporting Document</div>
                    <div class="card-body">
                        {{-- <input type="file" id="icFront" data-max-files="10" multiple data-max-file-size="1MB"/> --}}
                        <div class="container">
                            {{-- identity card --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="fw-bold">Identity card</h1>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <p class="lead">Identity card - Front<span class="text-danger">*</span></p>
                                    <input type="file" name="icFront" id="icFront" data-max-file-size="5MB">
                                </div>
                                <div class="col-md-6">
                                    <p class="lead">Identity card - Back<span class="text-danger">*</span></p>
                                    <input type="file" name="icBack" id="icBack" data-max-file-size="5MB">
                                </div>
                            </div>
                            {{-- end identity card --}}
                            {{-- leaving cert --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="fw-bold">Secondary School Leaving Cert</h1>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <input type="file" name="schoolLeavingCerts[]" id="schoolLeavingCert" multiple data-max-file-size="5MB" data-max-files="10" required>
                                </div>
                            </div>
                            {{-- end leaving cert --}}
                            {{-- transcript --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="fw-bold">Academic Transcript</h1>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p class="lead">Secondary School Certificate and/or Transcript (max 10 files)<span class="text-danger">*</span></p>
                                    <input type="file" name="secondarySchoolTranscripts[]" id="secondarySchoolTranscript" multiple data-max-file-size="5MB" data-max-files="10">
                                </div>
                                <div class="col-md-12">
                                    <p class="lead">Upper Secondary School Certificate and/or Transcript (max 10 files)<span class="text-danger">*</span></p>
                                    <input type="file" name="upperSecondarySchoolTranscripts[]" id="upperSecondarySchoolTranscript" multiple data-max-file-size="5MB" data-max-files="10">
                                </div>
                                <div class="col-md-12">
                                    <p class="lead">Foundation Certificate and/or Transcript (max 10 files)</p>
                                    <input type="file" name="foundationTranscripts[]" id="foundationTranscript" multiple data-max-file-size="5MB" data-max-files="10">
                                </div>
                                <div class="col-md-12">
                                    <p class="lead">Diploma Certificate and/or Transcript (max 10 files)</p>
                                    <input type="file" name="diplomaTranscripts[]" id="diplomaTranscript" multiple data-max-file-size="5MB" data-max-files="10">
                                </div>
                                <div class="col-md-12">
                                    <p class="lead">Degree Certificate and/or Transcript (max 10 files)</p>
                                    <input type="file" name="degreeTranscripts[]" id="degreeTranscript" multiple data-max-file-size="5MB" data-max-files="10">
                                </div>
                            </div>
                            {{-- end transcript --}}
                            {{-- other relevant docs --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="fw-bold">Other Relevant Document</h1>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p class="lead">Others (max 10 files)</p>
                                    <input type="file" name="others[]" id="others" multiple data-max-file-size="5MB" data-max-files="10">
                                </div>
                            </div>
                            {{-- other relevant docs --}}
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-outline-secondary me-3">Back</a>
                            <button type="submit" class="btn btn-primary me-3">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script>

    // We want to preview images, so we register
    // the Image Preview plugin, We also register 
    // exif orientation (to correct mobile image
    // orientation) and size validation, to prevent
    // large files from being added
    FilePond.registerPlugin(
        // encodes the file as base64 data
        FilePondPluginFileEncode,
        FilePondPluginImageEdit,
        // validates the size of the file
        FilePondPluginFileValidateSize,
        
        // corrects mobile image orientation
        FilePondPluginImageExifOrientation,
        FilePondPluginImagePreview,
    );
    
    // Create a FilePond instance
    FilePond.create(document.querySelector('input[id="icFront"]'));
    FilePond.create(document.querySelector('input[id="icBack"]'));
    FilePond.create(document.querySelector('input[id="schoolLeavingCert"]'));
    FilePond.create(document.querySelector('input[id="secondarySchoolTranscript"]'));
    FilePond.create(document.querySelector('input[id="upperSecondarySchoolTranscript"]'));
    FilePond.create(document.querySelector('input[id="foundationTranscript"]'));
    FilePond.create(document.querySelector('input[id="diplomaTranscript"]'));
    FilePond.create(document.querySelector('input[id="degreeTranscript"]'));
    FilePond.create(document.querySelector('input[id="others"]'));
    
</script>
@endsection