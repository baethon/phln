<?php

declare(strict_types=1);

namespace Baethon\Phln;

const is = 'Baethon\\Phln\\is';

/**
 * @param mixed $value
 */
function is($value, string $type): bool
{
    $typeOfValue = strtolower(gettype($value));
    $expectedType = strtolower($type);

    switch ($expectedType) {
    case 'object':
        return 'object' === $typeOfValue;

    case 'bool':
    case 'boolean':
        return 'boolean' === $typeOfValue;

    case 'double':
    case 'float':
        return 'double' === $typeOfValue;

    case 'callable':
    case 'function':
        return is_callable($value);

    default:
        return (is_object($value) && $value instanceof $type) ||
            $typeOfValue === $expectedType;
    }
}
