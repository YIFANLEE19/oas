<div>
    {{-- The whole world belongs to you. --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <label for="" class="form-label">{{ __('inputFields.intake-my-label') }}</label>
                <select name="semester_year_mapping_id" id="semester_year_mapping_id" class="form-select mb-2" wire:model="selectedSemesterYearMappingId">
                    <option value="" selected hidden>{{ __('inputFields.dropdown-hint') }}</option>
                    @foreach ($semesterYearMappings as $semesterYearMapping)
                        <option value="{{ $semesterYearMapping->id }}">{{ __('inputFields.month') }} {{ $semesterYearMapping->semester['semester'] }}, {{ __('inputFields.year') }} {{ $semesterYearMapping->year }}</option>
                    @endforeach
                </select> 
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">{{ __('inputFields.programme-level-label') }}</label>
                <select name="programme_level" id="programme_level" class="form-select mb-2" wire:model="programmeLevelId" required>
                    <option value="" selected hidden>{{ __('inputFields.dropdown-hint') }}</option>
                    <option value="1">{{ __('inputFields.postgraduate') }}</option>
                    <option value="2">{{ __('inputFields.undergraduate') }}</option>
                </select>
            </div>
        </div>
        @if (!is_null($getOfferProgrammes))
            @if ($programmeLevelId == 1)
                {{-- postgraduate --}}
                <div class="row mt-2">
                    <div class="col-md-12 mb-2">
                        <label for="postgraduateProgramme1" class="form-label">{{ __('inputFields.programme-1') }}<span class="text-danger">*</span></label>
                        <select name="postgraduate_programme_id[]" class="form-select" wire:model="postgraduateProgramme1" required>
                            <option selected hidden value="">{{ __('inputFields.postgraduate-dropdown-hint') }}</option>
                            @foreach ($getOfferProgrammes->except([$postgraduateProgramme2,$postgraduateProgramme3]) as $programme)
                                @if ($programme->programme['programme_level_id'] <=2)
                                    <option value="{{ $programme->id }}">{{ $programme->programme['en_name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-2" id="postgraduateForm2">
                        <label for="postgraduateProgramme2" class="form-label">{{ __('inputFields.programme-2') }}<span class="text-danger">*</span></label>
                        <select name="postgraduate_programme_id[]" class="form-select" wire:model="postgraduateProgramme2" required>
                            <option selected hidden value="">{{ __('inputFields.postgraduate-dropdown-hint') }}</option>
                            @foreach ($getOfferProgrammes->except([$postgraduateProgramme1]) as $programme)
                                @if ($programme->programme['programme_level_id'] <=2)
                                    <option value="{{ $programme->id }}">{{ $programme->programme['en_name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-2" id="postgraduateForm3">
                        <label for="postgraduateProgramme3" class="form-label">{{ __('inputFields.programme-3') }}<span class="text-danger">*</span></label>
                        <select name="postgraduate_programme_id[]" class="form-select" wire:model="postgraduateProgramme3" required>
                            <option selected hidden value="">{{ __('inputFields.postgraduate-dropdown-hint') }}</option>
                            @foreach ($getOfferProgrammes->except([$postgraduateProgramme1,$postgraduateProgramme2]) as $programme)
                                @if ($programme->programme['programme_level_id'] <=2)
                                    <option value="{{ $programme->id }}">{{ $programme->programme['en_name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- end postgraduate --}}
            @elseif($programmeLevelId == 2)
                {{-- undergraduate --}}
                <div class="row mt-2" id="undergraduate">
                    <div class="col-md-12 mb-2" id="undergraduateForm1">
                        <label for="undergraduateProgramme1" class="form-label">{{ __('inputFields.programme-1') }}<span class="text-danger">*</span></label>
                        <select name="undergraduate_programme_id[]" id="undergraduateProgramme1" class="form-select" wire:model="undergraduateProgramme1" required>
                            <option selected hidden value="">{{ __('inputFields.undergraduate-dropdown-hint') }}</option>
                            @foreach ($getOfferProgrammes->except([$undergraduateProgramme2,$undergraduateProgramme3]) as $programme)
                                @if ($programme->programme['programme_level_id'] >2)
                                    <option value="{{ $programme->id }}">{{ $programme->programme['en_name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-2" id="undergraduateForm2">
                        <label for="undergraduateProgramme2" class="form-label">{{ __('inputFields.programme-2') }}<span class="text-danger">*</span></label>
                        <select name="undergraduate_programme_id[]" id="undergraduateProgramme2" class="form-select" wire:model="undergraduateProgramme2" required>
                            <option selected hidden value="">{{ __('inputFields.undergraduate-dropdown-hint') }}</option>
                            @foreach ($getOfferProgrammes->except([$undergraduateProgramme1,$undergraduateProgramme3]) as $programme)
                                @if ($programme->programme['programme_level_id'] >2)
                                    <option value="{{ $programme->id }}">{{ $programme->programme['en_name'] }}</option>                                            
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-2" id="undergraduateForm3">
                        <label for="undergraduateProgramme3" class="form-label">{{ __('inputFields.programme-3') }}<span class="text-danger">*</span></label>
                        <select name="undergraduate_programme_id[]" id="undergraduateProgramme3" class="form-select" wire:model="undergraduateProgramme3" required>
                            <option selected hidden value="">{{ __('inputFields.undergraduate-dropdown-hint') }}</option>
                            @foreach ($getOfferProgrammes->except([$undergraduateProgramme1,$undergraduateProgramme2]) as $programme)
                                @if ($programme->programme['programme_level_id'] >2)
                                    <option value="{{ $programme->id }}">{{ $programme->programme['en_name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- end undergraduate --}} 
            @endif           
        @endif
    </div>
</div>
