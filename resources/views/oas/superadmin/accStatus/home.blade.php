@extends('oas.layouts.superadmin')

@section('content')
    {{-- new acc status modal --}}
    <div class="modal fade" id="newAccStatus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newAccStatusLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('accStatus.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="newAccStatusLabel">Create New Account Status</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="status_name" class="form-label">Status</label>
                            <input type="text" name="status_name" id="status_name" class="form-control">
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
    {{-- end new acc status modal --}}

    <div class="container">

        {{-- navigation --}}
        <div class="row">
            <div class="col-md-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('superadmin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Account Status</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- end navigation --}}

        {{-- header --}}
        <div class="row">
            <div class="col-md-12">
                <h1 class="fw-bold">Account Status</h1>
                <div class="d-flex justify-content-between">
                    <p class="text-secondary">Manage account status here.</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newAccStatus">Add new account status</button>
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
                <table class="table align-middle" id="accStatusTable">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" class="col-md-2">Status id</th>
                            <th scope="col" class="col-md-4">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($accStatuses))
                            @foreach ($accStatuses as $accStatus)
                            <tr>
                                <th scope="row">{{ $accStatus->id }}</th>
                                <td>{{ $accStatus->status }}</td>
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
                    <form action="{{ route('accStatus.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header bg-primary text-white">Edit Account Status</div>
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="id" class="form-label">Account Status name</label>
                                <select name="id" id="id" class="form-select mb-2" required>
                                    @if (count($accStatuses))
                                        @foreach ($accStatuses as $accStatus)
                                            <option value="{{ $accStatus->id }}">{{ $accStatus->status }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Please create account status</option>
                                    @endif
                                </select>
                                <p>Change to</p>
                                <input type="text" name="status_name" id="status_name" class="form-control" placeholder="new account status name">
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
            $('#accStatusTable').DataTable();
        });
    </script>
    {{-- end datatables --}}

@endsection