<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantProfile extends Model
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
        'birth_date',
        'place_of_birth',
        'gender_id',
        'marital_id',
        'race_id',
        'nationality_id',
        'religion_id',
        'user_detail_id',
    ];
}
