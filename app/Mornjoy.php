<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mornjoy extends Model
{
    protected $table = 'mornjoy';
    protected $fillable = ['name', 'gender', 'blood_type', 'birth_date', 'mobile_phone', 'address'];
}
