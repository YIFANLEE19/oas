<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgrammeRecord extends Model
{
    use HasFactory;
    protected $connection = "mysql";
    
    /**
     * timestamps false
     */
    public $timestamps = false;

    /**
     *  The attributes that are mass assignable.
     */
    protected $fillable = [
        'semester_year_mapping_id',
        'programme_id',
    ];
    
    public function semesterYearMapping()
    {
        return $this->belongsTo(SemesterYearMapping::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function programmePicked()
    {
        return $this->hasOne(ProgrammePicked::class);
    }
}
