<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChoicePriority extends Model
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
        'choice',
    ];
}
