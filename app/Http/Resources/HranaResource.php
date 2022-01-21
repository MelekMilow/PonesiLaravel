<?php

namespace App\Http\Resources;

use App\Models\Restoran;
use Illuminate\Http\Resources\Json\JsonResource;

class HranaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='Hrana';
    public function toArray($request)
    {
        return [
            'id'=>$this->resource->id,
            'naziv'=>$this->resource->naziv,
            'opis'=>$this->resource->opis,
            'restoran'=>new RestoranResource(Restoran::find($this->resource->restoran)),
            'cena'=>$this->resource->cena,
        ];
    }
}
