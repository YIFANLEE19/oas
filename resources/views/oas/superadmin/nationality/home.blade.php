@extends('oas.layouts.superadmin')

@section('content')
    {{-- new role modal --}}
    <div class="modal fade" id="newNationality" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newNationalityLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('nationality.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="newNationalityLabel">Create New Nationality</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nationality_code" class="form-label">Nationality code</label>
                            <input type="text" name="nationality_code" id="nationality_code" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="nationality_name" class="form-label">Name</label>
                            <input type="text" name="nationality_name" id="nationality_name" class="form-control">
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
                <h1 class="fw-bold">Nationality</h1>
                <div class="d-flex justify-content-between">
                    <p class="text-secondary">Manage your nationality here.</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newNationality">Add new nationality</button>
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
                <table class="table align-middle" id="nationalityTable">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" class="col-md-1">Nationality code</th>
                            <th scope="col" class="col-md-4">Name</th>
                            <th scope="col" class="col-md-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($nationalities))
                            @foreach ($nationalities as $nationality)
                                <tr>
                                    <th scope="row">{{ $nationality->nationality_code }}</th>
                                    <td>{{ $nationality->name }}</td>
                                    <td>
                                        @if ($nationality->status == '0')
                                            <span class="badge bg-warning px-3 py-2">Inactive</span>
                                        @elseif ($nationality->status == '1')
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
                    <form action="{{ route('nationality.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header bg-primary text-white">Edit Nationality</div>
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="id" class="form-label">Nationality code</label>
                                <select name="id" id="id" class="form-select mb-2">
                                    @if (count($nationalities))
                                        @foreach ($nationalities as $nationality)
                                            <option value="{{ $nationality->id }}">{{ $nationality->nationality_code }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Please create nationality code</option>
                                    @endif
                                </select>
                                <p>Change to</p>
                                <input type="text" name="nationality_code" id="nationality_code" class="form-control mb-2" placeholder="new nationality code">
                                <input type="text" name="nationality_name" id="nationality_name" class="form-control mb-2" placeholder="new nationality name">
                            </div>
                            <div class="mb-2">
                                <div class="form-check">
                                    <input type="radio" name="nationality_status" id="nationality_status1" class="form-check-input" value="0">
                                    <label for="nationality_status" class="form-check label">Inavtive</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="nationality_status" id="nationality_status2" class="form-check-input" value="1" checked>
                                    <label for="nationality_status" class="form-check label">Active</label>
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
            $('#nationalityTable').DataTable();
        });
    </script>
    {{-- end datatables --}}
@endsection