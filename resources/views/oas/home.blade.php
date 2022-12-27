@extends('oas.layouts.app')

@section('content')
<div class="container">
    {{-- header --}}
    <div class="row">
        <div class="col-md-8">
            <h1 class="display-5">SUC Online Admission System</h1>
            <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, voluptatibus. Fuga est nisi enim tempora, suscipit, ipsum eligendi id tenetur earum eum laboriosam eaque et nam natus unde inventore! Reiciendis!</p>
        </div>
    </div>
    {{-- end header --}}

    {{-- alert --}}
    @if ($status_code != 5)
        <div class="row mt-4 mb-2">
            <div class="col-xl-12">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading fw-bold">Read me before apply any programme!</h4>
                    <p>Aww yeah, you successfully read this important alert message. Before you apply for any course, you have to fill in three particulars, that is Personal particulars, Parent / Guardian particulars and Emergency contact. When you have finished filling it out, you will see the Apply button</p>
                    <hr>
                    <p class="mb-0">Thank you for your cooperation. I will wait for you at the next step.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    {{-- end alert --}}

    @if ($status_code == 0)
        {{-- personal profile --}}
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body px-4 py-4">
                        <h1>Setup your personal particulars</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione magni, consequatur at tempore repellendus eaque dignissimos nostrum quaerat excepturi quibusdam id numquam similique deserunt iste quae adipisci nesciunt eos iure?</p>
                        <small class="text-secondary"><span class="text-danger">*</span>All information will be treated as private and confidential.</small>
                        <br>
                        <a href="{{ route('personalParticulars.home') }}" class="btn btn-primary mt-2">Click here to setup</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- end personal profile --}}
    @elseif ($status_code == 1 || $status_code == 2)
        {{-- parent / guardian profile --}}
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body px-4 py-4">
                        <h1>Setup your parent / guardian particulars</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione magni, consequatur at tempore repellendus eaque dignissimos nostrum quaerat excepturi quibusdam id numquam similique deserunt iste quae adipisci nesciunt eos iure?</p>
                        <small class="text-secondary"><span class="text-danger">*</span>All information will be treated as private and confidential.</small>
                        <br>
                        <a href="{{ route('parentGuardianParticulars.home') }}" class="btn btn-primary mt-2">Click here to setup</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- end parent / guardian profile --}}
    @elseif ($status_code == 3)
        {{-- emergency contact --}}
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body px-4 py-4">
                        <h1>Setup your emergency contact</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione magni, consequatur at tempore repellendus eaque dignissimos nostrum quaerat excepturi quibusdam id numquam similique deserunt iste quae adipisci nesciunt eos iure?</p>
                        <small class="text-secondary"><span class="text-danger">*</span>All information will be treated as private and confidential.</small>
                        <br>
                        <a href="{{ route('emergencyContact.home') }}" class="btn btn-primary mt-2">Click here to setup</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- end emergency contact --}}
    @elseif ($status_code == 4)
        {{-- profile picture --}}
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body px-4 py-4">
                        <h1>Setup your profile picture</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione magni, consequatur at tempore repellendus eaque dignissimos nostrum quaerat excepturi quibusdam id numquam similique deserunt iste quae adipisci nesciunt eos iure?</p>
                        <small class="text-secondary"><span class="text-danger">*</span>All information will be treated as private and confidential.</small>
                        <br>
                        <a href="{{ route('profilePicture.home') }}" class="btn btn-primary mt-2">Click here to setup</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- end profile picture --}}
    @endif
</div>

{{-- show after profile done --}}
@if ($status_code == 5)
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body px-4 py-4">
                        <h1>Apply programme now!</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et rem, aperiam eos quisquam accusamus voluptatibus, consequatur amet minus quas assumenda nisi, cupiditate quo libero. Illo laborum non nesciunt esse dolor?</p>
                        <small class="text-secondary"><span class="text-danger">*</span>All information will be treated as private and confidential.</small>
                        <br>
                        <a href="" class="btn btn-primary mt-2">Apply programme</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <h3>My profile</h3>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Attention!</strong> Please review your profile again before applying any programme. When you submit your application, we will read your last updated information.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mt-2 mb-2">
                <div class="card">
                    <div class="card-body px-4 py-4">
                        <h1>Personal particulars</h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas ducimus hic, molestias officia velit aliquid alias sapiente, quidem quis asperiores tempore sunt laboriosam modi accusantium deserunt repudiandae, adipisci fuga animi?</p>
                        <a href="{{ route('personalParticulars.view') }}" class="btn btn-primary mt-2">Preview</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-2">
                <div class="card">
                    <div class="card-body px-4 py-4">
                        <h1>Parent / guardian particulars</h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas ducimus hic, molestias officia velit aliquid alias sapiente, quidem quis asperiores tempore sunt laboriosam modi accusantium deserunt repudiandae, adipisci fuga animi?</p>
                        <a href="" class="btn btn-primary mt-2">Preview</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-2">
                <div class="card">
                    <div class="card-body px-4 py-4">
                        <h1>Emergency contact</h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas ducimus hic, molestias officia velit aliquid alias sapiente, quidem quis asperiores tempore sunt laboriosam modi accusantium deserunt repudiandae, adipisci fuga animi?</p>
                        <a href="" class="btn btn-primary mt-2">Preview</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mb-2">
                <div class="card">
                    <div class="card-body px-4 py-4">
                        <h1>Profile picture</h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas ducimus hic, molestias officia velit aliquid alias sapiente, quidem quis asperiores tempore sunt laboriosam modi accusantium deserunt repudiandae, adipisci fuga animi?</p>
                        <a href="" class="btn btn-primary mt-2">Preview</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
