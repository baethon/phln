<?php
declare(strict_types=1);

namespace phln\object;

use function phln\collection\reduce;
use function phln\collection\tail;
use function phln\fn\curryN;

const path = '\\phln\\object\\path';
const 𝑓path = '\\phln\\object\\𝑓path';

/**
 * Returns nested value using "dot notation".
 *
 * @phlnSignature String -> {k: v} -> v|Null
 * @phlnCategory object
 * @param string $path
 * @param array|object $object
 * @return \Closure|mixed
 * @example
 *      \phln\object\path('a.b', ['a' => ['b' => 'foo']]); // 'foo'
 *      \phln\object\path('a.b.c', ['a' => ['b' => 'foo']]); // null
 */
function path(string $path = '', $object = [])
{
    return curryN(2, 𝑓path, func_get_args());
}

function 𝑓path(string $path, $object)
{
    $keys = \phln\string\split('.', $path);

    return reduce(
        function ($carry, $key) {
            if (false === is_array($carry) && false === is_object($carry)) {
                return null;
            }

            return prop($key, $carry);
        },
        prop(head($keys), $object),
        tail($keys)
    );
}
