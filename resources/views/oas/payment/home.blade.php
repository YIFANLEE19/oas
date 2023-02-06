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
                      <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('payment.title') }}</li>
                    </ol>
                </nav>
                <h1 class="fw-bold">{{ __('payment.title') }}</h1>
                <p><span class="fw-bold">Step 7 of 7</span> Completed</p>
                <div class="progress mb-2" style="height: 10px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary opacity-25" role="progressbar" style="width: 0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end header --}}

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('payment.create',['id'=>Crypt::encrypt($APPLICATION_RECORD_ID)]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('payment.card-header-1') }}</div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-warning" role="alert">
                                        <h4 class="alert-heading fw-bold">{{ __('payment.instruction-title') }}</h4>
                                        <p class="lead">{{ __('payment.instruction-paragraph') }}</p>
                                        <ol>
                                            <li>{{ __('payment.instruction-item-1') }}</li>
                                            <li>{{ __('payment.instruction-item-2') }}</li>
                                            <li>{{ __('payment.instruction-item-3') }}</li>
                                            <li>{{ __('payment.instruction-item-4') }}</li>
                                        </ol>
                                        <hr>
                                        <h4 class="alert-heading fw-bold">{{ __('payment.method-title') }}</h4>
                                        <div class="container-fluid">
                                            <div class="row mb-2">
                                                <div class="col-md-2">{{ __('payment.payee-label') }}</div>
                                                <div class="col-md-8 fw-bold">{{ __('payment.payee-name') }}</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-2">{{ __('payment.account-label') }}</div>
                                                <div class="col-md-2 fw-bold">{{ __('payment.account-name-1') }}</div>
                                                <div class="col-md-2 fw-bold">{{ __('payment.account-no-1') }}</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-2 offset-md-2 fw-bold">{{ __('payment.account-name-2') }}</div>
                                                <div class="col-md-2 fw-bold">{{ __('payment.account-no-2') }}</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-2 offset-md-2 fw-bold">{{ __('payment.account-name-3') }}</div>
                                                <div class="col-md-2 fw-bold">{{ __('payment.account-no-3') }}</div>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="lead">{{ __('payment.fee-title') }} <span class="fw-bold">{{ __('payment.fee-amount') }}</span></p>
                                        <p><span class="text-danger">*</span>{{ __('payment.fee-msg-1') }} <span class="fw-bold">{{ __('payment.fee-bold-msg-1') }}</span> {{ __('payment.fee-msg-2') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="lead">Payment slip</p>
                                    <input type="file" name="paymentSlip" id="paymentPond" multiple data-max-file-size="5MB" data-max-files="1" data-allow-reorder="true" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-outline-secondary me-3">{{ __('academicRecord.back_button') }}</a>
                            <button type="submit" class="btn btn-primary me-3">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- filepond --}}
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
    const paymentPond = FilePond.create(document.querySelector('input[id="paymentPond"]'),{
        acceptedFileTypes: ['image/png','image/jpeg','application/pdf'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            resolve(type);
        }),
    });

    FilePond.setOptions({
        server: {
            process: '/user/payment/tmp-upload',
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
            url: "/user/payment/tmp-delete",
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