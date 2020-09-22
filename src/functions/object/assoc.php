<?php

declare(strict_types=1);

namespace Baethon\Phln;

const assoc = 'Baethon\\Phln\\assoc';

/**
 * @param object|array<string, mixed> $object
 * @param mixed                       $value
 */
function assoc($object, string $key, $value): ObjectWrapper
{
    return ObjectWrapper::of($object)
        ->assoc($key, $value);
}
