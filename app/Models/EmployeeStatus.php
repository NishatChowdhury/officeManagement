<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeStatus extends Model
{
    use HasFactory;
    protected $table='employee_statuses';
    protected $fillable = ['employee_id','status_id','date','description'];

    public function status():BelongsTo
    {
        return $this->belongsTo(Status::class,'status_id');
    }
}
