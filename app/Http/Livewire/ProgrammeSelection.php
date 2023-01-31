<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SemesterYearMapping;
use App\Models\ProgrammeRecord;

class ProgrammeSelection extends Component
{
    public $selectedSemesterYearMappingId = null;
    public $getOfferProgrammes = null;
    public $selectedProgramme = null;
    public $programmeLevelId = null;
    public $postgraduate_programme_id = [null, null, null];
    

    public function render()
    {
        return view('livewire.programme-selection',[
            'semesterYearMappings' => SemesterYearMapping::where('year','=',date('Y'))->get(),
        ]);
    }

    public function updatedSelectedSemesterYearMappingId($semester_year_mapping_id)
    {
        $this->getOfferProgrammes = ProgrammeRecord::where('semester_year_mapping_id',$semester_year_mapping_id)->get();
    }

    public function updatedProgrammeLevelId($programme_level_id)
    {
        $this->programmeLevelId =$programme_level_id;
    }

}
