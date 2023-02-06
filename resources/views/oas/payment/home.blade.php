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
            <div class="card">
                <div class="card-header bg-primary text-white">Submit payment slip</div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-warning" role="alert">
                                    <h4 class="alert-heading fw-bold">Payment instruction</h4>
                                    <p class="lead">Please provide us the official bank-in slip with the below details in a SINGLE PAGE:</p>
                                    <ol>
                                        <li>Transaction Amount</li>
                                        <li>Beneficiary Bank and Beneficiary Bank Account Number</li>
                                        <li>Transaction Status (Successful)</li>
                                        <li>Transaction Date</li>
                                    </ol>
                                    <hr>
                                    <h4 class="alert-heading fw-bold">Payment method</h4>
                                    <div class="container-fluid">
                                        <div class="row mb-2">
                                            <div class="col-md-2">Payee Name:</div>
                                            <div class="col-md-8 fw-bold">KOLEJ UNIVERSITI SELATAN</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-2">Current Accoun No:</div>
                                            <div class="col-md-2 fw-bold">PUBLIC BANK</div>
                                            <div class="col-md-2 fw-bold">315 001 222 6</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-2 offset-md-2 fw-bold">CIMB BANK</div>
                                            <div class="col-md-2 fw-bold">800 628 951 5</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-2 offset-md-2 fw-bold">RHB BANK</div>
                                            <div class="col-md-2 fw-bold">201 400 000 497 39</div>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="lead">The Application Fee is <span class="fw-bold">RM400.00</span></p>
                                    <p><span class="text-danger">*</span>Application & registration fee, development fee, student union fee and international student administration fee are <span class="fw-bold">non-refundable</span> regardless of the application date of the withdrawal.</p>
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
                        <a class="btn btn-primary me-3">{{ __('academicRecord.next_button') }}</a>
                    </div>
                </div>
            </div>
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