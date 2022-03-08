<?php

namespace App\Http\Controllers;

use App\Http\Resources\RawResource;
use App\Models\Raw;
use App\Http\Requests\StoreRawRequest;
use App\Http\Requests\UpdateRawRequest;
use App\Models\RawValues;
use App\Traits\ResponseMessage;

class RawController extends Controller
{
    use ResponseMessage ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  RawResource::collection(Raw::orderBy('title')->paginate(20)) ;
    }
    public function show(Raw $raw)
    {
        return $this->success(new RawResource($raw)) ;
    }

    public function showWithValues(Raw $raw)
    {
        return $this->success(new RawResource($raw->load('values'))) ;
    }





    public function store(StoreRawRequest $request)
    {
        Raw::create($request->validated()) ;
        return $this->success('','a') ;
    }


    public function update(UpdateRawRequest $request, Raw $raw)
    {
        $raw->update($request->validated()) ;
        return $this->success('','u') ;

    }


    public function destroy(Raw $raw)
    {
        if ($raw->values()->exists())
            return $this->errors(422,['هذا الخام يحتوي على عناصر- قم بمسحها اولا']) ;
        else
            $raw->delete() ;
        return $this->success('','d') ;

    }
}
