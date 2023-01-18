<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolLevel extends Model
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
        'status',
    ];

    public function academicRecord(){
        return $this->hasOne(AcademicRecord::class);
    }

    public function schoolLevel(){
        return $this->hasOne(SchoolLevel::class);
    }
}
