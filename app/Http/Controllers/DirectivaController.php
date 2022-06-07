<?php

namespace App\Http\Controllers;

use App\Models\Directiva;
use App\Http\Requests\StoreDirectivaRequest;
use App\Http\Requests\UpdateDirectivaRequest;

class DirectivaController extends Controller
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
     * @param  \App\Http\Requests\StoreDirectivaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDirectivaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Directiva  $directiva
     * @return \Illuminate\Http\Response
     */
    public function show(Directiva $directiva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Directiva  $directiva
     * @return \Illuminate\Http\Response
     */
    public function edit(Directiva $directiva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDirectivaRequest  $request
     * @param  \App\Models\Directiva  $directiva
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDirectivaRequest $request, Directiva $directiva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Directiva  $directiva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Directiva $directiva)
    {
        //
    }
}
