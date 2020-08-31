<?php

declare(strict_types=1);

namespace Baethon\Phln;

const prop = 'Baethon\\Phln\\prop';

/**
 * @param array<int|string, mixed>|object $object
 * @param string $key
 * @return mixed
 */
function prop ($object, $key) {
    assert_object($object);

    return is_object($object)
        ? ($object->{$key} ?? null)
        : ($object[$key] ?? null);
}
