<?php

namespace App\Http\Controllers;

use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Lens;
use App\Models\Raw;
use App\Models\RawValues;
use App\Services\InvoiceService;
use App\Traits\ResponseMessage;

class InvoiceController extends Controller
{
    use ResponseMessage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InvoiceResource::collection(Invoice::paginate())  ;
    }

    public function show(Invoice $invoice)
    {
        return new InvoiceResource($invoice) ;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceRequest $request)
    {
        $data = $request->validated() ;
        $invoice_Service = new InvoiceService($data) ;
        $invoice_Service->calculateInvoice() ;
//
//        $lens = Lens::find($data['lens_id'])->first() ;
//        // check if there is rb,ry,rz then rx is required!
//        $raw = $lens->raw()->with('values')->get() ;
//
//
//        $lens_value = $lens->where('base',$data['base'])->first() ;
//
//        if (isset($data['rb']) && !isset($lens_value)) {
//            abort($this->errors(422,['rb غير موجود في قائمة هذا النوع من العدسات'])) ;
//        }else{
//            //find smaller bigger
//
//            if ($raw->active){
//                if (isset($data['rx'])){
//                    $true_rx = RawValues::where('raw_id',$raw->id)->where('power',$data['rx'])->first() ;
//                    if (!$true_rx)
//                        abort($this->errors(422,['rx غير موجود في قائمة الخام power -- الخام فعال'])) ;
//                    else{
//                        $data['rx'] = $true_rx ;
//                    }
//                }else
//                    $data['rx'] = 0 ;
//                if (isset($data['ry'])) {
//                    $true_ry = RawValues::where('raw_id', $raw->id)->where('power', $data['ry'])->first();
//                    if (!$true_ry)
//                        abort($this->errors(422, ['ry غير موجود في قائمة الخام power -- الخام فعال']));
//                    else {
//                        $data['rY'] = $true_ry;
//                    }
//                }else
//                    $data['ry'] = 0 ;
//
//            }
//
//            $data['r_bigger'] = $lens_value->true_base - $data['rx'] ;
//            $data['r_smaller']  = $data['r_bigger']  - $data['ry'] ;
//
//
//        }
//        if (isset($data['lb']) && !in_array($data['lb'],$lens['bases'])) {
//            abort($this->errors(422,['lb غير موجود في قائمة هذا النوع من العدسات '])) ;
//        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */




    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceRequest  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
