<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRawValueRequest;
use App\Http\Requests\UpdateRawValueRequest;
use App\Http\Resources\RawResource;
use App\Http\Resources\RawValueResource;
use App\Models\RawValues;
use App\Traits\ResponseMessage;
use Illuminate\Http\Request;

class RawValuesController extends Controller
{
    use ResponseMessage ;


    public function store(StoreRawValueRequest $request)
    {
        RawValues::create($request->validated()) ;
        return $this->success('','تم الاضافة بنجاح')  ;
    }
    public function show(RawValues $rawValue)
    {
        return new RawValueResource($rawValue->load('raw')) ;
    }


    public function update(UpdateRawValueRequest $request, RawValues $rawValue)
    {
        $rawValue->update($request->validated()) ;
        return $this->success('','تم التحديث بنجاح')  ;
    }


    public function destroy(RawValues $rawValue)
    {
        $rawValue->delete() ;
        return $this->success('','تم المسح بنجاح')  ;

    }
}
