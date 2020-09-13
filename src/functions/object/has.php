<?php

declare(strict_types=1);

namespace Baethon\Phln;

const has = 'Baethon\\Phln\\has';

function has ($object, string $prop): bool {
    return ObjectWrapper::of($object)->has($prop);
}
