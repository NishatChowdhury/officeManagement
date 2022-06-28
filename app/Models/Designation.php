<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    protected $fillable=['name','display_name','is_active'];


    public function officials(){
        return $this->hasMany(EmployeeOfficial::class);
    }
}
