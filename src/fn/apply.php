<?php
declare(strict_types=1);

namespace phln\fn;

const apply = '\\phln\\fn\\apply';
const 𝑓apply = '\\phln\\fn\\𝑓apply';

/**
 * Applies function `fn` to the argument list. This is useful for creating a fixed-arity function from a variadic function.
 *
 * @phlnSignature (*... -> a) -> [*] -> a
 * @phlnCategory function
 * @param callable $fn
 * @param array $arguments
 * @return \Closure|mixed
 * @example
 *      \phln\fn\apply(\phln\math\sum, [1, 2]); // 3
 */
function apply(callable $fn = null, array $arguments = [])
{
    return curryN(2, 𝑓apply, func_get_args());
}

function 𝑓apply(callable $fn, array $arguments)
{
    return $fn(...$arguments);
}
