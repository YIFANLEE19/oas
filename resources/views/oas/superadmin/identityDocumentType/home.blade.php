@extends('oas.layouts.superadmin')

@section('content')
    {{-- new identityDocumentType modal --}}
    <div class="modal fade" id="newIdentityDocumentType" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newIdentityDocumentTypeLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('identityDocumentType.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="newIdentityDocumentTypeLabel">Create New Identity Document Type</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="identity_document_type" class="form-label">Identity Document Type Name</label>
                            <input type="text" name="identity_document_type" id="identity_document_type" class="form-control" required>
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
    {{-- end new identityDocumentType modal --}}

    <div class="container">

        {{-- navigation --}}
        <div class="row">
            <div class="col-md-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('superadmin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Identity document type</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- end navigation --}}

        {{-- header --}}
        <div class="row">
            <div class="col-md-12">
                <h1 class="fw-bold">Identity document type</h1>
                <div class="d-flex justify-content-between">
                    <p class="text-secondary">Manage your identity document type here.</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newIdentityDocumentType">Add new identity document type</button>
                </div>
            </div>
        </div>
        {{-- end header --}}

        {{-- success message --}}
        @if(Session::has('success'))
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" disease="alert">
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
                <table class="table align-middle" id="identityDocumentTypeTable">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" class="col-md-2">Id</th>
                            <th scope="col" class="col-md-4">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($identityDocumentTypes))
                            @foreach ($identityDocumentTypes as $identityDocumentType)
                            <tr>
                                <th scope="row">{{ $identityDocumentType->id }}</th>
                                <td>{{ $identityDocumentType->type }}</td>
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
                    <form action="{{ route('identityDocumentType.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header bg-primary text-white">Edit identity document type</div>
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="id" class="form-label">Identity document type name</label>
                                <select name="id" id="id" class="form-select mb-2" required>
                                    @if (count($identityDocumentTypes))
                                        @foreach ($identityDocumentTypes as $identityDocumentType)
                                            <option value="{{ $identityDocumentType->id }}">{{ $identityDocumentType->type }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Please create identity document type first</option>
                                    @endif
                                </select>
                                <p>Change to</p>
                                <input type="text" name="identity_document_type" id="identity_document_type" class="form-control" placeholder="new Identity document type name">
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
            $('#identityDocumentTypeTable').DataTable();
        });
    </script>
    {{-- end datatables --}}

@endsection