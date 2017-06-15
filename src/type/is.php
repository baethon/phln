<?php
declare(strict_types=1);

namespace phln\type;

use const phln\fn\nil;
use function phln\fn\curryN;

const is = '\\phln\\type\\is';
const 𝑓is = '\\phln\\type\\𝑓is';

/**
 * See if `value` is of given `type`.
 *
 * Internally this function uses `\gettype()` with few support of few aliases:
 * * `bool` - alias for `boolean` type
 * * `float` - alias for `double` type
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
function is($type = nil, $value = nil)
{
    return curryN(2, 𝑓is, [$type, $value]);
}

function 𝑓is(string $type, $value): bool
{
    $typeOfValue = strtolower(gettype($value));
    $expectedType = strtolower($type);

    switch ($typeOfValue) {
        case 'object':
            return $value instanceof $type || 'object' === $typeOfValue;

        case 'boolean':
            return in_array($expectedType, ['bool', 'boolean'], true);

        case 'double':
            return in_array($expectedType, ['double', 'float'], true);

        default:
            return $typeOfValue === $expectedType;
    }
}

