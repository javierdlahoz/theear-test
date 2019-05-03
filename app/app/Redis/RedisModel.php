<?php

namespace App\Redis;


abstract class RedisModel
{
    /** @var integer */
    protected $id;

    function __construct(array $args)
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }

        if (!isset($this->id)) {
            $this->id = uniqid();
        }
    }

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

    /**
     * @return string
     */
    private function getIdentifier(): string
    {
        $identifier = strtolower(get_class($this));
        $identifier .= '-' . (string) $this->getId();
        return $identifier;
    }

    public function save()
    {
        $app = require __DIR__ . '/../../bootstrap/app.php';
        $app['redis']
            ->set($this->getIdentifier(), $this->toJson());
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    /**
     * @param int $id
     * @return mixed
     */
    public static function find(int $id)
    {
        $calledClass = get_called_class();
        $key = strtolower($calledClass) . '-' . $id;
        $app = require __DIR__ . '/../../bootstrap/app.php';

        $cachedObject = $app['redis']->get($key);
        if (!is_null($cachedObject)) {
            $object = new $calledClass(json_decode($cachedObject, true));
            return $object;
        }
        return null;
    }
}
