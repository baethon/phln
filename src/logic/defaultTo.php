<?php
declare(strict_types=1);

namespace phln\logic;

use function phln\fn\curryN;
use const phln\fn\nil;

const defaultTo = '\\phln\\logic\\defaultTo';
const 𝑓defaultTo = '\\phln\\logic\\𝑓defaultTo';

/**
 * Returns the second argument if it is not `null`; otherwise the first argument is returned.
 *
 * @phlnSignature a -> b -> b | a
 * @phlnCategory logic
 * @param mixed $default
 * @param mixed $value
 * @return \Closure|mixed
 * @example
 *      \phln\logic\defaultTo(42, null); // 42
 *      \phln\logic\defaultTo(42, 'life'); // 'life'
 */
function defaultTo($default = nil, $value = nil)
{
    return curryN(2, 𝑓defaultTo, $default, $value);
}

function 𝑓defaultTo($default, $value)
{
    return is_null($value) ? $default : $value;
}
