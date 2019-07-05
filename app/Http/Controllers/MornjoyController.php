<?php

namespace App\Http\Controllers;

use App\Mornjoy;
use Illuminate\Http\Request;

class MornjoyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        if (!$this->validate($request, [
            'name' => ['required', 'regex:/^[^\d\s]{2,}$/'],
            'gender' => ['required', 'regex:/^(male|female)$/'],
            'blood_type' => ['required', 'regex:/^(A|B|O|AB)$/'],
            'birth_date' => 'date',
            'mobile_phone' => ['required', 'regex:/^1\d{10}$/'],
            'address' => 'required'
        ])) {

            return response('Field format', 400);
        }

        $repeat = Mornjoy::where('mobile_phone', $request->input('mobile_phone'))->count();
        if ($repeat) {
            return response('Repeat registration', 409);
        }

        $mornjoy_register = new Mornjoy();

        $mornjoy_register->name = $request->input('name');
        $mornjoy_register->gender = $request->input('gender');
        $mornjoy_register->blood_type = $request->input('blood_type');
        $mornjoy_register->birth_date = $request->input('birth_date');
        $mornjoy_register->mobile_phone = $request->input('mobile_phone');
        $mornjoy_register->address = $request->input('address');

        $mornjoy_register->save();
        return response('Success register', 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Mornjoy $mornjoy
     * @return \Illuminate\Http\Response
     */
    public function show(Mornjoy $mornjoy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Mornjoy $mornjoy
     * @return \Illuminate\Http\Response
     */
    public function edit(Mornjoy $mornjoy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Mornjoy $mornjoy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mornjoy $mornjoy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Mornjoy $mornjoy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mornjoy $mornjoy)
    {
        //
    }
}
