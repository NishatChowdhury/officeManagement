<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeeklyOff extends Model
{
    use HasFactory;
    protected $table='employee_weekly_off';
    protected $fillable =['employee_id','day_id'];

    public function employee():BelongsTo
    {
        return $this->belongsTo(Employee::class);

    }
    public function day():BelongsTo
    {
        return $this->belongsTo(Day::class);

    }
}
