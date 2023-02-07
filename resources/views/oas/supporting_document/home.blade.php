@extends('oas.layouts.app')

@section('content')

{{-- <img src="{{ Storage::url('images/icFront/icFront63db2e44338104.24879098/icFront_Superadmin_20230202113030_ic-front.png') }}" alt=""> --}}

{{-- header --}}
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="border-bottom">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('button.home') }}</a></li>
                      <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('supportingDocs.title') }}</li>
                    </ol>
                </nav>
                <h1 class="fw-bold">{{ __('supportingDocs.title') }}</h1>
                <p><span class="fw-bold">{{ __('step.step-6') }}</span> {{ __('step.completed') }}</p>
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
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('supportingDocument.create',['id'=>Crypt::encrypt($APPLICATION_RECORD_ID)]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header bg-primary text-white">{{ __('supportingDocs.card-header-1') }}</div>
                    <div class="card-body">
                        {{-- <input type="file" id="icFront" data-max-files="10" multiple data-max-file-size="1MB"/> --}}
                        <div class="container">
                            {{-- identity card --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="fw-bold">{{ __('supportingDocs.type-1') }}</h1>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <p class="lead">{{ __('inputFields.ic-front') }}<span class="text-danger">*</span></p>
                                    <input type="file" class="filepond" name="icFront" id="icFront" multiple data-max-file-size="5MB" data-max-files="1" data-allow-reorder="true" required>
                                </div>
                                <div class="col-md-6">
                                    <p class="lead">{{ __('inputFields.ic-back') }}<span class="text-danger">*</span></p>
                                    <input type="file" class="filepond" name="icBack" id="icBack" multiple data-max-file-size="5MB" data-max-files="1" data-allow-reorder="true" required>
                                </div>
                            </div>
                            {{-- end identity card --}}
                            {{-- leaving cert --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="fw-bold">{{ __('supportingDocs.type-2') }}</h1>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p class="lead">{{ __('inputFields.secondary-school') }} ({{ __('inputFields.max-file') }})<span class="text-danger">*</span></p>
                                    <input type="file" class="filepond" name="schoolLeavingCerts" id="schoolLeavingCerts" multiple data-max-file-size="5MB" data-max-files="10" data-allow-reorder="true" required>
                                </div>
                            </div>
                            {{-- end leaving cert --}}
                            {{-- transcript --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="fw-bold">{{ __('supportingDocs.type-3') }}</h1>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p class="lead">{{ __('inputFields.at-secondary-school') }} ({{ __('inputFields.max-file') }})<span class="text-danger">*</span></p>
                                    <input type="file" class="filepond" name="secondarySchoolTranscripts" id="secondarySchoolTranscripts" multiple data-max-file-size="5MB" data-max-files="10" required>
                                </div>
                                <div class="col-md-12">
                                    <p class="lead">{{ __('inputFields.at-uppersecondary-school') }} ({{ __('inputFields.max-file') }})</p>
                                    <input type="file" class="filepond" name="upperSecondarySchoolTranscripts" id="upperSecondarySchoolTranscripts" multiple data-max-file-size="5MB" data-max-files="10">
                                </div>
                                <div class="col-md-12">
                                    <p class="lead">{{ __('inputFields.at-foundation') }} ({{ __('inputFields.max-file') }})</p>
                                    <input type="file" class="filepond" name="foundationTranscripts" id="foundationTranscripts" multiple data-max-file-size="5MB" data-max-files="10">
                                </div>
                                <div class="col-md-12">
                                    <p class="lead">{{ __('inputFields.at-diploma') }} ({{ __('inputFields.max-file') }})</p>
                                    <input type="file" class="filepond" name="diplomaTranscripts" id="diplomaTranscripts" multiple data-max-file-size="5MB" data-max-files="10">
                                </div>
                                <div class="col-md-12">
                                    <p class="lead">{{ __('inputFields.at-degree') }} ({{ __('inputFields.max-file') }})</p>
                                    <input type="file" class="filepond" name="degreeTranscripts" id="degreeTranscripts" multiple data-max-file-size="5MB" data-max-files="10">
                                </div>
                            </div>
                            {{-- end transcript --}}
                            {{-- other relevant docs --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="fw-bold">{{ __('supportingDocs.type-4') }}</h1>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p class="lead">{{ __('inputFields.at-others') }}  ({{ __('inputFields.max-file') }})</p>
                                    <input type="file" class="filepond" name="others" id="others" multiple data-max-file-size="5MB" data-max-files="10">
                                </div>
                            </div>
                            {{-- other relevant docs --}}
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-outline-secondary me-3">{{ __('button.back') }}</a>
                            <button type="submit" class="btn btn-primary me-3">{{ __('button.next') }}</button>
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
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script>
    FilePond.registerPlugin(
        FilePondPluginFileValidateSize,
        FilePondPluginFileEncode,
        FilePondPluginImageExifOrientation,
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
    );
    
    const inputElements = document.querySelectorAll('input.filepond');
    Array.from(inputElements).forEach(inputElement => {
        FilePond.create(inputElement,{
            acceptedFileTypes: ['image/png','image/jpeg','application/pdf'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                resolve(type);
            }),
        });
    })

    FilePond.setOptions({
        server: {
            process: '/user/supporting-document/tmp-upload',
            revert:  (uniqueFileId, load, error) => {
                deleteFile(uniqueFileId);
                error('Error occur');
                load();
            },
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        },
    });

    function deleteFile(fileName){
        $.ajax({
            url: "/user/supporting-document/tmp-delete",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "DELETE",
            data: {
                file: fileName,
            },
            success: function(response) {
                console.log(response);
            },
            error: function(response) {
                console.log('error')
            },
        });

    }
    
</script>
@endsection