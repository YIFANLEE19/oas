<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterYearMapping extends Model
{
    use HasFactory;
    protected $connection = "mysql";

    /**
     *  The attributes that are mass assignable.
     */
    protected $fillable = [
        'semester_id',
        'year',
    ];
}
