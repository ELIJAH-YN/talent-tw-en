<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function create( Request $request ) {

        $students = new Student();

        $students->name = $request->input('name');
        $students->gender = $request->input('gender');
        $students->blood_type = $request->input('blood_type');
        $students->birth_date = $request->input('birth_date');
        $students->mobile_phone = $request->input('mobile_phone');
        $students->address = $request->input('address');

        $students->save();
        return response()->json($students);
    }
}
