@extends('oas.layouts.app')

@section('content')

{{-- header --}}
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="border-bottom">
                <h1 class="fw-bold">My profile - {{ __('parentGuardianParticulars.pageTitle') }}</h1>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('parentGuardianParticulars.home') }}</a></li>
                      <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('parentGuardianParticulars.pageTitle') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
{{-- end header --}}

{{-- update success --}}
@if(Session::has('success') && Session::get('success') == 'success')
<div class="container mt-2">
    <div class="row">
        <div class="col-xl-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ __('parentGuardianParticulars.update_success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
@endif
{{-- end update success --}}

{{-- data --}}
<div class="container">

    {{-- name --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">{{ __('parentGuardianParticulars.name') }}</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('parentGuardianParticulars.en_name') }}</p>
                    <h5 class="text-capitalize">{{ $user_detail->en_name }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('parentGuardianParticulars.ch_name') }}</p>
                    @if ($user_detail->ch_name == '')
                        <h5>-</h5>
                    @else
                        <h5>{{ $user_detail->ch_name }}</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end name --}}

    {{-- ic --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">{{ __('parentGuardianParticulars.identity_card_passport') }}</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">Your IC / Passport</p>
                    <h5 id="read_ic">{{ $user_detail->ic }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end ic --}}

    {{-- relationship & nationality --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">{{ __('parentGuardianParticulars.relationship_nationality') }}</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('parentGuardianParticulars.relationship') }}</p>
                    <h5>{{ $guardian_detail->guardianRelationship['name'] }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('parentGuardianParticulars.nationality') }}</p>
                    <h5>{{ $guardian_detail->nationality['name'] }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end relationship & nationality --}}

    {{-- occupation, family income --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">{{ __('parentGuardianParticulars.occupation_family_income') }}</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('parentGuardianParticulars.occupation') }}</p>
                    <h5>{{ $guardian_detail->occupation }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('parentGuardianParticulars.income_range') }}</p>
                    <h5>{{ $guardian_detail->income['range'] }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end occupation, family income --}}

    {{-- contact --}}
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">{{ __('parentGuardianParticulars.contact') }}</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('parentGuardianParticulars.tel_hp') }}</p>
                    <h5>{{ $user_detail->tel_hp }}</h5>
                </div>
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('parentGuardianParticulars.email_address') }}</p>
                    @if ($user_detail->email != null)
                        <h5>{{ $user_detail->email }}</h5>
                    @else
                        <h5>-</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end contact --}}

    {{-- permanent address --}}
    <div class="row d-flex flex-row mt-4 mb-4">
        <div class="col-md-4">
            <h4 class="fw-bold">{{ __('parentGuardianParticulars.permanent_address') }}</h4>
        </div>
        <div class="col-md-8">
            <div class="row g-2">
                <div class="col-md mb-3">
                    <p class="text-secondary">{{ __('parentGuardianParticulars.address') }}</p>
                    <h5>{{ $p_address->street1 }},{{ $p_address->street2 }},{{ $p_address->zipcode }},{{ $p_address->city }},{{ $p_address->state }},{{ $p_address->country['name'] }}.</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom mt-2 mb-4"></div>
    {{-- end permanent address --}}

    {{-- edit button --}}
    <div class="row ">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">{{ __('parentGuardianParticulars.edit_button') }}</button>
        </div>
    </div>
    {{-- end edit button --}}

</div>
{{-- end data --}}

<!-- modal -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <form action="{{ route('parentGuardianParticulars.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="editModalLabel">{{ __('parentGuardianParticulars.edit_button') }}</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">

                        <input type="hidden" name="guardian_detail_id" value="{{ $guardian_detail->id }}">
                        <input type="hidden" name="user_detail_id" value="{{ $user_detail->id }}">
                        <input type="hidden" name="p_address_id" value="{{ $p_address->id }}">

                        {{-- name --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('parentGuardianParticulars.name') }}</h4>
                                <p class="text-secondary">{{ __('parentGuardianParticulars.name_description') }}</p>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-2">
                                    <div class="col-md mb-3">
                                        <label for="en_name" class="form-label">{{ __('parentGuardianParticulars.en_name') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="en_name" id="en_name" class="form-control text-capitalize" value="{{ $user_detail->en_name }}" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="ch_name" class="form-label">{{ __('parentGuardianParticulars.ch_name') }}</label>
                                        <input type="text" name="ch_name" id="ch_name" class="form-control" value="{{ $user_detail->ch_name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end name --}}

                        {{-- ic / passport --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('parentGuardianParticulars.identity_card_passport') }}</h4>
                                <p class="text-secondary">{{ __('parentGuardianParticulars.ic_description1') }}</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="changeInput" onclick="changeInputMethod()">
                                    <label class="form-check-label" for="changeInput">
                                        {{ __('parentGuardianParticulars.ic_checkbox') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row" id="ic_section">
                                    <label for="ic" class="form-label">{{ __('parentGuardianParticulars.ic') }}<span class="text-danger">*</span></label>
                                    <div class="col-md d-flex flex-row align-items-center mb-3">
                                        <input type="text" name="ic1" id="ic1" class="form-control" placeholder="" maxlength="6" required>
                                        <span class="ms-4">-</span>
                                    </div>
                                    <div class="col-md d-flex flex-row align-items-center mb-3">
                                        <input type="text" name="ic2" id="ic2" class="form-control" placeholder="" maxlength="2" required>
                                        <span class="ms-4">-</span>
                                    </div>
                                    <div class="col-md mb-3">
                                        <input type="text" name="ic3" id="ic3" class="form-control" placeholder="" maxlength="4" required>
                                    </div>
                                </div>
                                <div class="row" id="passport_section" style="display: none;">
                                    <label for="ic" class="form-label">{{ __('parentGuardianParticulars.passport') }}<span class="text-danger">*</span></label>
                                    <div class="col-md mb-3">
                                        <input type="text" name="passport" id="passport" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end ic /passport --}}

                        {{-- script --}}
                        <script>
                                
                            let text = document.getElementById('read_ic').innerHTML;
                            const myArray = text.split("-");
                            const changeInput = document.getElementById('changeInput');
                            const ic_section = document.getElementById('ic_section');
                            const passport_section = document.getElementById('passport_section');
                            const ic1 = document.getElementById('ic1');
                            const ic2 = document.getElementById('ic2');
                            const ic3 = document.getElementById('ic3');
                            const passport = document.getElementById('passport');

                            if(myArray.length != 3){
                                document.getElementById("passport").value = myArray[0];
                                changeInput.checked = true;
                                ic_section.style.display = 'none';
                                passport_section.style.display = 'block';
                            }else{
                                document.getElementById("ic1").value = myArray[0]; 
                                document.getElementById("ic2").value = myArray[1]; 
                                document.getElementById("ic3").value = myArray[2]; 

                            }

                            function changeInputMethod(){
                                if(changeInput.checked){
                                    ic_section.style.display = 'none';
                                    passport_section.style.display = 'block';
                                    passport.setAttribute('required','');
                                    ic1.removeAttribute('required');
                                    ic2.removeAttribute('required');
                                    ic3.removeAttribute('required');
                                    ic1.value = '';
                                    ic2.value = '';
                                    ic3.value = '';

                                }else{
                                    ic_section.style.removeProperty('display');
                                    passport_section.style.display = 'none';
                                    passport.removeAttribute('required');
                                    ic1.setAttribute('required','');
                                    ic2.setAttribute('required','');
                                    ic3.setAttribute('required','');
                                    passport.value = '';
                                }
                            }
                        </script>
                        {{-- end script --}}

                        {{-- relationship, nationality --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('parentGuardianParticulars.relationship_nationality') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="relationship" class="form-label">{{ __('parentGuardianParticulars.realtionship') }}<span class="text-danger">*</span></label>
                                        <select name="guardian_relationship_id" id="relationship" class="form-select" required>
                                            <option value="{{ $guardian_detail->guardian_relationship_id }}" selected>{{ $guardian_detail->guardianRelationship['name'] }}</option>
                                            @foreach ($allRelationships as $relationship)
                                                <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="nationality" class="form-label">{{ __('parentGuardianParticulars.nationality') }}<span class="text-danger">*</span></label>
                                        <select name="nationality_id" id="nationality" class="form-select" required>
                                            <option value="{{ $guardian_detail->nationality_id }}" selected>{{ $guardian_detail->nationality['name'] }}</option>
                                            @foreach ($allNationalities as $nationality)
                                                <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end relationship, nationality --}}

                        {{-- occupation, family income --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('parentGuardianParticulars.occupation_family_income') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="occupation" class="form-label">{{ __('parentGuardianParticulars.occupation') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="occupation" id="occupation" class="form-control" value="{{ $guardian_detail->occupation }}" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="income" class="form-label">{{ __('parentGuardianParticulars.income_range') }}<span class="text-danger">*</span></label>
                                        <select name="income_id" id="income" class="form-select" required>
                                            <option value="{{ $guardian_detail->income_id }}" selected>{{ $guardian_detail->income['range'] }}</option>
                                            @foreach ($allIncomes as $income)
                                                <option value="{{ $income->id }}">{{ $income->range }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end occupation, family income --}}

                        {{-- contact --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('parentGuardianParticulars.contact') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md mb-3">
                                        <label for="tel_hp" class="form-label">{{ __('parentGuardianParticulars.tel_hp') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="tel_hp" id="tel_hp" class="form-control" value="{{ $user_detail->tel_hp }}" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="email" class="form-label">{{ __('parentGuardianParticulars.email_address') }}</label>
                                        <input type="text" name="email" id="email" class="form-control" value="{{ $user_detail->email }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-4 mb-4"></div>
                        {{-- end contact --}}

                        {{-- permanent address --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ __('parentGuardianParticulars.permanent_address') }}</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="p_street1" class="form-label">{{ __('parentGuardianParticulars.address_line1') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_street1" id="p_street1" class="form-control" value="{{ $p_address->street1 }}" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="p_street2" class="form-label">{{ __('parentGuardianParticulars.address_line2') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_street2" id="p_street2" class="form-control" value="{{ $p_address->street2 }}" required>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="p_zipcode" class="form-label">{{ __('parentGuardianParticulars.zipcode') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_zipcode" id="p_zipcode" class="form-control" value="{{ $p_address->zipcode}}" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="p_city" class="form-label">{{ __('parentGuardianParticulars.city') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_city" id="p_city" class="form-control" value="{{ $p_address->city }}" required>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md mb-3">
                                        <label for="p_state" class="form-label">{{ __('parentGuardianParticulars.state') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="p_state" id="p_state" class="form-control" value="{{ $p_address->state }}" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="p_country" class="form-label">{{ __('parentGuardianParticulars.country') }}<span class="text-danger">*</span></label>
                                        <select name="p_country_id" id="p_country" class="form-select" required>
                                            <option value="{{ $p_address->country_id }}" selected>{{ $p_address->country['name'] }}</option>
                                            @foreach ($allCountries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end permanent address --}}

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('parentGuardianParticulars.close_button') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('parentGuardianParticulars.save_button') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection