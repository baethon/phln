<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

/**
 * Creates a function that negates the result of the predicate.
 *
 * @phlnSignature (*... -> *) -> (*... -> Boolean)
 * @phlnCategory function
 * @param callable $predicate
 * @return \Closure
 * @example
 *      $isEven = function ($i) {
 *          return $i % 2 === 0;
 *      };
 *
 *      P::filter(P::negate($isEven), [1, 2, 3, 4, 5, 6]); // [1, 3, 5]
 */
P::macro('negate', function (callable $predicate): \Closure {
    return function (...$args) use ($predicate) {
        return !$predicate(...$args);
    };
});
