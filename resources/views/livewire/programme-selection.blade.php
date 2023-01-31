<div>
    {{-- The whole world belongs to you. --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <label for="" class="form-label">Intake Month & Year</label>
                <select name="semester_year_mapping_id" id="semester_year_mapping_id" class="form-select mb-2" wire:model="selectedSemesterYearMappingId">
                    <option value="" selected hidden>Please select</option>
                    @foreach ($semesterYearMappings as $semesterYearMapping)
                        <option value="{{ $semesterYearMapping->id }}">Month: {{ $semesterYearMapping->semester['semester'] }}, Year: {{ $semesterYearMapping->year }}</option>
                    @endforeach
                </select> 
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Programme Level</label>
                <select name="programme_level" id="programme_level" class="form-select mb-2" wire:model="programmeLevelId" required>
                    <option value="" selected hidden>Please select</option>
                    <option value="1">Postgraduate</option>
                    <option value="2">Undergraduate</option>
                </select>
            </div>
        </div>
        @if (!is_null($getOfferProgrammes))
            @if ($programmeLevelId == 1)
                {{-- postgraduate --}}
                <div class="row mt-2" id="postgraduate">
                    <div class="col-md-12 mb-2" id="postgraduateForm1">
                        <label for="postgraduateProgramme1" class="form-label">Programme 1<span class="text-danger">*</span></label>
                        <select name="postgraduate_programme_id[]" id="postgraduateProgramme1" class="form-select" onchange="postgraduateChoice1()">
                            <option disabled selected hidden value="">Please select postgraduate programme</option>
                            @foreach ($getOfferProgrammes as $programme)
                                @if ($programme->programme['programme_level_id'] <=2)
                                    <option value="{{ $programme->id }}">{{ $programme->programme['en_name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-2" id="postgraduateForm2">
                        <label for="postgraduateProgramme2" class="form-label">Programme 2<span class="text-danger">*</span></label>
                        <select name="postgraduate_programme_id[]" id="postgraduateProgramme2" class="form-select" onchange="postgraduateChoice2()">
                            <option disabled selected hidden value="">Please select postgraduate programme</option>
                            @foreach ($getOfferProgrammes as $programme)
                                @if ($programme->programme['programme_level_id'] <=2)
                                    <option value="{{ $programme->id }}">{{ $programme->programme['en_name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-2" id="postgraduateForm3">
                        <label for="postgraduateProgramme3" class="form-label">Programme 3<span class="text-danger">*</span></label>
                        <select name="postgraduate_programme_id[]" id="postgraduateProgramme3" class="form-select" onchange="postgraduateChoice3()">
                            <option disabled selected hidden value="">Please select postgraduate programme</option>
                            @foreach ($getOfferProgrammes as $programme)
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
                        <label for="undergraduateProgramme1" class="form-label">Programme 1<span class="text-danger">*</span></label>
                        <select name="undergraduate_programme_id[]" id="undergraduateProgramme1" class="form-select" onchange="undergraduateChoice1()">
                            <option disabled selected hidden value="">Please select undergraduate programme</option>
                            @foreach ($getOfferProgrammes as $programme)
                                @if ($programme->programme['programme_level_id'] >2)
                                    <option value="{{ $programme->id }}">{{ $programme->programme['en_name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-2" id="undergraduateForm2">
                        <label for="undergraduateProgramme2" class="form-label">Programme 2<span class="text-danger">*</span></label>
                        <select name="undergraduate_programme_id[]" id="undergraduateProgramme2" class="form-select" onchange="undergraduateChoice2()">
                            <option disabled selected hidden value="">Please select undergraduate programme</option>
                            @foreach ($getOfferProgrammes as $programme)
                                @if ($programme->programme['programme_level_id'] >2)
                                    <option value="{{ $programme->id }}">{{ $programme->programme['en_name'] }}</option>                                            
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-2" id="undergraduateForm3">
                        <label for="undergraduateProgramme3" class="form-label">Programme 3<span class="text-danger">*</span></label>
                        <select name="undergraduate_programme_id[]" id="undergraduateProgramme3" class="form-select" onchange="undergraduateChoice3()">
                            <option disabled selected hidden value="">Please select undergraduate programme</option>
                            @foreach ($getOfferProgrammes as $programme)
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
