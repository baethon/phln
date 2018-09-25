<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

/**
 * Runs the given function with the supplied object, then returns the object.
 *
 * @phlnSignature (a -> *) -> a -> a
 * @phlnCategory function
 * @param string|callable $fn
 * @param mixed $value
 * @return \Closure|mixed
 * @example
 *      $dump = P::tap('var_dump');
 *      $dump('foo'); // var_dumps('foo'); returns 'foo'
 */
P::curried('tap', 2, function (callable $fn, $value) {
    $fn($value);
    return $value;
});
