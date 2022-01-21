<?php

namespace App\Http\Resources;

use App\Models\Hrana;
use App\Models\Restoran;
use App\Models\User;
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
            'hrana'=>new HranaResource(Hrana::find($this->resource->hrana)),
            'user'=>new UserResource(User::find($this->resource->user)),
            'datum'=>$this->resource->datum,
            'dostava_cena'=>$this->resource->dostava_cena,
        ];
    }
}
