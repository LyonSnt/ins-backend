<?php

namespace App\Http\Controllers;

use App\Models\Estadocivil;
use App\Http\Requests\StoreEstadocivilRequest;
use App\Http\Requests\UpdateEstadocivilRequest;

class EstadocivilController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEstadocivilRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstadocivilRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estadocivil  $estadocivil
     * @return \Illuminate\Http\Response
     */
    public function show(Estadocivil $estadocivil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estadocivil  $estadocivil
     * @return \Illuminate\Http\Response
     */
    public function edit(Estadocivil $estadocivil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstadocivilRequest  $request
     * @param  \App\Models\Estadocivil  $estadocivil
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstadocivilRequest $request, Estadocivil $estadocivil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estadocivil  $estadocivil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estadocivil $estadocivil)
    {
        //
    }
}
