<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curry;
use const phln\fn\nil;

const map = '\\phln\\collection\\𝑓map';

/**
 * Applies the callback to the elements of the given arrays
 *
 * Callback will receive index of iterated value as a second argument.
 *
 * @phlnSignature ((a, i) -> b) -> [a] -> [b]
 * @phlnCategory collection
 * @param string $fn
 * @param string $list
 * @return \Closure|mixed
 */
function map($fn = nil, $list = nil)
{
    return curry(map, $fn, $list);
}

function 𝑓map(callable $fn, array $list): array
{
    $keys = array_keys($list);
    $mapped = array_map($fn, $list, $keys);
    return array_combine($keys, $mapped);
}
