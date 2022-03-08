<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
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
        "base"=> $this->base ,
        "true_base"=> $this->true_base ,
        "lens"=> $this->whenLoaded('lens') ,
        "created_at"=> $this->created_at ,
        "updated_at"=> $this->updated_at
        ] ;
    }
}
