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
                    <h4 class="alert-heading">{{ Session::get('success') }} </h4>
                    <p>You have successfully submitted your emergency contact to us. You will also need to submit a personal photo to apply for the programme.</p>
                    <hr>
                    <p class="mb-0">If you want to go ahead and upload your <span class="fw-bold">personal photo</span> please click <a href="{{ route('profilePicture.home') }}" class="alert-link">here</a> </p>
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
                        <div class="col-md mb-3">
                            <label for="en_name" class="form-label">English Name<span class="text-danger">*</span></label>
                            <input type="text" name="en_name1" id="en_name1" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-md mb-3">
                            <label for="ch_name" class="form-label">Chinese Name</label>
                            <input type="text" name="ch_name1" id="ch_name1" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md mb-3">
                            <label for="relationship" class="form-label">Relationship</label>
                            <select name="guardian_relationship_id1" id="relationship1" class="form-select" required>
                                <option selected disabled>Choose relationship</option>
                                @foreach ($allRelationships as $relationship)
                                    <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md mb-3">
                            <label for="tel_hp" class="form-label">Tel No. (H/P)<span class="text-danger">*</span></label>
                            <input type="text" name="tel_hp1" id="tel_hp1" class="form-control" placeholder="" required>
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
                        <div class="col-md mb-3">
                            <label for="en_name" class="form-label">English Name<span class="text-danger">*</span></label>
                            <input type="text" name="en_name2" id="en_name2" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-md mb-3">
                            <label for="ch_name" class="form-label">Chinese Name</label>
                            <input type="text" name="ch_name2" id="ch_name2" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md mb-3">
                            <label for="relationship" class="form-label">Relationship</label>
                            <select name="guardian_relationship_id2" id="relationship2" class="form-select" required>
                                <option selected disabled>Choose relationship</option>
                                @foreach ($allRelationships as $relationship)
                                    <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md mb-3">
                            <label for="tel_hp" class="form-label">Tel No. (H/P)<span class="text-danger">*</span></label>
                            <input type="text" name="tel_hp2" id="tel_hp2" class="form-control" placeholder="" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom mt-4 mb-4"></div>
            {{-- end person 2 --}}
            {{-- form submit --}}
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="d-flex flex-column">
                        <p class="text-secondary"><span class="text-danger">*</span>Please reconfirm the information before submitting</p>
                        <button type="submit" class="btn btn-primary col-md-3">Submit</button>
                    </div>
                </div>
            </div>
            {{-- end form submit --}}
        </form>
    </div>
    {{-- end form --}}

    {{-- dselect --}}
    <script>
        const config = {
            search: true, // Toggle search feature. Default: false
        }
        dselect(document.querySelector('#relationship1'), config)
        dselect(document.querySelector('#relationship2'), config)
    </script>

@endsection