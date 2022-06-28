<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeExperience extends Model
{
    use HasFactory;

    protected $fillable=[
        'employee_id',
        'company',
        'business',
        'designation',
        'area_of_experience',
        'experience_location',
        'experience_start',
        'experience_end'
    ];

    public function employee():BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
