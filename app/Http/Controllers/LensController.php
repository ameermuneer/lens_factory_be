<?php

namespace App\Http\Controllers;

use App\Http\Resources\LensResource;
use App\Models\Lens;
use App\Http\Requests\StoreLensRequest;
use App\Http\Requests\UpdateLensRequest;
use App\Traits\ResponseMessage ;
class LensController extends Controller
{
    use ResponseMessage ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return Lens::with('raw')->paginate() ;
        return LensResource::collection(Lens::with('raw')->paginate());
    }
    public function index_menu()
    {
//        return Lens::with('raw')->paginate() ;
        return Lens::all();
    }
    public function show(Lens $lens)
    {
        return new LensResource($lens->load('raw'));
    }
    public function showWithBases(Lens $lens)
    {
        return new LensResource($lens->load('bases','raw'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLensRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLensRequest $request)
    {
        Lens::create($request->validated()) ;
        return $this->success('','a');
    }






    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLensRequest  $request
     * @param  \App\Models\Lens  $lens
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLensRequest $request, Lens $lens)
    {
        $lens->update($request->validated()) ;
        return $this->success('','u');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lens  $lens
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lens $lens)
    {
        if ($lens->bases()->exists() || $lens->invoices()->exists())
            return $this->errors(422,['هذا الخام يحتوي على عناصر- قم بمسحها اولا']) ;
        else
            $lens->delete() ;
        return $this->success('','d');
    }
}
