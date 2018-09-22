<?php
declare(strict_types=1);

namespace phln\object;

use function phln\fn\curryN;

const merge = '\\phln\\object\\merge';
const 𝑓merge = '\\phln\\object\\𝑓merge';

/**
 * Create a new object with the keys of the first object merged with the keys of the second object. If a key exists in both objects, the value from the second object will be used.
 *
 * @phlnSignature {k: v} -> {k: v} -> {k: v}
 * @phlnCategory object
 * @param array|object $left
 * @param array|object $right
 * @return \Closure|array
 * @example
 *      $toDefaults = \phln\fn\partial(\phln\object\merge, [\phln\fn\__, ['x' => 0]);
 *      $toDefaults(['x' => 2, 'y' => 1]); // ['x' => 0, 'y' => 1]
 */
function merge($left = [], $right = [])
{
    return curryN(2, 𝑓merge, func_get_args());
}

function 𝑓merge($left, $right): array
{
    assertObject($left);
    assertObject($right);

    return array_merge((array) $left, (array) $right);
}
