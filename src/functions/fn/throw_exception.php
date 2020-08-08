<?php

declare(strict_types=1);

namespace Baethon\Phln;

const throw_exception = 'Baethon\\Phln\\throw_exception';

/**
 * Returns callback which throws given exception.
 *
 * *Note:* exceptions are considered as side-efects. Use it with caution.
 *
 * @param class-string<\Throwable> $exception
 * @param array $args
 * @return callable
 */
function throw_exception (string $exception, array $args): callable {
    return function () use ($exception, $args) {
        throw new $exception(...$args);
    };
}
