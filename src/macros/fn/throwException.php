<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

/**
 * Returns callback which throws given exception.
 *
 * *Note:* exceptions are considered as side-efects. Use it with caution.
 *
 * @phlnSignature (String, [*]) -> (*... -> Null)
 * @phlnCategory function
 * @param string $exception
 * @param array $args
 * @return \Closure
 * @example
 *      $break = P::throwException(\LogicException::class);
 *      $break(); // -> throw new \LogicException()
 */
P::macro('throwException', function (string $exception = \Exception::class, array $args = []): \Closure {
    return function () use ($exception, $args) {
        throw new $exception(...$args);
    };
});
