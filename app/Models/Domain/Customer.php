<?php

namespace App\Models\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name','address','mobile','email','contact_person','contact_person_phone'];
}
