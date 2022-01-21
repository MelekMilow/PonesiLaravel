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
            'hrana_id'=>new HranaResource($this->resource->hrana_id),
            'restoran_id'=>new RestoranResource($this->resource->restoran_id),
            'datum'=>$this->resource->datum,
            'dostava_cena'=>$this->resource->dostava_cena,
        ];
    }
}
