<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchInvoiceRequest;
use App\Http\Resources\InvoiceResource;
use App\Http\Resources\InvoiceShowResource;
use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Lens;
use App\Models\Raw;
use App\Models\RawValues;
use App\Services\InvoiceService;
use App\Traits\ResponseMessage;
use Illuminate\Database\Eloquent\Collection;

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
        return InvoiceResource::collection(Invoice::with('lens')->orderByDesc('created_at')->paginate())  ;
    }
    public function search(SearchInvoiceRequest $request)
    {
        $data = $request->validated() ;

        $invoice = Invoice::where('id',$data['id']) ;
        return InvoiceResource::collection($invoice->with('lens')->orderByDesc('created_at')->paginate())  ;
    }

    public function show(Invoice $invoice)
    {

        return new InvoiceShowResource($invoice->load('lens')) ;
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
        $invoice_Service->create() ;
        return $this->success('','a');
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
        $data = $request->validated() ;
        $invoice_Service = new InvoiceService($data) ;
        $invoice_Service->update($invoice) ;
        return $this->success('','u');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
//        if ($invoice->bases()->exists() || $lens->invoices()->exists())
//            return $this->errors(422,['هذا الخام يحتوي على عناصر- قم بمسحها اولا']) ;
//        else
        $invoice->delete() ;
        return $this->success('','d');
    }
}
