<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PembelianRes extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'id_supplier' => $this->id_supplier,
            'total_item' => $this->total_item,
            'diskon' => $this->diskon,
            'total_bayar' => $this->total_bayar,
            'created_at' => date('Y-m-d H:i:s', strtotime($this->created_at)),
            'item' => isset($this->item) ? $this->item : "",
            'supplier' => isset($this->supplier) ? $this->supplier : "",
        ];
    }
}
