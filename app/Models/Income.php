<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
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
        'range',
        'income_code',
        'status',
    ];
    public function guardianDetail()
    {
        return $this->hasOne(GuardianDetail::class);
    }
}
