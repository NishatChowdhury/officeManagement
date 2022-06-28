<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_name',
        'registration_id',
        'access_id',
        'department',
        'unit_id',
        'access_time',
        'access_date',
        'user_name',
        'card',
    ];

    protected $dates = ['access_date','access_time'];
}
