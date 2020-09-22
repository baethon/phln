<?php

declare(strict_types=1);

namespace Baethon\Phln;

const has = 'Baethon\\Phln\\has';

/**
 * @param array<string, mixed>|object $object
 * @param string $prop
 * @return bool
 */
function has ($object, string $prop): bool {
    return ObjectWrapper::of($object)->has($prop);
}
