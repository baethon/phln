<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

/**
 * Takes a function and returns its arity.
 *
 * @phlnSignature (*... -> *) -> Number
 * @phlnCategory function
 * @param callable $fn
 * @return int
 * @example
 *      P::arity('var_dump'); // 1
 */
P::macro('arity', function (callable $fn): int {
    return (new \ReflectionFunction($fn))->getNumberOfParameters();
});
