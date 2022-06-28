<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renew extends Model
{
    use HasFactory;

    protected $fillable=[
        'renewable_id',
        'renewable_type',
        'date',
        'amount'
    ];
}
