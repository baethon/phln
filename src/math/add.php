<?php
declare(strict_types=1);

namespace phln\math;

use function phln\fn\curryN;

const add = '\\phln\\math\\add';
const 𝑓add = '\\phln\\math\\𝑓add';

/**
 * Add two values
 *
 * @phlnSignature Number a => a -> a -> a
 * @phlnCategory math
 * @param mixed $a
 * @param mixed $b
 * @return \Closure|mixed
 */
function add($a = null, $b = null)
{
    return curryN(2, 𝑓add, [$a, $b]);
}

function 𝑓add($a, $b)
{
    return $a + $b;
}
