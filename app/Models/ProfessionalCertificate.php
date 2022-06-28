<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfessionalCertificate extends Model
{
    use HasFactory;

    protected $fillable=[
        'employee_id',
        'certification',
        'certification_institute',
        'certification_location',
        'certification_start',
        'certification_end'
    ];

    public function employee():BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
