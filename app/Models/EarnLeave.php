<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EarnLeave extends Model
{
    use HasFactory;
    protected $table='earn_leaves';
    protected $fillable=[
        'employee_id',
        'date',
        'balance',
        'previous_balance',
        'next_schedule'
    ];

    public function employee():BelongsTo
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }
}
