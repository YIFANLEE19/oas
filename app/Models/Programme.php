<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;
    protected $connection = "mysql";

    /**
     *  The attributes that are mass assignable.
     */
    protected $fillable = [
        'en_name',
        'programme_level_id',
        'programme_type_id',
        'status',
    ];
}
