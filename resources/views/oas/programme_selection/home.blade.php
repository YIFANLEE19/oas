@extends('oas.layouts.app')

@section('content')

{{-- header --}}
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="border-bottom">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('button.home') }}</a></li>
                      <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('programmeSelect.title') }}</li>
                    </ol>
                </nav>
                <h1 class="fw-bold">{{ __('programmeSelect.title') }}</h1>
                <p><span class="fw-bold">Step 1 of 7</span> Completed</p>
                <div class="progress mb-2" style="height: 10px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 14%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary opacity-25" role="progressbar" style="width: 86%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end header --}}

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('programmeSelect.title') }}</div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="form-label">Intake Month & Year</label>
                                    <select name="semester_year_mapping_id" id="semester_year_mapping_id" class="form-select mb-2">
                                        @foreach ($getSemesterYearMappings as $getSemesterYearMapping)
                                            <option value="{{ $getSemesterYearMapping->id }}">Month: {{ $getSemesterYearMapping->semester['semester'] }}, Year: {{ $getSemesterYearMapping->year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Programme Level</label>
                                    <select name="programme_level" id="programme_level" class="form-select mb-2" onchange="checkProgrammeLevel()">
                                        <option disabled selected hidden value="">Please select your programme level</option>
                                        <option value="1">Postgraduate</option>
                                        <option value="2">Undergraduate</option>
                                    </select>
                                </div>
                            </div>
                            {{-- postgraduate --}}
                            <div class="row mt-2" id="postgraduate" style="display: none;">
                                <div class="col-md-12 mb-2" id="postgraduateForm1" style="display: none;">
                                    <label for="postgraduateProgramme1" class="form-label">Programme 1<span class="text-danger">*</span></label>
                                    <select name="postgraduateProgramme[]" id="postgraduateProgramme1" class="form-select" onchange="postgraduateChoice1()">
                                        <option disabled selected hidden value="">Please select postgraduate programme</option>
                                        @foreach ($getOfferProgrammes as $programme)
                                            @if ($programme->programme['programme_level_id'] <=2)
                                                <option value="{{ $programme->id }}">{{ $programme->programme['en_name'] }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-2" id="postgraduateForm2" style="display: none;">
                                    <label for="postgraduateProgramme2" class="form-label">Programme 2<span class="text-danger">*</span></label>
                                    <select name="postgraduateProgramme[]" id="postgraduateProgramme2" class="form-select" onchange="postgraduateChoice2()">
                                        <option disabled selected hidden value="">Please select postgraduate programme</option>
                                        @foreach ($getOfferProgrammes as $programme)
                                            @if ($programme->programme['programme_level_id'] <=2)
                                                <option value="{{ $programme->id }}">{{ $programme->programme['en_name'] }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-2" id="postgraduateForm3" style="display: none;">
                                    <label for="postgraduateProgramme3" class="form-label">Programme 3<span class="text-danger">*</span></label>
                                    <select name="postgraduateProgramme[]" id="postgraduateProgramme3" class="form-select" onchange="postgraduateChoice3()">
                                        <option disabled selected hidden value="">Please select postgraduate programme</option>
                                        @foreach ($getOfferProgrammes as $programme)
                                            @if ($programme->programme['programme_level_id'] <=2)
                                                <option value="{{ $programme->id }}">{{ $programme->programme['en_name'] }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="form-check mt-2" style="display: none;" id="resetPostgraduateProgrammeSection">
                                        <input class="form-check-input" type="checkbox" value="" id="resetPostgraduateProgrammeCheckbox" onclick="resetPostgraduateProgramme()">
                                        <label class="form-check-label" for="resetPostgraduateProgrammeCheckbox">reset</label>
                                    </div>
                                </div>
                            </div>
                            {{-- end postgraduate --}}
                            {{-- undergraduate --}}
                            <div class="row mt-2" id="undergraduate" style="display: none;">
                                <div class="col-md-12 mb-2" id="undergraduateForm1" style="display: none;">
                                    <label for="undergraduateProgramme1" class="form-label">Programme 1<span class="text-danger">*</span></label>
                                    <select name="undergraduateProgramme[]" id="undergraduateProgramme1" class="form-select" onchange="undergraduateChoice1()">
                                        <option disabled selected hidden value="">Please select undergraduate programme</option>
                                        @foreach ($getOfferProgrammes as $programme)
                                            @if ($programme->programme['programme_level_id'] >2)
                                                <option value="{{ $programme->id }}">{{ $programme->programme['en_name'] }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-2" id="undergraduateForm2" style="display: none;">
                                    <label for="undergraduateProgramme2" class="form-label">Programme 2<span class="text-danger">*</span></label>
                                    <select name="undergraduateProgramme[]" id="undergraduateProgramme2" class="form-select" onchange="undergraduateChoice2()">
                                        <option disabled selected hidden value="">Please select undergraduate programme</option>
                                        @foreach ($getOfferProgrammes as $programme)
                                            @if ($programme->programme['programme_level_id'] >2)
                                                <option value="{{ $programme->id }}">{{ $programme->programme['en_name'] }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-2" id="undergraduateForm3" style="display: none;">
                                    <label for="undergraduateProgramme3" class="form-label">Programme 3<span class="text-danger">*</span></label>
                                    <select name="undergraduateProgramme[]" id="undergraduateProgramme3" class="form-select" onchange="undergraduateChoice3()">
                                        <option disabled selected hidden value="">Please select undergraduate programme</option>
                                        @foreach ($getOfferProgrammes as $programme)
                                            @if ($programme->programme['programme_level_id'] >2)
                                                <option value="{{ $programme->id }}">{{ $programme->programme['en_name'] }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="form-check mt-2" style="display: none;" id="resetUndergraduateProgrammeSection">
                                        <input class="form-check-input" type="checkbox" value="" id="resetUndergraduateProgrammeCheckbox" onclick="resetUndergraduateProgramme()">
                                        <label class="form-check-label" for="resetUndergraduateProgrammeCheckbox">reset</label>
                                    </div>
                                </div>
                            </div>
                            {{-- end undergraduate --}}
                        </div>
                    </form>           
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary me-3">{{ __('button.back_to_home_page') }}</a>
                        <button type="submit" class="btn btn-primary me-3">{{ __('statusOfHealth.next_button') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const programmeLevelDropdown = document.getElementById('programme_level');
    const postgraduateSection = document.getElementById('postgraduate');
    const undergraduateSection = document.getElementById('undergraduate');

    const undergraduateProgramme1 = document.getElementById('undergraduateProgramme1');
    const undergraduateForm1 = document.getElementById('undergraduateForm1');
    const undergraduateForm2 = document.getElementById('undergraduateForm2');
    const undergraduateForm3 = document.getElementById('undergraduateForm3');
    const resetUndergraduateProgrammeCheckbox = document.getElementById('resetUndergraduateProgrammeCheckbox');
    const resetUndergraduateProgrammeSection = document.getElementById('resetUndergraduateProgrammeSection');

    const postgraduateProgramme1 = document.getElementById('postgraduateProgramme1');
    const postgraduateForm1 = document.getElementById('postgraduateForm1');
    const postgraduateForm2 = document.getElementById('postgraduateForm2');
    const postgraduateForm3 = document.getElementById('postgraduateForm3');
    const resetPostgraduateProgrammeCheckbox = document.getElementById('resetPostgraduateProgrammeCheckbox');
    const resetPostgraduateProgrammeSection = document.getElementById('resetPostgraduateProgrammeSection');

    const undergraduateTemps = [];
    const postgraduateTemps = [];

    function checkProgrammeLevel(){
        if(programmeLevelDropdown.value == 1){
            undergraduateSection.style.display = 'none';
            postgraduateSection.style.display = 'block';
            undergraduateForm1.style.display = 'none';
            postgraduateForm1.style.removeProperty('display');
            programmeLevelDropdown.disabled = true;
        }else{
            undergraduateSection.style.removeProperty('display');
            undergraduateForm1.style.removeProperty('display');
            postgraduateSection.style.display = 'none';
            programmeLevelDropdown.disabled = true;
        }
    }

    function undergraduateChoice1(){
        var option;
        undergraduateTemps[0] = undergraduateProgramme1.value;
        undergraduateForm2.style.removeProperty('display');
        undergraduateProgramme1.disabled=true;
        for (var i=0; i<undergraduateProgramme2.options.length; i++) {
            option = undergraduateProgramme2.options[i];
            if (option.value == undergraduateTemps[0]) {
                option.setAttribute('hidden','');
            }
        }
        for (var i=0; i<undergraduateProgramme3.options.length; i++) {
            option = undergraduateProgramme3.options[i];
            if (option.value == undergraduateTemps[0]) {
                option.setAttribute('hidden','');
            } 
        }
    }

    function postgraduateChoice1(){
        var option;
        postgraduateTemps[0] = postgraduateProgramme1.value;
        postgraduateForm2.style.removeProperty('display');
        postgraduateProgramme1.disabled=true;
        for (var i=0; i<postgraduateProgramme2.options.length; i++) {
            option = postgraduateProgramme2.options[i];
            if (option.value == postgraduateTemps[0]) {
                option.setAttribute('hidden','');
            }
        }
        for (var i=0; i<postgraduateProgramme3.options.length; i++) {
            option = postgraduateProgramme3.options[i];
            if (option.value == postgraduateTemps[0]) {
                option.setAttribute('hidden','');
            } 
        }
    }

    function undergraduateChoice2(){
        var option;
        undergraduateTemps[1] = undergraduateProgramme2.value;
        undergraduateForm3.style.removeProperty('display');
        undergraduateProgramme2.disabled=true;
        for (var i=0; i<undergraduateProgramme3.options.length; i++) {
            option = undergraduateProgramme3.options[i];
            if (option.value == undergraduateTemps[1]) {
                option.setAttribute('hidden','');
            } 
        }
    }

    function postgraduateChoice2(){
        var option;
        postgraduateTemps[1] = postgraduateProgramme2.value;
        postgraduateForm3.style.removeProperty('display');
        postgraduateProgramme2.disabled=true;
        for (var i=0; i<postgraduateProgramme3.options.length; i++) {
            option = postgraduateProgramme3.options[i];
            if (option.value == postgraduateTemps[1]) {
                option.setAttribute('hidden','');
            } 
        }
    }

    function undergraduateChoice3(){
        undergraduateTemps[2] = undergraduateProgramme3.value;
        resetUndergraduateProgrammeSection.style.removeProperty('display');
    }

    function postgraduateChoice3(){
        postgraduateTemps[2] = postgraduateProgramme3.value;
        resetPostgraduateProgrammeSection.style.removeProperty('display');
    }

    function resetUndergraduateProgramme(){
        if(resetUndergraduateProgrammeCheckbox.checked){
            undergraduateForm1.style.display='none';
            undergraduateForm2.style.display='none';
            undergraduateForm3.style.display='none';
            resetUndergraduateProgrammeSection.style.display='none';
            for (var i=0; i<undergraduateProgramme2.options.length; i++) {
                option = undergraduateProgramme2.options[i];
                if (option.value == undergraduateTemps[0]) {
                    option.removeAttribute('hidden');
                }
            }
            for (var i=0; i<undergraduateProgramme3.options.length; i++) {
                option = undergraduateProgramme3.options[i];
                if (option.value == undergraduateTemps[0]) {
                    option.removeAttribute('hidden');
                }
                if (option.value == undergraduateTemps[1]) {
                    option.removeAttribute('hidden');
                }
            }            
            undergraduateProgramme1.disabled=false;
            undergraduateProgramme2.disabled=false;
            undergraduateProgramme3.disabled=false;
            undergraduateProgramme1.value='';
            undergraduateProgramme2.value='';
            undergraduateProgramme3.value='';
            resetUndergraduateProgrammeCheckbox.checked=false;
            programmeLevelDropdown.disabled = false;
            programmeLevelDropdown.value = '';
        }
    }

    function resetPostgraduateProgramme(){
        if(resetPostgraduateProgrammeCheckbox.checked){
            postgraduateForm1.style.display='none';
            postgraduateForm2.style.display='none';
            postgraduateForm3.style.display='none';
            resetPostgraduateProgrammeSection.style.display='none';
            for (var i=0; i<postgraduateProgramme2.options.length; i++) {
                option = postgraduateProgramme2.options[i];
                if (option.value == postgraduateTemps[0]) {
                    option.removeAttribute('hidden');
                }
            }
            for (var i=0; i<postgraduateProgramme3.options.length; i++) {
                option = postgraduateProgramme3.options[i];
                if (option.value == postgraduateTemps[0]) {
                    option.removeAttribute('hidden');
                }
                if (option.value == postgraduateTemps[1]) {
                    option.removeAttribute('hidden');
                }
            }
            postgraduateProgramme1.disabled=false;
            postgraduateProgramme2.disabled=false;
            postgraduateProgramme3.disabled=false;
            postgraduateProgramme1.value='';
            postgraduateProgramme2.value='';
            postgraduateProgramme3.value='';
            resetPostgraduateProgrammeCheckbox.checked=false;
            programmeLevelDropdown.disabled = false;
            programmeLevelDropdown.value = '';
        }
    }





</script>
{{-- <script>
    jQuery(function($) {
        var backups = {};
        $("select[id^=undergraduateProgramme]").change(function() {
            var v = $(this).val();
            var f = false;
            $("select[id^=undergraduateProgramme]").not(this).each(function() {
                if($(this).val() == v) {
                    f = true;
                    return;                
                }
            });
            if(f) {
                $(this).val(backups[$(this).attr("id")]);
                alert("Please do not choose the same programme!");
            }
            else {
                backups[$(this).attr("id")] = v;
            }
        }).val(null);
    });
</script> --}}
{{-- <script>
    jQuery(function($) {
        var backups = {};
        $("select[id^=postgraduateProgramme]").change(function() {
            var v = $(this).val();
            var f = false;
            $("select[id^=postgraduateProgramme]").not(this).each(function() {
                if($(this).val() == v) {
                    f = true;
                    return;                
                }
            });
            if(f) {
                $(this).val(backups[$(this).attr("id")]);
                alert("Please do not choose the same programme!");
            }
            else {
                backups[$(this).attr("id")] = v;
            }
        }).val(null);
    });
</script> --}}
@endsection