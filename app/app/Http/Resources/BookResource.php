<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class BookResource extends Resource implements ResourceInterface
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->author,
            'isbn' => $this->isbn,
            'year' => $this->year,
            'reviews' => $this->reviews->toArray(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
