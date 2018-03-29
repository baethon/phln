<?php
declare(strict_types=1);

namespace phln\type;

use function phln\fn\curryN;

const is = '\\phln\\type\\is';
const 𝑓is = '\\phln\\type\\𝑓is';

/**
 * See if `value` is of given `type`.
 *
 * Internally this function uses `\gettype()` with few support of few aliases:
 * * `bool` - alias for `boolean` type
 * * `float` - alias for `double` type
 * * `callable` - checks if $value is valid callback
 * * `function` - same as `callable`
 * * class FQN - will check if supplied object is instance of given class
 *
 * @phlnSignature String -> a -> Boolean
 * @phlnCategory type
 * @param string $type
 * @param mixed $value
 * @return \Closure|bool
 * @example
 *      \phln\type\is('bool', true); // true
 *      \phln\type\is(\stdClass::class, new \stdClass); // true
 *      \phln\type\is(float, 1.1); // true
 */
function is($type = null, $value = null)
{
    return curryN(2, 𝑓is, [$type, $value]);
}

function 𝑓is(string $type, $value): bool
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

