<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $talbe = 'students';
    protected $fillable = ['name', 'gender', 'blood_type', 'birth_date', 'mobile_phone', 'address'];
}
