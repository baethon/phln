<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

/**
 * Accepts a function `fn` and returns a function that guards invocation of `fn` such that `fn` can only ever be called once, no matter how many times the returned function is invoked. The first value calculated is returned in subsequent invocations.
 *
 * @phlnSignature (a... -> b) -> (a... -> b)
 * @phlnCategory function
 * @param callable $fn
 * @return \Closure
 * @example
 *      $f = P::once('\rand');
 *      $f(1, 100); // 4
 *      $f(1, 100); // 4
 *      $f(1, 100); // 4
 */
P::macro('once', function (callable $fn): \Closure {
    return function (... $args) use ($fn) {
        static $result;

        if (false === is_object($result)) {
            $result = (object)['result' => $fn(... $args)];
        }

        return $result->result;
    };
});
