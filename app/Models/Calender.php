<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calender extends Model
{
    use HasFactory;
    protected $table = 'calendars';
    protected $fillable=['name','description','status'];

    public function officials(){
        return $this->hasMany(EmployeeOfficial::class);
    }
}
