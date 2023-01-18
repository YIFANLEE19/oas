@extends('oas.layouts.app')

@section('content')

<div class="container">
    <div class="row mb-3 mt-4">
        <div class="col-12">
            <h3 class="fw-bold">History</h3>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12 table-responsive">
            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Application Record Id</th>
                        <th scope="col">Application Status Id</th>
                        <th scope="col">Academic detail</th>
                        <th scope="col">Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($latest_asls as $asl)
                        <tr>
                            <td scope="row">{{ $asl->application_record_id }}</td>
                            <td>{{ $asl->application_status_id }}</td>
                            <td><a href="">Here</a></td>
                            <td>{{ $asl->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection