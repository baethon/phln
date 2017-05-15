<?php
declare(strict_types=1);

namespace phln\fn;

use function phln\fn\curry;
use const phln\fn\nil;

const apply = '\\phln\\fn\\𝑓apply';

/**
 * Applies function `fn` to the argument list. This is useful for creating a fixed-arity function from a variadic function.
 *
 * @phlnSignature (*... -> a) -> [*] -> a
 * @phlnCategory function
 * @param string|callable $fn
 * @param string|array $arguments
 * @return \Closure|mixed
 * @example
 *      \phln\fn\apply(\phln\math\sum, [1, 2]); // 3
 */
function apply($fn = nil, $arguments = nil)
{
    return curry(apply, $fn, $arguments);
}

function 𝑓apply(callable $fn, array $arguments)
{
    return $fn(...$arguments);
}
