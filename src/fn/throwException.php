<?php
declare(strict_types=1);

namespace phln\fn;

use function phln\fn\curryN;
use const phln\fn\nil;

const throwException = '\\phln\\fn\\throwException';

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
 *      $break = \phln\fn\throwException(\LogicException::class);
 *      $break(); // -> throw new \LogicException()
 */
function throwException(string $exception = \Exception::class, array $args = []): \Closure
{
    return function () use ($exception, $args) {
        throw new $exception(...$args);
    };
}
