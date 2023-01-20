@extends('oas.layouts.superadmin')

@section('content')
    {{-- modal --}}
    <div class="modal fade" id="newProgrammeLevel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newProgrammeLevelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('programmeLevel.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="newProgrammeLevelLabel">Create New Programme Level</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="level_name" class="form-label">Programme Level name</label>
                            <input type="text" name="level_name" id="level_name" class="form-control">
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
    {{-- end modal --}}

    <div class="container">

        {{-- navigation --}}
        <div class="row">
            <div class="col-md-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('superadmin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Programme level</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- end navigation --}}

        {{-- header --}}
        <div class="row">
            <div class="col-md-12">
                <h1 class="fw-bold">Programme Level</h1>
                <div class="d-flex justify-content-between">
                    <p class="text-secondary">Manage your programme level here.</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newProgrammeLevel">Add new programme level</button>
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
                <table class="table align-middle" id="programmeLevelTable">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" class="col-md-2">Id</th>
                            <th scope="col" class="col-md-4">Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($programmeLevels))
                            @foreach ($programmeLevels as $programmeLevel)
                            <tr>
                                <th scope="row">{{ $programmeLevel->id }}</th>
                                <td>{{ $programmeLevel->level }}</td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <th scope="row">-</th>
                                <td>-</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <form action="{{ route('programmeLevel.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header bg-primary text-white">Edit Programme Level</div>
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="id" class="form-label">Programme Level name</label>
                                <select name="id" id="id" class="form-select mb-2" required>
                                    @if (count($programmeLevels))
                                        @foreach ($programmeLevels as $programmeLevel)
                                            <option value="{{ $programmeLevel->id }}">{{ $programmeLevel->level }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Please create programme level first</option>
                                    @endif
                                </select>
                                <p>Change to</p>
                                <input type="text" name="level_name" id="level_name" class="form-control" placeholder="new programme level">
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
            $('#programmeLevelTable').DataTable();
        });
    </script>
    {{-- end datatables --}}

@endsection