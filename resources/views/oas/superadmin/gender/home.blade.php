@extends('oas.layouts.superadmin')

@section('content')
    {{-- modal --}}
    <div class="modal fade" id="newGender" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newGenderLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('gender.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="newGenderLabel">Create New Gender</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="gender_code" class="form-label">Gender code</label>
                            <input type="text" name="gender_code" id="gender_code" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="gender_name" class="form-label">Name</label>
                            <input type="text" name="gender_name" id="gender_name" class="form-control">
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
                        <li class="breadcrumb-item active" aria-current="page">Gender</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- end navigation --}}

        {{-- header --}}
        <div class="row">
            <div class="col-md-12">
                <h1 class="fw-bold">Gender</h1>
                <div class="d-flex justify-content-between">
                    <p class="text-secondary">Manage your gender here.</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newGender">Add new gender</button>
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
                <table class="table align-middle" id="genderTable">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" class="col-md-1">Gender code</th>
                            <th scope="col" class="col-md-4">Name</th>
                            <th scope="col" class="col-md-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($genders))
                            @foreach ($genders as $gender)
                                <tr>
                                    <th scope="row">{{ $gender->gender_code }}</th>
                                    <td>{{ $gender->name }}</td>
                                    <td>
                                        @if ($gender->status == '0')
                                            <span class="badge bg-warning px-3 py-2">Inactive</span>
                                        @elseif ($gender->status == '1')
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
                    <form action="{{ route('gender.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header bg-primary text-white">Edit Gender</div>
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="id" class="form-label">Gender code</label>
                                <select name="id" id="id" class="form-select mb-2">
                                    @if (count($genders))
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender->id }}">{{ $gender->gender_code }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Please create gender code</option>
                                    @endif
                                </select>
                                <p>Change to</p>
                                <input type="text" name="gender_code" id="gender_code" class="form-control mb-2" placeholder="new gender code">
                                <input type="text" name="gender_name" id="gender_name" class="form-control mb-2" placeholder="new gender name">
                            </div>
                            <div class="mb-2">
                                <div class="form-check">
                                    <input type="radio" name="gender_status" id="gender_status1" class="form-check-input" value="0">
                                    <label for="gender_status" class="form-check label">Inavtive</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="gender_status" id="gender_status2" class="form-check-input" value="1" checked>
                                    <label for="gender_status" class="form-check label">Active</label>
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
            $('#genderTable').DataTable();
        });
    </script>
    {{-- end datatables --}}
@endsection