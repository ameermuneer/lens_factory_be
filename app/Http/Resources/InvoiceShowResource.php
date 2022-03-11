<?php

namespace App\Http\Resources;

use App\Models\Invoice;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceShowResource extends JsonResource
{
    function __construct(Invoice $model)
    {
        parent::__construct($model);

    }
    public function toArray($request)
    {
        return [
            "id" => $this->id ,
            "customer"=> $this->customer ,
            "lens" => $this->whenLoaded('lens',$this->lens()->with('raw')->first()) ,
            "rx" => $this->rx,
            "ry"=> $this->ry,
            "rz"=> $this->rz,
            "rb"=> $this->rb,
            "lx"=> $this->lx,
            "ly"=> $this->ly,
            "lz"=> $this->lz,
            "lb"=> $this->lb,
            "add1"=> $this->add1,
            "add2"=> $this->add2,
            "r_bigger"=> $this->r_bigger,
            "r_smaller"=> $this->r_smaller,
            "l_bigger"=> $this->l_bigger,
            "l_smaller"=> $this->l_smaller,
            "created_at"=> $this->created_at ,
            "updated_at"=> $this->updated_at
        ];
    }
}
