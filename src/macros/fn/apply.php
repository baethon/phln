<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

/**
 * Applies function `fn` to the argument list. This is useful for creating a fixed-arity function from a variadic function.
 *
 * @phlnSignature (*... -> a) -> [*] -> a
 * @phlnCategory function
 * @param callable $fn
 * @param array $arguments
 * @return \Closure|mixed
 * @example
 *      P::apply('Baethon\Phln\Phln::sum', [1, 2]); // 3
 */
P::curried('apply', 2, function (callable $fn, array $arguments) {
    return $fn(...$arguments);
});
