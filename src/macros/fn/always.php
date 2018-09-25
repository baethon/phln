<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

/**
 * Returns a function that always returns the given value.
 * For non-primitives the value returned is a reference to the original value.
 *
 * @phlnSignature a -> (* -> a)
 * @phlnCategory function
 * @param $value
 * @return \Closure
 * @example
 *      $foo = P::always('foo');
 *      $foo(); // 'foo'
 */
P::macro('always', function ($value): \Closure {
    return function () use ($value) {
        return $value;
    };
});
