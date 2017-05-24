<?php
declare(strict_types=1);

namespace phln\collection;

use const phln\fn\nil;
use function phln\fn\curry;
use function phln\object\prop;

const pluck = '\\phln\\collection\\pluck';
const 𝑓pluck = '\\phln\\collection\\𝑓pluck';

/**
 * Returns a new list by plucking the same named property off all objects in the list supplied.
 *
 * @phlnSignature k -> [{k: v}] -> v
 * @phlnCategory collection
 * @param string $key
 * @param string|array $list
 * @return \Closure|array
 * @example
 *      $list = [['a' => 1], ['a' => 2]];
 *      \phln\collection\pluck('a', $list); // [1, 2]
 */
function pluck($key = nil, $list = nil)
{
    return curry(𝑓pluck, $key, $list);
}

function 𝑓pluck($key, array $list): array
{
    return map(prop($key), $list);
}
