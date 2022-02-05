<?php

namespace App\Http\Controllers;

use App\Models\Raw;
use App\Http\Requests\StoreRawRequest;
use App\Http\Requests\UpdateRawRequest;

class RawController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRawRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRawRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Raw  $raw
     * @return \Illuminate\Http\Response
     */
    public function show(Raw $raw)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRawRequest  $request
     * @param  \App\Models\Raw  $raw
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRawRequest $request, Raw $raw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Raw  $raw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Raw $raw)
    {
        //
    }
}
