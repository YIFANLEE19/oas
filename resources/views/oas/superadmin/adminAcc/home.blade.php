@extends('oas.layouts.superadmin')

@section('content')

    {{-- 
        get foreign id data
        @foreach ($users as $user)
            <p>Username: {{ $user->name }}</p>
            <p>Role: {{ $user->role['name'] }}</p>
        @endforeach
     --}}

    {{-- new role modal --}}
    <div class="modal fade" id="newAdminAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newAdminAccountLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('adminAccount.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="newAdminAccountLabel">Create New Admin Account</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}(Staff ID)</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required autocomplete="email" placeholder="abc@sc.edu.my">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input type="password" name="password_confirmation" id="password-confirm" class="form-control" required autocomplete="new-password">
                        </div>

                        <div class="mb-3">
                            <label for="role_id" class="form-label">Role</label>
                            <select name="role_id" id="role_id" class="form-select">
                                @if(count($roles))
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                @else
                                    <option value="-">Please set the role first!</option>
                                @endif
                            </select>
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
                <h1>Admin account</h1>
                <div class="d-flex justify-content-between">
                    <p class="text-secondary">Manage and create admin accounts here.</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newAdminAccount">Add new account</button>
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
            <div class="col-md-8">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" class="col-md-1">Id</th>
                            <th scope="col" class="col-md-4">Name</th>
                            <th scope="col" class="col-md-2">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @if ($user->role['name'] == 'Local Student')
                                        <span class="badge bg-primary px-3 py-2">{{ $user->role['name'] }}</span>
                                    @else
                                        <span class="badge bg-secondary px-3 py-2">{{ $user->role['name'] }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- end table --}}
    </div>

@endsection