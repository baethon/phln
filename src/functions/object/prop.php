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
    return ObjectWrapper::of($object)[$key];
}
