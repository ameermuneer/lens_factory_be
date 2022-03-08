<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RawValueResource extends JsonResource
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
            "power"=> $this->power ,
            "value"=> $this->value ,
            "raw"=> $this->whenLoaded('raw') ,
            "created_at"=> $this->created_at ,
            "updated_at"=> $this->updated_at
        ] ;
    }
}
