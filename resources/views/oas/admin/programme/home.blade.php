@extends('oas.layouts.superadmin')

@section('content')
    {{-- modal --}}
    <div class="modal fade" id="newProgramme" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newProgrammeLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('programme.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="newProgrammeLabel">Create New Programme</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="programme_name" class="form-label">Programme<span class="text-danger">*</span></label>
                            <input type="text" name="programme_name" id="programme_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="programme_code" class="form-label">Code<span class="text-danger">*</span></label>
                            <input type="text" name="programme_code" id="programme_code" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="programme_level_id" class="form-label">Programme Levels<span class="text-danger">*</span></label>
                            <select name="programme_level_id" id="programme_level_id" class="form-select mb-2" required>
                                @if (count($programmeLevels))
                                    @foreach ($programmeLevels as $programmeLevel)
                                        <option value="{{ $programmeLevel->id }}">{{ $programmeLevel->level }}</option>
                                    @endforeach
                                @else
                                    <option value="">Please create programme level</option>
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="programme_type_id" class="form-label">Programme Type<span class="text-danger">*</span></label>
                            <select name="programme_type_id" id="programme_type_id" class="form-select mb-2" required>
                                @if (count($programmeTypes))
                                    @foreach ($programmeTypes as $programmeType)
                                        <option value="{{ $programmeType->id }}">{{ $programmeType->type }}</option>
                                    @endforeach
                                @else
                                    <option value="">Please create programme level</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
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
                        <li class="breadcrumb-item active" aria-current="page">Programme</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- end navigation --}}

        {{-- header --}}
        <div class="row">
            <div class="col-md-12">
                <h1 class="fw-bold">Programme</h1>
                <div class="d-flex justify-content-between">
                    <p class="text-secondary">Manage your programme here.</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newProgramme">Add new programme</button>
                </div>
            </div>
        </div>
        {{-- end header --}}

        {{-- success message --}}
        @if(Session::has('success'))
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        @endif
        {{-- end success message --}}

        {{-- table --}}
        <div class="row mt-4">
            <div class="col-md-8 mb-4">
                <table class="table align-middle" id="programmeTable">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" class="col-md-1">Id</th>
                            <th scope="col" class="col-md-5">Programme</th>
                            <th scope="col" class="col-md-2">Level</th>
                            <th scope="col" class="col-md-2">Type</th>
                            <th scope="col" class="col-md-2">Code</th>
                            <th scope="col" class="col-md-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($programmes))
                            @foreach ($programmes as $programme)
                                <tr>
                                    <th scope="row">{{ $programme->id }}</th>
                                    <td>{{ $programme->en_name }}</td>
                                    <td>{{ $programme->programmeLevel['level'] }}</td>
                                    <td>{{ $programme->programmeType['type'] }}</td>
                                    <td>{{ $programme->programme_code }}</td>
                                    <td>
                                        @if ($programme->status == '0')
                                            <span class="badge bg-warning px-3 py-2">Inactive</span>
                                        @elseif ($programme->status == '1')
                                            <span class="badge bg-success px-3 py-2">Active</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th scope="row">-</th>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <form action="{{ route('programme.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header bg-primary text-white">Edit programme</div>
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="id" class="form-label">Programme</label>
                                <input name="id" id="id" list="programmeOptions" class="form-control mb-2 " placeholder="Type programme name" required>
                                <datalist id="programmeOptions">
                                    @if (count($programmes))
                                        @foreach ($programmes as $programme)
                                            <option value="{{ $programme->id }}">{{ $programme->en_name }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Please create programme</option>
                                    @endif
                                </datalist>
                                <p>Change to</p>
                                <input type="text" name="programme_name" id="programme_name" class="form-control mb-2" placeholder="new programme name">
                            </div>
                            <div class="mb-2">
                                <input type="text" name="programme_code" id="programme_code" class="form-control mb-2" placeholder="new programme code">
                            </div>
                            <div class="mb-2">
                                <label for="programme_level_id" class="form-label">Level</label>
                                <select name="programme_level_id" id="programme_level_id" class="form-select mb-2">
                                    <option disabled selected hidden value="">Please select programme level</option>
                                    @if (count($programmeLevels))
                                        @foreach ($programmeLevels as $programmeLevel)
                                            <option value="{{ $programmeLevel->id }}">{{ $programmeLevel->level }}</option>
                                        @endforeach
                                    @else
                                        <option disabled selected hidden value="">Please create programme level</option>
                                    @endif
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="programme_type_id" class="form-label">Type</label>
                                <select name="programme_type_id" id="programme_type_id" class="form-select mb-2">
                                    <option disabled selected hidden value="">Please select programme type</option>
                                    @if (count($programmeTypes))
                                        @foreach ($programmeTypes as $programmeType)
                                            <option value="{{ $programmeType->id }}">{{ $programmeType->type }}</option>
                                        @endforeach
                                    @else
                                        <option disabled selected hidden value="">Please create programme type</option>
                                    @endif
                                </select>
                            </div>
                            <div class="mb-2">
                                <div class="form-check">
                                    <input type="radio" name="programme_status" id="programme_status1" class="form-check-input" value="0">
                                    <label for="programme_status" class="form-check label">Inavtive</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="programme_status" id="programme_status2" class="form-check-input" value="1" checked>
                                    <label for="programme_status" class="form-check label">Active</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- end table --}}
    </div>
    {{-- datatables --}}
    <script>
        $(document).ready(function () {
            $('#programmeTable').DataTable();
        });
    </script>
    {{-- end datatables --}}
@endsection