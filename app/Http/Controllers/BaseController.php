<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBaseRequest;
use App\Http\Requests\UpdateBaseRequest;
use App\Http\Resources\BaseResource;
use App\Models\Base;
use App\Traits\ResponseMessage;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    use ResponseMessage ;

    public function store(StoreBaseRequest $request)
    {
        Base::create($request->validated()) ;
        return $this->success('','a')  ;
    }
    public function show(Base $base)
    {
        return new BaseResource($base->load('lens')) ;
    }


    public function update(UpdateBaseRequest $request, Base $base)
    {
        $base->update($request->validated()) ;
        return $this->success('','u')  ;
    }


    public function destroy(Base $base)
    {
        $base->delete() ;
        return $this->success('','d')  ;

    }
}
