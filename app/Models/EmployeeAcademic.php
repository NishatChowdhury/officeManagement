<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeAcademic extends Model
{
    use HasFactory;
    protected $fillable=[
        'employee_id',
        'education_id',
        'degree_id',
        'major',
        'institute',
        'result_id',
        'marks',
        'year',
        'duration',
        'achievement',
    ];

    public function employee():BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function education():BelongsTo
    {
        return $this->belongsTo(Education::class);
    }

    public function academicResult():BelongsTo
    {
        return $this->belongsTo(AcademicResult::class,'result_id');
    }
}
