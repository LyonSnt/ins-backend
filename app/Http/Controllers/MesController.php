<?php

namespace App\Http\Controllers;

use App\Models\Mes;
use App\Http\Requests\StoreMesRequest;
use App\Http\Requests\UpdateMesRequest;

class MesController extends Controller
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
     * @param  \App\Http\Requests\StoreMesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mes  $mes
     * @return \Illuminate\Http\Response
     */
    public function show(Mes $mes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mes  $mes
     * @return \Illuminate\Http\Response
     */
    public function edit(Mes $mes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMesRequest  $request
     * @param  \App\Models\Mes  $mes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMesRequest $request, Mes $mes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mes  $mes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mes $mes)
    {
        //
    }
}