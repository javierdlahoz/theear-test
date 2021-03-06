<?php

class BooksTableSeeder extends DatabaseSeeder
{
    public function run()
    {
        factory(App\Book::class, 15)->create()->each(function ($book) {
            for ($i = 0; $i < rand(1, 5); $i++) {
                $book->reviews()->save(factory(App\Review::class)->make());
            }

            $cachedBook = new \App\Redis\Book($book->toArray());
            $cachedBook->setReviews($book->reviews->toArray());
            $cachedBook->save();
        });
    }
}
