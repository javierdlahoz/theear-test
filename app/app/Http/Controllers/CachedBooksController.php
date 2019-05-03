<?php

namespace App\Http\Controllers;

use App\Http\Resources\CachedBookResource;
use App\Redis\Book;

class CachedBooksController extends Controller
{
    public function index()
    {
        return [
            'books' => CachedBookResource::collection(Book::all())
        ];
    }
}
