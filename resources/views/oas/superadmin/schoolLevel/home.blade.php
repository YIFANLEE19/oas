@extends('oas.layouts.superadmin')

@section('content')
    {{-- new school_level modal --}}
    <div class="modal fade" id="newSchoolLevel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newSchoolLevelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('schoolLevel.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="newSchoolLevelLabel">Create New School Level</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="school_level_name" class="form-label">School Level name</label>
                            <input type="text" name="school_level_name" id="school_level_name" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end new school_level modal --}}

    <div class="container">

        {{-- navigation --}}
        <div class="row">
            <div class="col-md-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('superadmin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">School Level</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- end navigation --}}

        {{-- header --}}
        <div class="row">
            <div class="col-md-12">
                <h1 class="fw-bold">School Level</h1>
                <div class="d-flex justify-content-between">
                    <p class="text-secondary">Manage your School Level here.</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newSchoolLevel">Add new School Level</button>
                </div>
            </div>
        </div>
        {{-- end header --}}

        {{-- success message --}}
        @if(Session::has('success'))
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" school_level="alert">
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
                <table class="table align-middle" id="school_levelTable">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" class="col-md-2">School Level id</th>
                            <th scope="col" class="col-md-4">Name</th>
                            <th scope="col" class="col-md-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($school_levels))
                            @foreach ($school_levels as $school_level)
                            <tr>
                                <th scope="row">{{ $school_level->id }}</th>
                                <td>{{ $school_level->name }}</td>
                                <td>
                                    @if ($school_level->status == '0')
                                        <span class="badge bg-warning px-3 py-2">Inactive</span>
                                    @elseif ($school_level->status == '1')
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
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <form action="{{ route('schoolLevel.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header bg-primary text-white">Edit School Level</div>
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="id" class="form-label">School Level name</label>
                                <select name="id" id="id" class="form-select mb-2" required>
                                    @if (count($school_levels)) 
                                        @foreach ($school_levels as $school_level)
                                            <option value="{{ $school_level->id }}">{{ $school_level->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Please create School Level first</option>
                                    @endif
                                </select>
                                <p>Change to</p>
                                <input type="text" name="school_level_name" id="school_level_name" class="form-control" placeholder="new school_level name">
                            </div>
                            <div class="mb-2">
                                <div class="form-check">
                                    <input type="radio" name="school_level_status" id="school_level_status1" class="form-check-input" value="0">
                                    <label for="school_level_status" class="form-check label">Inavtive</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="school_level_status" id="school_level_status2" class="form-check-input" value="1" checked>
                                    <label for="school_level_status" class="form-check label">Active</label>
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
            $('#school_levelTable').DataTable();
        });
    </script>
    {{-- end datatables --}}

@endsection