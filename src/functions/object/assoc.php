<?php

declare(strict_types=1);

namespace Baethon\Phln;

const assoc = 'Baethon\\Phln\\assoc';

/**
 * @template T of object|array<string, mixed>
 * @param T $object
 * @param string $key
 * @param mixed $value
 * @return ObjectWrapper
 */
function assoc ($object, string $key, $value): ObjectWrapper {
    return ObjectWrapper::of($object)
        ->assoc($key, $value);
}
