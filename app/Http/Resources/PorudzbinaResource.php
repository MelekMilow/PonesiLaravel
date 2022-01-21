<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PorudzbinaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='Porudzbina';
    public function toArray($request)
    {
        return[
            'id'=>$this->resource->id,
            'hrana'=>new HranaResource($this->resource->hrana),
            'restoran'=>new RestoranResource($this->resource->restoran),
            'datum'=>$this->resource->datum,
            'dostava_cena'=>$this->resource->dostava_cena,
        ];
    }
}
