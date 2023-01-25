@extends('oas.layouts.superadmin')

@section('content')
    {{-- new modal --}}
    <div class="modal fade" id="newProgrammeOffer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newProgrammeOfferLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form action="{{ route('programmeOffer.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="newProgrammeOfferLabel">Select semester & year</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="semester_year_mapping_id" class="form-label">Semester & Year</label>
                            <select name="semester_year_mapping_id" id="semester_year_mapping_id" class="form-select mb-2" required>
                                @foreach ($semesterYearMappings as $mapping)
                                    <option value="{{ $mapping->id }}">Semester: {{ $mapping->semester['semester'] }}, Year: {{ $mapping->year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="programme_id" class="form-label">All Programmes</label>
                            <div class="container">
                                <div class="row border-bottom border-1 mb-3">
                                    <p class="lead">PhD</p>
                                    @foreach($programmes as $programme)
                                        @if ($programme->programme_level_id == 1)
                                        <div class="col-md-4">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="{{ $programme->id }}" id="programme[{{ $programme->id }}]" name="programme_id[]" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                {{ $programme->en_name }}
                                                </label>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="row border-bottom border-1 mb-3">
                                    <p class="lead">Master</p>
                                    @foreach($programmes as $programme)
                                        @if ($programme->programme_level_id == 2)
                                        <div class="col-md-4">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="{{ $programme->id }}" id="programme[{{ $programme->id }}" name="programme_id[]" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                {{ $programme->en_name }}
                                                </label>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="row border-bottom border-1 mb-3">
                                    <p class="lead">Bachelor</p>
                                    @foreach($programmes as $programme)
                                        @if ($programme->programme_level_id == 3)
                                        <div class="col-md-4">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="{{ $programme->id }}" id="programme[{{ $programme->id }}" name="programme_id[]" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                {{ $programme->en_name }}
                                                </label>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="row border-bottom border-1 mb-3">
                                    <p class="lead">Diploma</p>
                                    @foreach($programmes as $programme)
                                        @if ($programme->programme_level_id == 4)
                                        <div class="col-md-4">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="{{ $programme->id }}" id="programme[{{ $programme->id }}" name="programme_id[]" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                {{ $programme->en_name }}
                                                </label>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="row border-bottom border-1 mb-3">
                                    <p class="lead">Foundation</p>
                                    @foreach($programmes as $programme)
                                        @if ($programme->programme_level_id == 5)
                                        <div class="col-md-4">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="{{ $programme->id }}" id="programme[{{ $programme->id }}" name="programme_id[]" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                {{ $programme->en_name }}
                                                </label>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="row border-bottom border-1 mb-3">
                                    <p class="lead">SITE</p>
                                    @foreach($programmes as $programme)
                                        @if ($programme->programme_level_id == 6)
                                        <div class="col-md-4">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="{{ $programme->id }}" id="programme[{{ $programme->id }}" name="programme_id[]" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                {{ $programme->en_name }}
                                                </label>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="row">
                                    <p class="lead">SPACE</p>
                                    @foreach($programmes as $programme)
                                        @if ($programme->programme_level_id == 7)
                                        <div class="col-md-4">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="{{ $programme->id }}" id="programme[{{ $programme->id }}" name="programme_id[]" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                {{ $programme->en_name }}
                                                </label>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal --}}
    
    <div class="container">
        {{-- navigation --}}
        <div class="row">
            <div class="col-md-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('superadmin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Programme Offered</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- end navigation --}}

        {{-- header --}}
        <div class="row">
            <div class="col-md-12">
                <h1 class="fw-bold">Programme Offered</h1>
                <div class="d-flex justify-content-between">
                    <p class="text-secondary">Manage programme offered here.</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newProgrammeOffer">Create</button>
                </div>
            </div>
        </div>
        {{-- end header --}}
    </div>

    {{-- show all offered programme --}}
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8 mb-4">
                <table class="table align-middle" id="programmeOfferedTable">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" class="col-md-4">Programme name</th>
                            <th scope="col" class="col-md-2">Semester&Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getProgrammeOffers as $programmeOffer)
                            <tr>
                                <td>{{ $programmeOffer->programme['en_name'] }}</td>
                                <td>Semester: {{ $programmeOffer->semesterYearMapping['semester']->semester }}, Year: {{ $programmeOffer->semesterYearMapping['year'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">Edit</div>
                    <div class="card-body">
                        <div class="mb-2">
                            <label for="id" class="form-label">Semester & year</label>
                            <select name="" id="" class="form-select mb-2">
                                @foreach ($getDifferentSemesterYearMappings as $getDifferentSemesterYearMapping)
                                    <option value="">Semester: {{ $getDifferentSemesterYearMapping->semesterYearMapping['semester']->semester }}, Year: {{ $getDifferentSemesterYearMapping->semesterYearMapping['year'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end show all offered programme --}}

    {{-- datatables --}}
    <script>
        $(document).ready(function () {
            $('#programmeOfferedTable').DataTable();
        });
    </script>
    {{-- end datatables --}}

@endsection