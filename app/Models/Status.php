<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table='statuses';
    protected $fillable=['name','description','is_active'];


    public function statuses(){
        return $this->hasMany(EmployeeStatus::class);
    }
}
