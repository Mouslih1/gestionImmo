<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class propertyCollection extends ResourceCollection
{
    public $collects = simplePropertyResource::class;
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            'data' => $this->collection,
            'links' => [
                'url' => 'https://mouslih.com',
            ],
        ];
    }
}
