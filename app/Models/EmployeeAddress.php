<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeAddress extends Model
{
    use HasFactory;

    protected $fillable=[
        'employee_id',
        'pr_address_line_one',
        'pr_address_line_two',
        'pr_phone_one',
        'pr_phone_two',
        'pr_email',
        'pr_village',
        'pr_police_station',
        'pr_post_office',
        'pr_city_id',
        'pr_country_id',
        'pa_address_line_one',
        'pa_address_line_two',
        'pa_phone_one',
        'pa_phone_two',
        'pa_email',
        'pa_village',
        'pa_police_station',
        'pa_post_office',
        'pa_city_id',
        'pa_country_id'
    ];

    public function employee():BelongsTo
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function prCountry():BelongsTo
    {
        return $this->belongsTo(Country::class,'pr_country_id');
    }

    public function paCountry():BelongsTo
    {
        return $this->belongsTo(Country::class,'pa_country_id');
    }
}
