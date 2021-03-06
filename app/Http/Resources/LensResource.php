<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LensResource extends JsonResource
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
            "name"=> $this->name ,
            "raw_title"=> $this->raw->title ,
            "raw"=> $this->whenLoaded('raw') ,
            "bases" => $this->whenLoaded('bases') ,
            "created_at"=> $this->created_at ,
            "updated_at"=> $this->updated_at
        ] ;
    }
}
