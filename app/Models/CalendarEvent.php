<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CalendarEvent extends Model
{
    use HasFactory;

    protected $table='calendar_events';
    protected $fillable=[
        'name',
        'calendar_id',
        'description',
        'start',
        'end',
        'is_holiday',
        'sms',
        'email',
        'is_active'
    ];

    public function calendar():BelongsTo
    {
        return $this->belongsTo(Calender::class,'calendar_id');
    }
}
