<?php
declare(strict_types=1);

namespace phln\object;

use function phln\fn\curryN;

const prop = '\\phln\\object\\prop';
const 𝑓prop = '\\phln\\object\\𝑓prop';

/**
 * Returns a function that when supplied an array returns the indicated key of that key, if it exists.
 *
 * @phlnSignature k -> {k: v} -> v
 * @phlnCategory object
 * @param string|integer $key
 * @param array|object $array
 * @return \Closure|mixed
 */
function prop($key = '', $object = [])
{
    return curryN(2, 𝑓prop, func_get_args());
}

function 𝑓prop($key, $object)
{
    assertObject($object);

    return is_object($object)
        ? ($object->{$key} ?? null)
        : ($object[$key] ?? null);
}
