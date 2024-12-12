<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1\Users;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'message' => 'Success',
            'data'    => $this->collection,
            'links'   => [
                'first' => $this->url(1),
                'last'  => $this->url($this->lastPage()),
                'prev'  => $this->previousPageUrl(),
                'next'  => $this->nextPageUrl()
            ],
            'meta'    => [
                'current_page' => $this->currentPage(),
                'from'         => $this->firstItem(),
                'last_page'    => $this->lastPage(),
                'per_page'     => $this->perPage(),
                'to'           => $this->lastItem(),
                'total'        => $this->total()
            ]
        ];
    }
}
