<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curryN;
use function phln\object\prop;

const pluck = '\\phln\\collection\\pluck';
const 𝑓pluck = '\\phln\\collection\\𝑓pluck';

/**
 * Returns a new list by plucking the same named property off all objects in the list supplied.
 *
 * @phlnSignature k -> [{k: v}] -> v
 * @phlnCategory collection
 * @param string|integer $key
 * @param array $list
 * @return \Closure|array
 * @example
 *      $list = [['a' => 1], ['a' => 2]];
 *      \phln\collection\pluck('a', $list); // [1, 2]
 */
function pluck($key = '', array $list = [])
{
    return curryN(2, 𝑓pluck, func_get_args());
}

function 𝑓pluck($key, array $list): array
{
    return map(prop($key), $list);
}
