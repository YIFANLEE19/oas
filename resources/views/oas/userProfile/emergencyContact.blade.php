@extends('oas.layouts.app')

@section('content')
    
    {{-- header --}}
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="border-bottom">
                    <h3 class="fw-bold">Emergency Contact</h3>
                    <p class="text-secondary">Next >>> Profile Picture</p>
                </div>
            </div>
        </div>
    </div>
    {{-- end header --}}

    {{-- success message --}}
    @if(Session::has('success'))
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    @endif
    {{-- end success message --}}

    {{-- form --}}
    <div class="container">
        <form action="{{ route('emergencyContact.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- person 1 --}}
            <div class="row d-flex flex-row mt-4">
                <div class="col-md-4">
                    <h4 class="fw-bold">Person 1</h4>
                    <p class="text-secondary"></p>
                </div>
                <div class="col-md-8">
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="en_name1" id="en_name1" class="form-control" placeholder="English name" required>
                                <label for="en_name">English Name<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="ch_name1" id="ch_name1" class="form-control" placeholder="Chinese name">
                                <label for="ch_name">Chinese Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <select name="guardian_relationship_id1" id="relationship" class="form-select" required>
                                    <option selected disabled>Choose relationship</option>
                                    @foreach ($allRelationships as $relationship)
                                        <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                                    @endforeach
                                </select>
                                <label for="relationship">Relationship</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="tel_hp1" id="tel_hp1" class="form-control" placeholder="Tel No. (H/P)" required>
                                <label for="tel_hp">Tel No. (H/P)<span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom mt-4 mb-4"></div>
            {{-- end person 1 --}}
            {{-- person 2 --}}
            <div class="row d-flex flex-row mt-4">
                <div class="col-md-4">
                    <h4 class="fw-bold">Person 2</h4>
                    <p class="text-secondary"></p>
                </div>
                <div class="col-md-8">
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="en_name2" id="en_name2" class="form-control" placeholder="English name" required>
                                <label for="en_name">English Name<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="ch_name2" id="ch_name2" class="form-control" placeholder="Chinese name">
                                <label for="ch_name">Chinese Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <select name="guardian_relationship_id2" id="relationship" class="form-select" required>
                                    <option selected disabled>Choose relationship</option>
                                    @foreach ($allRelationships as $relationship)
                                        <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                                    @endforeach
                                </select>
                                <label for="relationship">Relationship</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 me-3">
                                <input type="text" name="tel_hp2" id="tel_hp2" class="form-control" placeholder="Tel No. (H/P)" required>
                                <label for="tel_hp">Tel No. (H/P)<span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom mt-4 mb-4"></div>
            {{-- end person 2 --}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    {{-- end form --}}

@endsection