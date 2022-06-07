<?php

namespace App\Http\Controllers;

use App\Models\Iglesia;
use App\Http\Requests\StoreIglesiaRequest;
use App\Http\Requests\UpdateIglesiaRequest;

class IglesiaController extends Controller
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
     * @param  \App\Http\Requests\StoreIglesiaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIglesiaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Iglesia  $iglesia
     * @return \Illuminate\Http\Response
     */
    public function show(Iglesia $iglesia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Iglesia  $iglesia
     * @return \Illuminate\Http\Response
     */
    public function edit(Iglesia $iglesia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIglesiaRequest  $request
     * @param  \App\Models\Iglesia  $iglesia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIglesiaRequest $request, Iglesia $iglesia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Iglesia  $iglesia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Iglesia $iglesia)
    {
        //
    }
}
