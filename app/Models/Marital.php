<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marital extends Model
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
        'name',
        'marital_code',
        'status',
    ];
    public function applicantProfile()
    {
        return $this->hasOne(ApplicantProfile::class);
    }
}
