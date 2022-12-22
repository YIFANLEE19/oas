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
    {{-- end alert --}}

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
    
</div>
@endsection
