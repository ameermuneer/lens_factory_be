<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RawResource extends JsonResource
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
            "title"=> $this->title ,
            "active"=> $this->active ,
            "lenses" => $this->whenLoaded('lenses') ,
            "values" => $this->whenLoaded('values') ,
            "created_at"=> $this->created_at ,
            "updated_at"=> $this->updated_at
        ] ;
    }
}
