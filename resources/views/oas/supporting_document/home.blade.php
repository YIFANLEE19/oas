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
                <div class="card-header bg-primary text-white">Submit Supporting Document</div>
                <div class="card-body">
                    <div class="container">
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <h1 class="fw-bold">Identity card</h1>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <p class="lead">Identity card - Front</p>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="" id="" class="form-control">
                            </div>
                            <div class="col-md-5"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <h1 class="fw-bold">Secondary school leaving certificate</h1>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <h1 class="fw-bold">Transcript</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-outline-secondary me-3">{{ __('academicRecord.back_button') }}</a>
                        <a href="#" class="btn btn-primary me-3">Next</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection