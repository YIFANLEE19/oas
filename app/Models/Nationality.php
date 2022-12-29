<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    use HasFactory;

    /**
     * timestamps false
     */
    public $timestamps = false;

    /**
     *  The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'nationality_code',
        'status',
    ];
    public function applicantProfile()
    {
        return $this->hasOne(ApplicantProfile::class);
    }
    public function guardianDetail()
    {
        return $this->hasOne(GuardianDetail::class);
    }
}
