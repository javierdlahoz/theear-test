<?php

namespace App\Redis;


abstract class RedisModel
{
    /** @var integer */
    protected $id;

    private static $app;

    /**
     * @return mixed
     */
    public static function getApp()
    {
        if (isset(self::$app)) {
            return self::$app;
        } else {
            return require __DIR__ . '/../../bootstrap/app.php';
        }
    }

    /**
     * @param int $id
     * @return mixed
     */
    public static function find(int $id)
    {
        $calledClass = get_called_class();
        $key = strtolower($calledClass) . '-' . $id;

        self::findByKey($key);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public static function findByKey(string $key)
    {
        $cachedObject = self::getApp()['redis']->get($key);
        if ($cachedObject) {
            $calledClass = get_called_class();
            $cachedArray = json_decode($cachedObject, true);

            return new $calledClass($cachedArray);
        } else {
            return null;
        }
    }

    /**
     * @param array $collection
     * @param string $attribute
     * @return array
     */
    public static function sort(array $collection, string $attribute): array
    {
        usort($collection, function ($item1, $item2) use (&$attribute) {
            if ($item1->{$attribute} == $item2->{$attribute}) return 0;
            return $item1->{$attribute} < $item2->{$attribute} ? -1 : 1;
        });

        return $collection;
    }

    /**
     * @return array
     */
    public static function all(): array
    {
        $calledClass = get_called_class();
        $keys = self::getApp()['redis']->keys(
            str_replace("\\", "\\\\", strtolower($calledClass) . '*')
        );
        $objects = [];

        foreach ($keys as $key) {
            $object = self::findByKey($key);
            if ($object) {
                $objects[] = $object;
            }
        }

        return self::sort($objects, 'id');
    }

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
        $identifier .= '-' . (string)$this->getId();
        return $identifier;
    }

    public function save()
    {
        $app = require __DIR__ . '/../../bootstrap/app.php';
        $app['redis']->set($this->getIdentifier(), $this->toJson());
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
}
