<?php

declare(strict_types=1);

namespace Baethon\Phln;

final class ObjectWrapper implements \ArrayAccess
{
    /**
     * @var array<mixed>
     */
    private $value;

    /**
     * @param object|array<mixed>|ObjectWrapper $value
     */
    private function __construct($value)
    {
        if (! ObjectWrapper::isObject($value)) {
            throw new \InvalidArgumentException('Value is not a valid object');
        }

        $this->value = ($value instanceof ObjectWrapper)
            ? $value->value
            : (array) $value;
    }

    /**
     * @param array<mixed>|object $value
     * @return ObjectWrapper
     */
    public static function of($value = []): ObjectWrapper
    {
        return new static($value);
    }

    /**
     * @param string|int $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->value[$offset])
            ? $this->value[$offset]
            : null;
    }

    /**
     * @param string $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        throw new \LogicException('The ObjectWrapper is immutable');
    }

    /**
     * @param string $offset
     */
    public function offsetUnset($offset)
    {
        throw new \LogicException('The ObjectWrapper is immutable');
    }

    /**
     * @param string $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return $this->has($offset);
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this[$name];
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function prop(string $name)
    {
        return $this->{$name};
    }

    /**
     * @return array<mixed>
     */
    public function toArray(): array
    {
        return $this->value;
    }

    public function toObject(): \stdClass
    {
        return (object) $this->value;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return ObjectWrapper
     */
    public function assoc(string $key, $value): ObjectWrapper
    {
        return tap(ObjectWrapper::of($this), function ($object) use ($key, $value) {
            $object->value[$key] = $value;
        });
    }

    /**
     * @return array<mixed>
     */
    public function values(): array
    {
        return array_values($this->value);
    }

    /**
     * @return array<string>
     */
    public function keys(): array
    {
        return array_keys($this->value);
    }

    /**
     * Check if given property is defined
     *
     * @param string $name
     * @return bool
     */
    public function has(string $name): bool
    {
        return array_key_exists($name, $this->value);
    }

    /**
     * @param ObjectWrapper|array|object|mixed $value
     * @return bool
     */
    public static function isObject($value): bool
    {
        if ($value instanceof static) {
            return true;
        }

        return is_object($value) || is_array($value);
    }
}
