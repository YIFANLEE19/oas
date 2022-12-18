@extends('oas.layouts.superadmin')

@section('content')
    {{-- new role modal --}}
    <div class="modal fade" id="newStudentType" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newStudentTypeLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('studentType.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="newStudentTypeLabel">Create New Student Type</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="student_type_name" class="form-label">Student type name</label>
                            <input type="text" name="student_type_name" id="student_type_name" class="form-control">
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
    {{-- end new role modal --}}

    <div class="container">
        {{-- header --}}
        <div class="row">
            <div class="col-md-12">
                <h1 class="fw-bold">Student Types</h1>
                <div class="d-flex justify-content-between">
                    <p class="lead">Manage your student types here.</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newStudentType">Add new student type</button>
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
            <div class="col-md-4">
                <table class="table align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" class="col-md-2">Id</th>
                            <th scope="col" class="col-md-4">Name</th>
                            <th scope="col" class="col-md-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($studentTypes as $studentType)
                        <tr>
                            <th scope="row">{{ $studentType->id }}</th>
                            <td>{{ $studentType->name }}</td>
                            <td>
                                @if ($studentType->status == '0')
                                    <span class="badge bg-warning px-3 py-2">Inactive</span>
                                @elseif ($studentType->status == '1')
                                    <span class="badge bg-success px-3 py-2">Active</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <form action="{{ route('studentType.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header bg-primary text-white">Edit Student Type</div>
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="id" class="form-label">Student type name</label>
                                <select name="id" id="id" class="form-select mb-2" required>
                                    @foreach ($studentTypes as $studentType)
                                        <option value="{{ $studentType->id }}">{{ $studentType->name }}</option>
                                    @endforeach
                                </select>
                                <p>Change to</p>
                                <input type="text" name="student_type_name" id="student_type_name" class="form-control" placeholder="new student type name">
                            </div>
                            <div class="mb-2">
                                <div class="form-check">
                                    <input type="radio" name="student_type_status" id="student_type_status1" class="form-check-input" value="0">
                                    <label for="student_type_status" class="form-check label">Inavtive</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="student_type_status" id="student_type_status2" class="form-check-input" value="1" checked>
                                    <label for="student_type_status" class="form-check label">Active</label>
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
@endsection