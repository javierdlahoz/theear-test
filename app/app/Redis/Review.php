<?php

namespace App\Redis;


class Review extends RedisModel
{
    /** @var string */
    protected $author;

    /** @var string */
    protected $content;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

}
