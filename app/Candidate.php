<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public static function where($id)
    {
        $candidate = Candidate::where('id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
