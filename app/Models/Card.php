<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use HasFactory;
    protected $fillable=[
        'employee_id',
        'number',
        'assigned',
        'is_active',
        'note',
    ];

    public function employee():BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
