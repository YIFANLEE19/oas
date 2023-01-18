@extends('oas.layouts.app')

@section('content')

<div class="container mb-4">
        {{-- success message --}}
        @if(Session::has('error'))
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    {{-- end success message --}}
    <div class="row mb-3">
        <div class="col-md-12">
            <h2 class="fw-bold mb-3">{{ __('academicRecord.title') }}</h2>
            <div class="border-bottom border-primary border-3 mb-2"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-label="Animated striped example" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" >{{ __('academicRecord.current_step') }}</div>
                <span class="text-primary ms-3 fw-bold">{{ __('academicRecord.next_step') }}</span>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('academicRecord.header') }}</div>
                <div class="card-body">
                    <div class="row">

                        <form action="{{ route('academicDetail.update') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th scope="col">{{ __('academicRecord.table_title1') }}</th>
                                                <th scope="col">{{ __('academicRecord.table_title2') }}</th>
                                                <th scope="col">{{ __('academicRecord.table_title3') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($academicRecord as $academicRecord)
                                                <tr>
                                                    <td><p name="school_level[{{ $academicRecord->school_level['id'] }}]" id="school_level">{{ $academicRecord->school_level['name'] }} <span></p></td>
                                                    <td><input name="school_name[{{ $academicRecord->school_level['id'] }}]" type="text" class="form-control" value="{{ $academicRecord->school_name }}"></td>
                                                    <td><input name="school_graduation[{{ $academicRecord->school_level['id'] }}]" type="text" class="form-control" value="{{ $academicRecord->school_graduation }}"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card-footer">
                       <div class="d-flex justify-content-end">
                        <a href="/program_selection" class="btn btn-secondary me-3">{{ __('academicRecord.back_button') }}</a>
                        <button type="submit" class="btn btn-primary me-3" onClick="check()">{{ __('academicRecord.next_button') }}</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection