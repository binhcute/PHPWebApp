<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'id_cate' => $this->id_cate,
            'id_user' => $this->id_user,
            'id_portfolio' => $this->id_portfolio,
            'name' => $this->name,
            'img' => $this->img,
            'img_hover' => $this->img_hover,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'color' => $this->color,
            'detail' => $this->detail,
            'keyword' => $this->keyword,
            'status' => $this->status,
            'view' => $this->view,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
