<?php

namespace App\Redis;

class Book extends RedisModel
{
    /** @var string */
    protected $author;

    /** @var string */
    protected $title;

    /** @var integer */
    protected $year;

    /** @var string */
    protected $isbn;

    /** @var array */
    protected $reviews;

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return string
     */
    public function getIsbn(): string
    {
        return $this->isbn;
    }

    /**
     * @param string $isbn
     */
    public function setIsbn(string $isbn): void
    {
        $this->isbn = $isbn;
    }

    /**
     * @return array
     */
    public function getReviews(): array
    {
        return $this->reviews;
    }

    /**
     * @param array $reviews
     */
    public function setReviews(array $reviews): void
    {
        $this->reviews = $reviews;
    }

}
