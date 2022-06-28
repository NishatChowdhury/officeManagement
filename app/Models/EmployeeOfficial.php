<?php

namespace App\Models;

use App\Models\Calender;
use App\Models\Shift;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
use App\Models\LeaveCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Transport\Transport;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeOfficial extends Model
{
    use HasFactory;
    protected $table = 'employee_officials';
    protected $fillable = [
        'employee_id',
        'department_id',
        'designation_id',
        'shift_id',
        'calender_code_id',
        'joining_date',
        'gross'
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function designation(){
        return $this->belongsTo(Designation::class);
    }
    public function shift(){
        return $this->belongsTo(Shift::class);
    }
    public function calendar(){
        return $this->belongsTo(Calender::class);
    }
    public function leaveCategory(){
        return $this->belongsTo(LeaveCategory::class);
    }
}
