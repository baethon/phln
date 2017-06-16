<?php
declare(strict_types=1);

namespace phln\object;

use const phln\fn\nil;
use function phln\fn\curryN;

const prop = '\\phln\\object\\prop';
const 𝑓prop = '\\phln\\object\\𝑓prop';

/**
 * Returns a function that when supplied an array returns the indicated key of that key, if it exists.
 *
 * @phlnSignature k -> {k: v} -> v
 * @phlnCategory object
 * @param string $key
 * @param string|array $array
 * @return \Closure|mixed
 */
function prop($key = nil, $array = nil)
{
    return curryN(2, 𝑓prop, [$key, $array]);
}

function 𝑓prop($key, array $array)
{
    return array_key_exists($key, $array) ? $array[$key] : null;
}
