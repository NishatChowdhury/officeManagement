<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leave extends Model
{
    use HasFactory;
    protected $table='leaves';
    protected $fillable=[
        'employee_id',
        'leave_category_id',
        'date',
        'leave_from',
        'leave_to',
        'days',
        'approved_by',
    ];

    public function employee():BelongsTo
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','approved_by');
    }

    public function leaveCategory():BelongsTo
    {
        return $this->belongsTo(LeaveCategory::class,'leave_category_id');
    }
}
