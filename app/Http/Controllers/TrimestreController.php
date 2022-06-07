<?php

namespace App\Http\Controllers;

use App\Models\Trimestre;
use App\Http\Requests\StoreTrimestreRequest;
use App\Http\Requests\UpdateTrimestreRequest;

class TrimestreController extends Controller
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
     * @param  \App\Http\Requests\StoreTrimestreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrimestreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trimestre  $trimestre
     * @return \Illuminate\Http\Response
     */
    public function show(Trimestre $trimestre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trimestre  $trimestre
     * @return \Illuminate\Http\Response
     */
    public function edit(Trimestre $trimestre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrimestreRequest  $request
     * @param  \App\Models\Trimestre  $trimestre
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrimestreRequest $request, Trimestre $trimestre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trimestre  $trimestre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trimestre $trimestre)
    {
        //
    }
}
