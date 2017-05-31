<?php
declare(strict_types=1);

namespace phln\fn;

const arity = '\\phln\\fn\\arity';

/**
 * Takes a function and returns its arity.
 *
 * @phlnSignature (*... -> *) -> Number
 * @phlnCategory function
 * @param callable $fn
 * @return int
 * @example
 *      \phln\fn\arity('var_dump'); // 1
 */
function arity(callable $fn): int
{
    return (new \ReflectionFunction($fn))->getNumberOfParameters();
}
