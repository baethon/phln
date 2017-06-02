<?php
declare(strict_types=1);

namespace phln\type;

use function phln\fn\compose;
use function phln\fn\curry;
use const phln\fn\nil;

const is = '\\phln\\type\\is';
const 𝑓is = '\\phln\\type\\𝑓is';

/**
 * See if `value` is of given `type`.
 *
 * Internally this function uses `\gettype()` with few support of few aliases:
 * * `bool` - alias for `boolean` type
 * * `float` - alias for `double` type
 * * class FQN - will check if supplied object is instance of given class
 *              *Note*: currently it **does not** support object inheritance
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
    return curry(𝑓is, $type, $value);
}

function 𝑓is(string $type, $value): bool
{
    $getType = compose('\\strtolower', '\\gettype');
    $typeOfValue = $getType($value);

    switch ($typeOfValue) {
        case 'object':
            $validTypes = ['object', get_class($value)];
            break;

        case 'boolean':
            $validTypes = ['bool', 'boolean'];
            break;

        case 'double':
            $validTypes = ['double', 'float'];
            break;

        default:
            $validTypes = [$typeOfValue];
    }

    return in_array(strtolower($type), $validTypes, true);
}

