<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id ,
            "customer"=> $this->customer ,
            "lens_name" => $this->whenLoaded('lens',$this->lens->name) ,
            "r_bigger"=> $this->r_bigger,
            "r_smaller"=> $this->r_smaller,
            "l_bigger"=> $this->l_bigger,
            "l_smaller"=> $this->l_smaller,
            "created_at"=> $this->created_at ,
            "updated_at"=> $this->updated_at
        ];
    }
}
