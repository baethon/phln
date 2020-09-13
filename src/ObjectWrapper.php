<?php

declare(strict_types=1);

namespace Baethon\Phln;

class ObjectWrapper implements \ArrayAccess
{
    /**
     * @var array
     */
    private $value;

    private function __construct($value)
    {
        if (! ObjectWrapper::isObject($value)) {
            throw new \InvalidArgumentException('Value is not a valid object');
        }

        $this->value = ($value instanceof ObjectWrapper)
            ? $value->value
            : (array) $value;
    }

    public static function of($value = []): ObjectWrapper
    {
        return new static($value);
    }

    public function offsetGet($offset)
    {
        return isset($this->value[$offset])
            ? $this->value[$offset]
            : null;
    }

    public function offsetSet($offset, $value)
    {
        throw new \LogicException('The ObjectWrapper is immutable');
    }

    public function offsetUnset($offset)
    {
        throw new \LogicException('The ObjectWrapper is immutable');
    }

    public function offsetExists($offset)
    {
        return $this->has($offset);
    }

    public function __get($name)
    {
        return $this[$name];
    }

    public function prop(string $name)
    {
        return $this->{$name};
    }

    public function toArray(): array
    {
        return $this->value;
    }

    public function toObject(): \stdClass
    {
        return (object) $this->value;
    }

    public function assoc(string $key, $value): ObjectWrapper
    {
        return tap(ObjectWrapper::of($this), function ($object) use ($key, $value) {
            $object->value[$key] = $value;
        });
    }

    public function values(): array
    {
        return array_values($this->value);
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

    public static function isObject($value): bool
    {
        if ($value instanceof static) {
            return true;
        }

        return is_object($value) || is_array($value);
    }
}
