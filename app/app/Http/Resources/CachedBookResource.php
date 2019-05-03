<?php

namespace App\Http\Resources;

class CachedBookResource implements ResourceInterface
{
    /**
     * @param $collection
     * @return array
     */
    public static function collection($collection)
    {
        $array = [];
        $serializerResource = new CachedBookResource();
        foreach ($collection as $book)
        {
            $array[] = $serializerResource->toArray($book);
        }

        return $array;
    }

    /**
     * @param $book
     * @return array
     */
    public function toArray($book): array
    {
        return [
            'id' => $book->getId(),
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(),
            'isbn' => $book->getIsbn(),
            'year' => $book->getYear(),
            'reviews' => $book->getReviews()
        ];
    }
}
