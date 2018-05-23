<?php
declare(strict_types=1);

namespace phln\object;

use function phln\fn\curryN;

const objOf = '\\phln\\object\\objOf';
const 𝑓objOf = '\\phln\\object\\𝑓objOf';

/**
 * Creates an object containing a single key:value pair.
 *
 * @phlnSignature String -> a -> { String: a }
 * @phlnCategory object
 * @param string $key
 * @param mixed $value
 * @return \Closure|object
 * @example
 *      \phln\object\objOf('foo', 'bar'); // ['foo' => 'bar']
 */
function objOf(string $key = null, $value = null)
{
    return curryN(2, 𝑓objOf, func_get_args());
}

function 𝑓objOf(string $key, $value): array
{
    return [$key => $value];
}
