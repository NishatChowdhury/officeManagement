<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable=['name','in','out','grace','description'];

    public function officials(){
        return $this->hasMany(EmployeeOfficial::class);
    }
}
