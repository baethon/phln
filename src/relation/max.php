<?php
declare(strict_types=1);

namespace phln\relation;

use function phln\fn\curryN;

const max = '\\phln\\relation\\max';

/**
 * Returns the larger of its two arguments.
 *
 * @phlnSignature a -> a -> a
 * @phlnCategory relation
 * @param mixed $left
 * @param mixed $right
 * @return \Closure|mixed
 */
function max($left = null, $right = null)
{
    return curryN(2, '\\max', func_get_args());
}
