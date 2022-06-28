<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeTraining extends Model
{
    use HasFactory;

    protected $fillable=[
        'employee_id',
        'training_title',
        'topics_covered',
        'training_institute',
        'training_year',
        'training_duration',
        'training_location',
        'training_country_id'
    ];

    public function employee():BelongsTo
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function country():BelongsTo
    {
        return $this->belongsTo(Country::class,'training_country_id');
    }
}
