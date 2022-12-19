@extends('oas.layouts.superadmin')

@section('content')
    {{-- new role modal --}}
    <div class="modal fade" id="newIncome" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newIncomeLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('income.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="newIncomeLabel">Create New Income Range</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="income_code" class="form-label">Income code</label>
                            <input type="text" name="income_code" id="income_code" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="income_range" class="form-label">Income range</label>
                            <input type="text" name="income_range" id="income_range" class="form-control">
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
                <h1 class="fw-bold">Income range</h1>
                <div class="d-flex justify-content-between">
                    <p class="text-secondary">Manage your income range here.</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newIncome">Add new income range</button>
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
                <table class="table align-middle" id="incomeTable">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" class="col-md-1">Income code</th>
                            <th scope="col" class="col-md-4">Range</th>
                            <th scope="col" class="col-md-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($incomes))
                            @foreach ($incomes as $income)
                                <tr>
                                    <th scope="row">{{ $income->income_code }}</th>
                                    <td>{{ $income->range }}</td>
                                    <td>
                                        @if ($income->status == '0')
                                            <span class="badge bg-warning px-3 py-2">Inactive</span>
                                        @elseif ($income->status == '1')
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
                    <form action="{{ route('income.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header bg-primary text-white">Edit Income range</div>
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="id" class="form-label">Income code</label>
                                <select name="id" id="id" class="form-select mb-2">
                                    @if (count($incomes))
                                        @foreach ($incomes as $income)
                                            <option value="{{ $income->id }}">{{ $income->income_code }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Please create income code</option>
                                    @endif
                                </select>
                                <p>Change to</p>
                                <input type="text" name="income_code" id="income_code" class="form-control mb-2" placeholder="new income code">
                                <input type="text" name="income_range" id="income_range" class="form-control mb-2" placeholder="new income range">
                            </div>
                            <div class="mb-2">
                                <div class="form-check">
                                    <input type="radio" name="income_status" id="income_status1" class="form-check-input" value="0">
                                    <label for="income_status" class="form-check label">Inavtive</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="income_status" id="income_status2" class="form-check-input" value="1" checked>
                                    <label for="income_status" class="form-check label">Active</label>
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
            $('#incomeTable').DataTable();
        });
    </script>
    {{-- end datatables --}}
@endsection