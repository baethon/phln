<?php

declare(strict_types=1);

namespace Baethon\Phln;

const path_eq = 'Baethon\\Phln\\path_eq';

/**
 * @param array<mixed>|object $object
 * @param string $path
 * @param mixed $value
 * @return bool
 */
function path_eq ($object, string $path, $value): bool
{
    return pipe_first($object, [
        _(path, $path),
        _(equals, $value)
    ]);
}
