<?php

declare(strict_types=1);

namespace Baethon\Phln;

const to_pairs = 'Baethon\\Phln\\to_pairs';

/**
 * @param object|array<string, mixed> $object
 * @return array{string, mixed}
 */
function to_pairs ($object): array {
    $object = ObjectWrapper::of($object);
    return zip($object->keys(), $object->values());
}
