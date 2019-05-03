<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Resources\BookResource;

class BooksController extends Controller
{
    public function index()
    {
        return [
            'books' => BookResource::collection(Book::all())
        ];
    }
}

