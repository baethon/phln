<?php

declare(strict_types=1);

namespace Baethon\Phln;

/**
 * Pipe the first argument through the callbacks passed as next arguments
 *
 * @param mixed $value
 * @param array<callable(mixed):mixed> $fns
 * @return mixed
 */
function pipe_first ($value, array $fns)
{
    assert(count($fns) > 0, new \UnderflowException('pipe_first requires at least one argument'));

    return reduce($fns, function ($carry, callable $fn) {
        return $fn($carry);
    }, $value);
}
