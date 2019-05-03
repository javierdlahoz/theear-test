<?php

namespace App\Http\Resources;

interface ResourceInterface
{
    public static function collection($collection);

    public function toArray($request): array;
}
