<?php

namespace App\Http\Controllers;

use App\Models\Lens;
use App\Http\Requests\StoreLensRequest;
use App\Http\Requests\UpdateLensRequest;

class LensController extends Controller
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
     * @param  \App\Http\Requests\StoreLensRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLensRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lens  $lensType
     * @return \Illuminate\Http\Response
     */
    public function show(Lens $lensType)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLensRequest  $request
     * @param  \App\Models\Lens  $lensType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLensRequest $request, Lens $lensType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lens  $lensType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lens $lensType)
    {
        //
    }
}
