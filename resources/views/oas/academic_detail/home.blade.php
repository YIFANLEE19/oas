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
                      <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('academicRecord.title') }}</li>
                    </ol>
                </nav>
                <h1 class="fw-bold">{{ __('academicRecord.title') }}</h1>
                <p><span class="fw-bold">{{ __('step.step-2') }}</span> {{ __('step.completed') }}</p>
                <div class="progress mb-2" style="height: 10px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary opacity-25" role="progressbar" style="width: 72%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end header --}}

{{-- success message --}}
@if(Session::has('error'))
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
@endif
{{-- end success message --}}

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('academicDetail.create',['id'=>Crypt::encrypt($APPLICATION_RECORD_ID)]) }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('academicRecord.card-header-1') }}</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">{{ __('academicRecord.table-header-1') }}</th>
                                        <th scope="col">{{ __('academicRecord.table-header-2') }}</th>
                                        <th scope="col">{{ __('academicRecord.table-header-3') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($school_level); $i++)
                                        <tr>
                                            <th scope="row">
                                                {{ $school_level[$i]->name }}
                                                <input type="hidden" name="school_level_id[]" value="{{ $school_level[$i]->id }}">
                                            </th>
                                            <td>
                                                <input onkeyup="if (/[^|A-Za-z0-9\s/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s/]+/g,'')"  maxlength="50" type="text" name="school_name[]" id="school_name[{{ $school_level[$i]->id }}]" class="form-control">
                                            </td>
                                            <td>
                                                <input onkeyup="if (/[^|0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|0-9]+/g,'')" maxlength="4" type="text" name="school_graduation[]" id="school_graduation[{{ $school_level[$i]->id }}]" class="form-control">
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('programmeSelect.home') }}" class="btn btn-outline-secondary me-3">{{ __('button.back') }}</a>
                            <button type="submit" class="btn btn-primary me-3">{{ __('button.next') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection