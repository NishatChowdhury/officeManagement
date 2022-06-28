<?php

namespace App\Models;

use App\Models\Calender;
use App\Models\Gender;
use App\Models\Religion;
use App\Models\BloodGroup;
use App\Models\MaritalStatus;
use App\Models\EmployeeOfficial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable =
        [
        'employee_no',
        'name',
        'bn_name',
        'father',
        'mother',
        'gender_id',
        'dob',
        'marital_status_id',
        'spouse',
        'blood_group_id',
        'religion_id',
        'nid',
        'passport',
        'driving_license',
        'image',
        ];

        public function leaves()
        {
            return $this->hasMany(Leave::class);
        }
        public function earnLeaves()
        {
            return $this->hasMany(EarnLeave::class);
        }
    
        public function days()
        {
            return $this->belongsToMany(Day::class,'employee_weekly_off');
        }
    
        public function gender()
        {
            return $this->belongsTo(Gender::class);
        }
    
        public function maritalStatus()
        {
            return $this->belongsTo(MaritalStatus::class);
        }
    
        public function bloodGroup()
        {
            return $this->belongsTo(BloodGroup::class);
        }
    
        public function religion()
        {
            return $this->belongsTo(Religion::class);
        }
    
        public function status()
        {
            return $this->belongsTo(Status::class);
        }
    
        public function employeeTrainings()
        {
            return $this->hasOne(EmployeeTraining::class);
        }
    
        public function professionalCertificates()
        {
            return $this->hasMany(ProfessionalCertificate::class);
        }
    
        public function employeeAddresses()
        {
            return $this->hasOne(EmployeeAddress::class);
        }
        public function employeeAcademics()
        {
            return $this->hasOne(EmployeeAcademic::class);
        }
        public function officials(){
            return $this->hasOne(EmployeeOfficial::class)->latest();
        }
        public function attendance(){
            return $this->hasMany(Attendance::class);
        }
    
        public function card(){
            return $this->hasOne(Card::class)->latest();
        }
    
    
        public function calendar()
        {
            return $this->belongsTo(Calender::class);
        }
        public function calendarEvents()
        {
            return $this->hasOneThrough(Calender::class,CalendarEvent::class);
        }
}
